<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'featuredProducts' => collect($this->products())
                ->sortByDesc('release_order')
                ->take(5)
                ->values()
                ->all(),
        ]);
    }

    public function customerLogin()
    {
        if (session()->has('customer_auth')) {
            return redirect()->route('dashboard');
        }

        return view('customer-login');
    }

    public function customerAuthenticate(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $accounts = session('customer_accounts', []);
        $account = $accounts[strtolower($data['email'])] ?? null;

        if (! $account || ! Hash::check($data['password'], $account['password'])) {
            return back()
                ->withErrors(['email' => 'We could not match that email and password.'])
                ->onlyInput('email');
        }

        session(['customer_auth' => $account]);

        return redirect()->route('dashboard');
    }

    public function customerRegister()
    {
        if (session()->has('customer_auth')) {
            return redirect()->route('dashboard');
        }

        return view('customer-register');
    }

    public function customerStore(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        $accounts = session('customer_accounts', []);
        $emailKey = strtolower($data['email']);

        if (isset($accounts[$emailKey])) {
            return back()
                ->withErrors(['email' => 'That email is already registered. Please login instead.'])
                ->onlyInput('full_name', 'email');
        }

        $firstName = strtok($data['full_name'], ' ');
        $lastName = trim(substr($data['full_name'], strlen($firstName)));

        $account = [
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'member_since' => strtoupper(now()->format('M Y')),
            'first_name' => $firstName ?: $data['full_name'],
            'last_name' => $lastName,
            'street_address' => '',
            'city' => '',
            'zip_code' => '',
        ];

        $accounts[$emailKey] = $account;

        session([
            'customer_accounts' => $accounts,
            'customer_auth' => $account,
        ]);

        return redirect()->route('dashboard');
    }

    public function customerLogout()
    {
        session()->forget('customer_auth');

        return redirect()->route('customer.login');
    }

    public function shop(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $selectedSort = $request->query('sort', 'newest');
        $products = collect($this->products());
        $classificationOrder = [
            'basic' => 1,
            'minimal' => 2,
            'oversized' => 3,
        ];

        if ($selectedCategory !== 'all') {
            $products = $products->where('shop_category', $selectedCategory);
        }

        $products = match ($selectedSort) {
            'classification' => $products->sort(function (array $left, array $right) use ($classificationOrder) {
                $leftGroup = $classificationOrder[$left['shop_category']] ?? 99;
                $rightGroup = $classificationOrder[$right['shop_category']] ?? 99;

                if ($leftGroup === $rightGroup) {
                    return $right['release_order'] <=> $left['release_order'];
                }

                return $leftGroup <=> $rightGroup;
            }),
            'price_asc' => $products->sortBy('price_value'),
            'price_desc' => $products->sortByDesc('price_value'),
            default => $products->sortByDesc('release_order'),
        };

        return view('shop', [
            'products' => $products->values()->all(),
            'selectedCategory' => $selectedCategory,
            'selectedSort' => $selectedSort,
            'shopCategories' => [
                'all' => 'All',
                'basic' => 'Basic',
                'oversized' => 'Oversized',
                'minimal' => 'Minimal',
            ],
            'sortOptions' => [
                'newest' => 'Newest First',
                'classification' => 'Classification',
                'price_asc' => 'Price: Low to High',
                'price_desc' => 'Price: High to Low',
            ],
        ]);
    }

    public function product(string $slug)
    {
        $products = collect($this->products());
        $product = $products->firstWhere('slug', $slug);

        abort_if(! $product, 404);

        $relatedProducts = $products
            ->reject(fn (array $item) => $item['slug'] === $slug)
            ->take(3)
            ->values()
            ->all();

        return view('product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function cart()
    {
        $summary = $this->cartSummary();

        return view('cart', [
            'cartItems' => $summary['items'],
            'subtotal' => $summary['subtotal_formatted'],
            'shipping' => $summary['shipping_formatted'],
            'total' => $summary['total_formatted'],
        ]);
    }

    public function addToCart(Request $request)
    {
        $products = collect($this->products())->keyBy('slug');

        $data = $request->validate([
            'slug' => ['required', 'string'],
            'size' => ['nullable', 'string'],
            'redirect_to' => ['nullable', 'string'],
        ]);

        $product = $products->get($data['slug']);
        abort_if(! $product, 404);

        $size = $data['size'] ?? $product['selected_size'];
        if (isset($product['sizes']) && ! in_array($size, $product['sizes'], true)) {
            $size = $product['selected_size'];
        }

        $key = $product['slug'].'|'.$size;
        $cart = $this->currentCart();

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                'key' => $key,
                'slug' => $product['slug'],
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'price_value' => $this->priceToInt($product['price']),
                'size' => $size,
                'quantity' => 1,
            ];
        }

        $this->storeCurrentCart($cart);

        return redirect()->route(($data['redirect_to'] ?? 'cart') === 'checkout' ? 'checkout' : 'cart');
    }

    public function updateCart(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string'],
            'direction' => ['required', 'in:increase,decrease'],
        ]);

        $cart = $this->currentCart();
        abort_if(! isset($cart[$data['key']]), 404);

        $quantity = $cart[$data['key']]['quantity'];
        $quantity += $data['direction'] === 'increase' ? 1 : -1;

        if ($quantity <= 0) {
            unset($cart[$data['key']]);
        } else {
            $cart[$data['key']]['quantity'] = min($quantity, 99);
        }

        $this->storeCurrentCart($cart);

        return redirect()->route('cart');
    }

    public function removeFromCart(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string'],
        ]);

        $cart = $this->currentCart();
        unset($cart[$data['key']]);
        $this->storeCurrentCart($cart);

        return redirect()->route('cart');
    }

    public function checkout()
    {
        $customer = session('customer_auth');
        $shippingMethod = session('checkout_shipping_method', 'standard');
        $summary = $this->cartSummary($shippingMethod);

        return view('checkout', [
            'cartItems' => $summary['items'],
            'subtotal' => $summary['subtotal_formatted'],
            'shipping' => $summary['shipping_formatted'],
            'total' => $summary['total_formatted'],
            'shippingMethod' => $shippingMethod,
            'profile' => [
                'first_name' => $customer['first_name'] ?? '',
                'last_name' => $customer['last_name'] ?? '',
                'street_address' => $customer['street_address'] ?? '',
                'city' => $customer['city'] ?? '',
                'zip_code' => $customer['zip_code'] ?? '',
            ],
        ]);
    }

    public function completeCheckout(Request $request)
    {
        $data = $request->validate([
            'shipping_method' => ['nullable', 'in:standard,express'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'street_address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:20'],
        ]);

        $shippingMethod = $data['shipping_method'] ?? 'standard';
        session(['checkout_shipping_method' => $shippingMethod]);
        $summary = $this->cartSummary($shippingMethod);

        if ($summary['count'] === 0) {
            return redirect()->route('cart');
        }

        $reference = 'TL-'.strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
        $paymentMethod = 'Credit / Debit Card';

        if ($customer = session('customer_auth')) {
            $customer['first_name'] = $data['first_name'] ?? ($customer['first_name'] ?? '');
            $customer['last_name'] = $data['last_name'] ?? ($customer['last_name'] ?? '');
            $customer['street_address'] = $data['street_address'] ?? ($customer['street_address'] ?? '');
            $customer['city'] = $data['city'] ?? ($customer['city'] ?? '');
            $customer['zip_code'] = $data['zip_code'] ?? ($customer['zip_code'] ?? '');
            $customer['full_name'] = trim(($customer['first_name'] ?? '').' '.($customer['last_name'] ?? ''));
            $this->persistCustomerAccount($customer);

            $ordersByCustomer = session('customer_orders', []);
            $emailKey = strtolower($customer['email']);
            $existingOrders = $ordersByCustomer[$emailKey] ?? [];

            array_unshift($existingOrders, [
                'reference' => $reference,
                'status' => $this->displayOrderStatus('processing'),
                'status_key' => 'processing',
                'status_style' => $this->orderStatusStyle('processing'),
                'total' => $summary['total_formatted'],
                'total_value' => $summary['total_value'],
                'product_name' => $summary['items'][0]['name'] ?? 'THREADLAB Order',
                'product_image' => $summary['items'][0]['image'] ?? '',
                'action' => $this->orderActionLabel('processing'),
                'created_at' => now()->timestamp,
            ]);

            $ordersByCustomer[$emailKey] = $existingOrders;
            session(['customer_orders' => $ordersByCustomer]);
        }

        session([
            'last_order' => [
                'reference' => $reference,
                'total' => $summary['total_formatted'],
                'payment_method' => $paymentMethod,
            ],
            'checkout_shipping_method' => 'standard',
        ]);
        $this->storeCurrentCart([]);

        return redirect()->route('order.success');
    }

    public function dashboard()
    {
        $customer = session('customer_auth');

        if (! $customer) {
            return redirect()->route('customer.login');
        }

        $ordersByCustomer = session('customer_orders', []);
        $recentOrders = collect($ordersByCustomer[strtolower($customer['email'])] ?? []);
        $recentOrders = $recentOrders->map(function (array $order) {
            $statusKey = $this->normalizeOrderStatus($order['status_key'] ?? $order['status'] ?? null);
            $order['status_key'] = $statusKey;
            $order['status'] = $this->displayOrderStatus($statusKey);
            $order['status_style'] = $this->orderStatusStyle($statusKey);
            $order['action'] = $this->orderActionLabel($statusKey);

            return $order;
        });
        $totalSpent = $recentOrders->sum('total_value');
        $rewardsBalance = (int) floor($totalSpent * 0.1) + ($recentOrders->count() * 250);
        $xpGoal = 5000;
        $xpCurrent = min($xpGoal, max(850, (int) floor($totalSpent * 0.35) + ($recentOrders->count() * 400)));
        $progressPercent = min(100, (int) round(($xpCurrent / $xpGoal) * 100));
        $xpRemaining = max(0, $xpGoal - $xpCurrent);
        $tierName = $recentOrders->count() >= 3 || $totalSpent >= 10000 ? 'NEO-STREET VANGUARD' : 'REGISTRY INITIATE';
        $vipStatus = $recentOrders->count() >= 3 || $totalSpent >= 10000 ? 'Elite Tier Member' : 'Registry Member';

        return view('dashboard', [
            'customerName' => strtoupper(strtok($customer['full_name'], ' ')),
            'memberSince' => $customer['member_since'],
            'customerProfile' => [
                'full_name' => $customer['full_name'],
                'email' => $customer['email'],
                'first_name' => $customer['first_name'] ?? '',
                'last_name' => $customer['last_name'] ?? '',
                'street_address' => $customer['street_address'] ?? '',
                'city' => $customer['city'] ?? '',
                'zip_code' => $customer['zip_code'] ?? '',
            ],
            'vipStatus' => $vipStatus,
            'tierName' => $tierName,
            'progressPercent' => $progressPercent,
            'xpCurrent' => number_format($xpCurrent),
            'xpGoal' => number_format($xpGoal),
            'xpRemaining' => number_format($xpRemaining),
            'rewardsBalance' => number_format($rewardsBalance),
            'recentOrders' => $recentOrders->take(2)->all(),
        ]);
    }

    public function updateDashboardAccount(Request $request)
    {
        $customer = session('customer_auth');

        if (! $customer) {
            return redirect()->route('customer.login');
        }

        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:20'],
        ]);

        $customer['first_name'] = $data['first_name'];
        $customer['last_name'] = $data['last_name'];
        $customer['street_address'] = $data['street_address'];
        $customer['city'] = $data['city'];
        $customer['zip_code'] = $data['zip_code'];
        $customer['full_name'] = trim($data['first_name'].' '.$data['last_name']);

        $this->persistCustomerAccount($customer);

        return redirect()->route('dashboard')->with('account_success', 'Account details updated.');
    }

    public function adminDashboard()
    {
        $accounts = session('customer_accounts', []);
        $ordersByCustomer = session('customer_orders', []);
        $recentTransactions = [];
        $sequence = 0;

        foreach ($ordersByCustomer as $email => $orders) {
            $account = $accounts[strtolower($email)] ?? null;
            $customerName = $account['full_name'] ?? ucfirst(str_replace(['.', '_'], ' ', strstr($email, '@', true) ?: $email));

            foreach ($orders as $order) {
                $statusKey = $this->normalizeOrderStatus($order['status_key'] ?? $order['status'] ?? null);
                $statusIsCompleted = $this->isCompletedOrderStatus($statusKey);
                $recentTransactions[] = [
                    'reference' => $order['reference'] ?? 'N/A',
                    'customer_name' => $customerName,
                    'initials' => $this->initialsFromName($customerName),
                    'value' => $this->formatPeso((int) ($order['total_value'] ?? 0)),
                    'value_raw' => (int) ($order['total_value'] ?? 0),
                    'status' => $this->displayOrderStatus($statusKey),
                    'status_key' => $statusKey,
                    'status_pending' => ! $statusIsCompleted,
                    'created_at' => $order['created_at'] ?? (PHP_INT_MAX - $sequence++),
                ];
            }
        }

        $recentTransactions = collect($recentTransactions)
            ->sortByDesc('created_at')
            ->values();

        $totalOrders = $recentTransactions->count();
        $totalRevenueValue = (int) $recentTransactions->sum('value_raw');
        $pendingOrders = $recentTransactions->where('status_pending', true)->count();
        $completedOrders = $recentTransactions->where('status_pending', false)->count();
        $activeCustomers = count($accounts);
        $stabilityPercent = $totalOrders > 0
            ? number_format(($completedOrders / max($totalOrders, 1)) * 100, 2)
            : '100.00';
        $averageOrderValue = $totalOrders > 0
            ? $this->formatPeso((int) round($totalRevenueValue / $totalOrders))
            : $this->formatPeso(0);
        $topCity = collect($accounts)
            ->pluck('city')
            ->filter()
            ->map(fn (string $city) => strtoupper(str_replace(' ', '_', trim($city))))
            ->countBy()
            ->sortDesc()
            ->keys()
            ->first();
        $liveNode = ($topCity ?: 'GLOBAL').'_'.str_pad((string) max($activeCustomers, 1), 2, '0', STR_PAD_LEFT);
        $orderSignal = $this->buildAdminOrderSignal($totalOrders, $completedOrders, $pendingOrders, $activeCustomers);

        return view('admin-dashboard', [
            'totalOrders' => number_format($totalOrders),
            'totalRevenue' => $this->formatCompactPeso($totalRevenueValue),
            'pendingOrders' => number_format($pendingOrders),
            'completedOrders' => number_format($completedOrders),
            'activeCustomers' => number_format($activeCustomers),
            'stabilityPercent' => $stabilityPercent,
            'liveNode' => $liveNode,
            'recentTransactions' => $recentTransactions->take(8)->all(),
            'averageOrderValue' => $averageOrderValue,
            'orderSignal' => $orderSignal,
            'hasAdminData' => $totalOrders > 0 || $activeCustomers > 0,
        ]);
    }

    public function adminProducts()
    {
        return view('admin-products', [
            'products' => collect($this->products())->sortByDesc('release_order')->values()->all(),
        ]);
    }

    public function createAdminProduct()
    {
        return view('admin-product-form', [
            'pageTitle' => 'Add Product',
            'formTitle' => 'Create Product',
            'formAction' => route('admin.products.store'),
            'submitLabel' => 'Upload Product',
            'product' => $this->emptyAdminProduct(),
            'isEditing' => false,
        ]);
    }

    public function updateAdminOrderStatus(Request $request)
    {
        $data = $request->validate([
            'reference' => ['required', 'string'],
            'status' => ['required', 'in:processing,in_transit,shipped,delivered'],
        ]);

        $ordersByCustomer = session('customer_orders', []);
        $updated = false;

        foreach ($ordersByCustomer as $email => $orders) {
            foreach ($orders as $index => $order) {
                if (($order['reference'] ?? null) !== $data['reference']) {
                    continue;
                }

                $statusKey = $this->normalizeOrderStatus($data['status']);
                $ordersByCustomer[$email][$index]['status_key'] = $statusKey;
                $ordersByCustomer[$email][$index]['status'] = $this->displayOrderStatus($statusKey);
                $ordersByCustomer[$email][$index]['status_style'] = $this->orderStatusStyle($statusKey);
                $ordersByCustomer[$email][$index]['action'] = $this->orderActionLabel($statusKey);
                $updated = true;
                break 2;
            }
        }

        if ($updated) {
            session(['customer_orders' => $ordersByCustomer]);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('admin_status_success', $updated ? 'Order status updated.' : 'Order not found.');
    }

    public function editAdminProduct(string $slug)
    {
        $product = collect($this->products())->firstWhere('slug', $slug);
        abort_if(! $product, 404);

        return view('admin-product-form', [
            'pageTitle' => 'Edit Product',
            'formTitle' => 'Edit Product',
            'formAction' => route('admin.products.update', $product['slug']),
            'submitLabel' => 'Save Changes',
            'product' => $product,
            'isEditing' => true,
        ]);
    }

    public function storeAdminProduct(Request $request)
    {
        $products = collect($this->products());
        $payload = $this->buildAdminProductPayload(
            request: $request,
            existingProduct: null,
            slug: $this->uniqueProductSlug($request->input('title', 'product'), $products->pluck('slug')->all()),
            releaseOrder: ((int) $products->max('release_order')) + 1
        );

        $customProducts = $this->managedProducts();
        $customProducts[$payload['slug']] = $payload;
        $this->saveAdminCatalog($customProducts, $this->deletedProductSlugs());

        return redirect()
            ->route('admin.products.index')
            ->with('admin_product_success', 'Product uploaded successfully.');
    }

    public function updateAdminProduct(Request $request, string $slug)
    {
        $existingProduct = collect($this->products())->firstWhere('slug', $slug);
        abort_if(! $existingProduct, 404);

        $payload = $this->buildAdminProductPayload(
            request: $request,
            existingProduct: $existingProduct,
            slug: $slug,
            releaseOrder: $existingProduct['release_order']
        );

        $customProducts = $this->managedProducts();
        $customProducts[$slug] = $payload;
        $deletedProducts = array_values(array_diff($this->deletedProductSlugs(), [$slug]));
        $this->saveAdminCatalog($customProducts, $deletedProducts);

        return redirect()
            ->route('admin.products.index')
            ->with('admin_product_success', 'Product updated successfully.');
    }

    public function deleteAdminProduct(string $slug)
    {
        $customProducts = $this->managedProducts();
        unset($customProducts[$slug]);

        $deletedProducts = session('admin_deleted_products', []);
        if (! in_array($slug, $deletedProducts, true)) {
            $deletedProducts[] = $slug;
        }

        $this->saveAdminCatalog($customProducts, $deletedProducts);

        return redirect()
            ->route('admin.products.index')
            ->with('admin_product_success', 'Product removed successfully.');
    }

    public function adminLogin()
    {
        return view('admin-login');
    }

    public function adminRegister()
    {
        return view('admin-register');
    }

    public function orderSuccess()
    {
        $lastOrder = session('last_order', [
            'reference' => 'TL-T0QY7QW8',
            'total' => '₱0',
            'payment_method' => 'Cash on Delivery',
        ]);

        return view('order-success', [
            'reference' => $lastOrder['reference'],
            'total' => $lastOrder['total'],
            'paymentMethod' => $lastOrder['payment_method'],
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $messages = session('contact_messages', []);
        array_unshift($messages, [
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'created_at' => now()->toDateTimeString(),
        ]);

        session(['contact_messages' => $messages]);

        return redirect()
            ->route('contact')
            ->with('contact_success', 'Your message has been sent to THREADLAB.');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return response('Generated successfully');
    }

    private function products(): array
    {
        $products = $this->baseProducts();
        $customProducts = collect($this->managedProducts());
        $deletedProducts = $this->deletedProductSlugs();

        return collect($products)
            ->keyBy('slug')
            ->merge($customProducts->keyBy('slug'))
            ->reject(fn (array $product, string $slug) => in_array($slug, $deletedProducts, true))
            ->values()
            ->all();
    }

    private function baseProducts(): array
    {
        return [
            [
                'slug' => 'essential-black-tee',
                'name' => 'Essential Black Tee',
                'sku' => 'TL-001-B',
                'category' => 'KINETIC BASICS',
                'shop_category' => 'basic',
                'release_order' => 1,
                'layout' => 'standard',
                'price' => '₱799',
                'price_value' => 799,
                'original_price' => '₱1,200',
                'badge' => 'V-01 ACCESS',
                'short_description' => 'Premium cotton t-shirt designed for everyday comfort and style. Reconstructed silhouette with dropped shoulders and reinforced technical seams.',
                'description' => [
                    'The Essential Black Tee is the foundation of the modern wardrobe. Engineered with a heavy 240GSM combed cotton, it offers a structural drape that resists warping over time.',
                ],
                'features' => [
                    'Double-needle stitched neck and hems',
                    'Pre-shrunk for consistent fit',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'selected_size' => 'M',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAj4PnVBOKJZJoLcx8QJTvxJZiXjqaWyNAb6NRH-CvKnxdaS0Jf37dlOhpCyh1WR-I5OQXaSdLP-16201n_7TrnmlbzPDUvczACB4mm6gWiCOX6bOOWQnCDlRyT5tlrwfKPhSpO3RsqzYyZd_1c3ZhwuIYep5cGfxvlZ3REfaxmPY4kHD-BxJexNN9bIt6FDzfOxG6GYFvnXdxflwEQYkUgIeKkY9PWA1zC_xOLEO4BgblQ92-Dkj1Db7f5eooT7lEqKutRYc3W6ho',
                'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCmSH21vChi9wWFAtwDFBRSgWPGBCt_T89C5ymK-Ua1qKD7CdbyuxcuF_8yOhQq4HfvB-REl_v1jT_uE8xcgfCklzLUc8cqaWHyvZk3PufMJgUQLCVpRaRijc0-2t4cvZn1fPR-PDX3SpAuVIBDY5Fksrs-XJ9KpklGS0L_xUSx-9-mxl37UT5zJS9orETV_2pHY9c0gNkDB5e7-aqy7E1gkt7Xr7ATjBSvKIBAhZj108ljjfVSfYCA-rYWJGgtZGQWQe8AZl43lCs',
                'gallery' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBaysYXlmBblQhbmjyYDR9-UZlaIIQeAP6GxqA4pgHitivFmL5UsKOsSjsfgRyl8gLmITTgtPNFaFkXlNPgR7J7Efh7zqq22lzlCw-26xipJhe-nEwpvHCWz_ctFp7dsBx4X2YAGnoniz5zigRGcn-tS6k0bRjxVNrbZf1Y7U1NO0BfrBdCUPCq0yRqEvB_uEIh8m783GKulKEOTSuax0q2yPiLTBeHArEgxxfMEE14653A7ycHmtSIly5nybqDBQgwOC03xfjoH2E',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuCqsdzoOHdo1PvQe_yOTmU8gDXi7kkeWgwuBOcbTyblSTpl95cd1Fzg49nNb17IJTNGVv7lwYOL2mkQ8v3hska9gYJJ-2ptvucS4zl0EKahc1DSqGCxC29eei-dOWiRn0ITi7Syxh1aM2g_KzFIGrt_EtTHKMXvAiQ-j65soApK7E94jZhMiqfJIXLqY7S9V_LKEasRSkET4f3q6BeoP1y_Q0EfzMtKh4u9iHBiCSxuuhXDLNRDbjmeDjedPjGJ6Zlvs69U4gqwApA',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAYw2Eq2az-5YpmVklYYgG0YbZmVtxva4ERtyfFEyEgsimKUgjFosu-P84YbEr8CylR2sSwPkZlmmrOqap8ItrFrD5p5cMEfUW1Gh4Ejr8BqjlRt9U-kafZt4Q2XRTfafRdRuo2Kf6ZqDg2Zz6JUQfKz8ddX53pLTBqZ8ail14Xrh-us46CU37cjqIMSTh2F7qiml9togO9vr_kxeuwSr1_ublwgtIzkqRi3pw3lF1Uq4FFZ5jygPu3c2wsTZzUwl5D-DoNZc7N-4Q',
                ],
            ],
            [
                'slug' => 'classic-white-tee',
                'name' => 'Classic White Tee',
                'sku' => 'TL-002-W',
                'category' => 'KINETIC BASICS',
                'shop_category' => 'basic',
                'release_order' => 2,
                'layout' => 'standard',
                'price' => '₱849',
                'price_value' => 849,
                'original_price' => '₱1,100',
                'badge' => 'V-02 CORE',
                'short_description' => 'A crisp white luxury basic built for clean layering, soft structure, and all-day wear.',
                'description' => [
                    'The Classic White Tee balances softness and shape with a dense cotton knit that feels elevated without losing everyday versatility.',
                ],
                'features' => [
                    '240GSM premium cotton jersey',
                    'Clean neck rib with reinforced shoulder tape',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'selected_size' => 'M',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBC4I5a96dLapKGACArZ-M_4D8dP_DPfx1KvaHn6qmcrF0R5za4qFUDZyESq1HCUeXF_Am95SCiIxMlA9WYM_qKAn5FXo4_fbXhi_Td0Xxa2xRaKW72QkKvQnkQ1LC7JUOrhE9k05LCl3ozm_uVzMWYRLMcrUcq3TTJ51eVj2IxdmSBhTk0jP_znU5xmGF3CJ_lr0tWLcUDn2QjkZ6X__dW7Fph7xobFBHqHxkhGj_h9KxtUbFCV6CetrBzAULvK6-6TQq89wybZO8',
                'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBC4I5a96dLapKGACArZ-M_4D8dP_DPfx1KvaHn6qmcrF0R5za4qFUDZyESq1HCUeXF_Am95SCiIxMlA9WYM_qKAn5FXo4_fbXhi_Td0Xxa2xRaKW72QkKvQnkQ1LC7JUOrhE9k05LCl3ozm_uVzMWYRLMcrUcq3TTJ51eVj2IxdmSBhTk0jP_znU5xmGF3CJ_lr0tWLcUDn2QjkZ6X__dW7Fph7xobFBHqHxkhGj_h9KxtUbFCV6CetrBzAULvK6-6TQq89wybZO8',
                'gallery' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBC4I5a96dLapKGACArZ-M_4D8dP_DPfx1KvaHn6qmcrF0R5za4qFUDZyESq1HCUeXF_Am95SCiIxMlA9WYM_qKAn5FXo4_fbXhi_Td0Xxa2xRaKW72QkKvQnkQ1LC7JUOrhE9k05LCl3ozm_uVzMWYRLMcrUcq3TTJ51eVj2IxdmSBhTk0jP_znU5xmGF3CJ_lr0tWLcUDn2QjkZ6X__dW7Fph7xobFBHqHxkhGj_h9KxtUbFCV6CetrBzAULvK6-6TQq89wybZO8',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBaysYXlmBblQhbmjyYDR9-UZlaIIQeAP6GxqA4pgHitivFmL5UsKOsSjsfgRyl8gLmITTgtPNFaFkXlNPgR7J7Efh7zqq22lzlCw-26xipJhe-nEwpvHCWz_ctFp7dsBx4X2YAGnoniz5zigRGcn-tS6k0bRjxVNrbZf1Y7U1NO0BfrBdCUPCq0yRqEvB_uEIh8m783GKulKEOTSuax0q2yPiLTBeHArEgxxfMEE14653A7ycHmtSIly5nybqDBQgwOC03xfjoH2E',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAYw2Eq2az-5YpmVklYYgG0YbZmVtxva4ERtyfFEyEgsimKUgjFosu-P84YbEr8CylR2sSwPkZlmmrOqap8ItrFrD5p5cMEfUW1Gh4Ejr8BqjlRt9U-kafZt4Q2XRTfafRdRuo2Kf6ZqDg2Zz6JUQfKz8ddX53pLTBqZ8ail14Xrh-us46CU37cjqIMSTh2F7qiml9togO9vr_kxeuwSr1_ublwgtIzkqRi3pw3lF1Uq4FFZ5jygPu3c2wsTZzUwl5D-DoNZc7N-4Q',
                ],
            ],
            [
                'slug' => 'earth-tone-tee',
                'name' => 'Earth Tone Tee',
                'sku' => 'TL-003-E',
                'category' => 'KINETIC BASICS',
                'shop_category' => 'basic',
                'release_order' => 3,
                'layout' => 'standard',
                'price' => '₱899',
                'price_value' => 899,
                'original_price' => '₱1,050',
                'badge' => 'V-03 TERRA',
                'short_description' => 'A warm neutral staple with a dense premium knit and a quietly elevated drape.',
                'description' => [
                    'The Earth Tone Tee softens the editorial palette while keeping the same architectural fit that defines the collection.',
                ],
                'features' => [
                    'Pigment-inspired tonal finish',
                    'Structured body with soft interior hand feel',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'selected_size' => 'L',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6nZ-rDWJyEx7eMk9CvW3cRybBvwe8y0fIuQz2o0iIv3GGTva7_w28fhTTUQCNYSe9JT0MEoo55x-3Tni4mQIHAKMop1qICe02b6syYSs-v8RIo2uyhm6Q_eFPGBzJ5nsgfa23vtNvOZJLPvjW38dpupg9zoe3RAlnNDN7SAXVX2P84QElAbVqGyhWnAwvoD5CQ8b7k0tFfCtvxGr1Voelwo-3c95KdM305FoBc7HLmpGtD-OrQ2SNb4C19xCqa_yS5KnZPS73JUQ',
                'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6nZ-rDWJyEx7eMk9CvW3cRybBvwe8y0fIuQz2o0iIv3GGTva7_w28fhTTUQCNYSe9JT0MEoo55x-3Tni4mQIHAKMop1qICe02b6syYSs-v8RIo2uyhm6Q_eFPGBzJ5nsgfa23vtNvOZJLPvjW38dpupg9zoe3RAlnNDN7SAXVX2P84QElAbVqGyhWnAwvoD5CQ8b7k0tFfCtvxGr1Voelwo-3c95KdM305FoBc7HLmpGtD-OrQ2SNb4C19xCqa_yS5KnZPS73JUQ',
                'gallery' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB6nZ-rDWJyEx7eMk9CvW3cRybBvwe8y0fIuQz2o0iIv3GGTva7_w28fhTTUQCNYSe9JT0MEoo55x-3Tni4mQIHAKMop1qICe02b6syYSs-v8RIo2uyhm6Q_eFPGBzJ5nsgfa23vtNvOZJLPvjW38dpupg9zoe3RAlnNDN7SAXVX2P84QElAbVqGyhWnAwvoD5CQ8b7k0tFfCtvxGr1Voelwo-3c95KdM305FoBc7HLmpGtD-OrQ2SNb4C19xCqa_yS5KnZPS73JUQ',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBaysYXlmBblQhbmjyYDR9-UZlaIIQeAP6GxqA4pgHitivFmL5UsKOsSjsfgRyl8gLmITTgtPNFaFkXlNPgR7J7Efh7zqq22lzlCw-26xipJhe-nEwpvHCWz_ctFp7dsBx4X2YAGnoniz5zigRGcn-tS6k0bRjxVNrbZf1Y7U1NO0BfrBdCUPCq0yRqEvB_uEIh8m783GKulKEOTSuax0q2yPiLTBeHArEgxxfMEE14653A7ycHmtSIly5nybqDBQgwOC03xfjoH2E',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAYw2Eq2az-5YpmVklYYgG0YbZmVtxva4ERtyfFEyEgsimKUgjFosu-P84YbEr8CylR2sSwPkZlmmrOqap8ItrFrD5p5cMEfUW1Gh4Ejr8BqjlRt9U-kafZt4Q2XRTfafRdRuo2Kf6ZqDg2Zz6JUQfKz8ddX53pLTBqZ8ail14Xrh-us46CU37cjqIMSTh2F7qiml9togO9vr_kxeuwSr1_ublwgtIzkqRi3pw3lF1Uq4FFZ5jygPu3c2wsTZzUwl5D-DoNZc7N-4Q',
                ],
            ],
            [
                'slug' => 'oversized-street-tee',
                'name' => 'Oversized Street Tee',
                'sku' => 'TL-004-OS',
                'category' => 'KINETIC BASICS',
                'shop_category' => 'oversized',
                'release_order' => 4,
                'layout' => 'standard',
                'price' => '₱1,199',
                'price_value' => 1199,
                'original_price' => '₱1,250',
                'badge' => 'LIMITED DROP',
                'short_description' => 'An oversized silhouette tuned for volume, attitude, and an unmistakably urban profile.',
                'description' => [
                    'The Oversized Street Tee exaggerates shoulder line and body width while staying clean through the hem and sleeve finish.',
                ],
                'features' => [
                    'Relaxed oversized cut',
                    'Street-led silhouette with premium finishing',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'selected_size' => 'L',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDm5ugfeo33UUfjNpzqVBIIWgmTZ9NnfHFJE_1dJ6Z7eYCAK2ndKoXMM-xM6yyj6HGo32LPR-ObTbQIdl0OQkyW4aGYh4jAn3ctTjDxiEsrrX1TeX6Uy900agi6q53QtcM4gJ8DMT8j8Q2m1Pv3IHwcF9VAlhDz8iTJxxg6psTFjp_b2Ah4E32mLTPNlV8dBSX_JOMvOoxz3EZaXtrOe8HrII-NMHtYzkVclESNeGpwWgyeNwYUeiTjQSEQXQ6uKk_6Pfn0KKgtvwo',
                'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDm5ugfeo33UUfjNpzqVBIIWgmTZ9NnfHFJE_1dJ6Z7eYCAK2ndKoXMM-xM6yyj6HGo32LPR-ObTbQIdl0OQkyW4aGYh4jAn3ctTjDxiEsrrX1TeX6Uy900agi6q53QtcM4gJ8DMT8j8Q2m1Pv3IHwcF9VAlhDz8iTJxxg6psTFjp_b2Ah4E32mLTPNlV8dBSX_JOMvOoxz3EZaXtrOe8HrII-NMHtYzkVclESNeGpwWgyeNwYUeiTjQSEQXQ6uKk_6Pfn0KKgtvwo',
                'gallery' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDm5ugfeo33UUfjNpzqVBIIWgmTZ9NnfHFJE_1dJ6Z7eYCAK2ndKoXMM-xM6yyj6HGo32LPR-ObTbQIdl0OQkyW4aGYh4jAn3ctTjDxiEsrrX1TeX6Uy900agi6q53QtcM4gJ8DMT8j8Q2m1Pv3IHwcF9VAlhDz8iTJxxg6psTFjp_b2Ah4E32mLTPNlV8dBSX_JOMvOoxz3EZaXtrOe8HrII-NMHtYzkVclESNeGpwWgyeNwYUeiTjQSEQXQ6uKk_6Pfn0KKgtvwo',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBaysYXlmBblQhbmjyYDR9-UZlaIIQeAP6GxqA4pgHitivFmL5UsKOsSjsfgRyl8gLmITTgtPNFaFkXlNPgR7J7Efh7zqq22lzlCw-26xipJhe-nEwpvHCWz_ctFp7dsBx4X2YAGnoniz5zigRGcn-tS6k0bRjxVNrbZf1Y7U1NO0BfrBdCUPCq0yRqEvB_uEIh8m783GKulKEOTSuax0q2yPiLTBeHArEgxxfMEE14653A7ycHmtSIly5nybqDBQgwOC03xfjoH2E',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAYw2Eq2az-5YpmVklYYgG0YbZmVtxva4ERtyfFEyEgsimKUgjFosu-P84YbEr8CylR2sSwPkZlmmrOqap8ItrFrD5p5cMEfUW1Gh4Ejr8BqjlRt9U-kafZt4Q2XRTfafRdRuo2Kf6ZqDg2Zz6JUQfKz8ddX53pLTBqZ8ail14Xrh-us46CU37cjqIMSTh2F7qiml9togO9vr_kxeuwSr1_ublwgtIzkqRi3pw3lF1Uq4FFZ5jygPu3c2wsTZzUwl5D-DoNZc7N-4Q',
                ],
            ],
            [
                'slug' => 'minimal-logo-tee',
                'name' => 'Minimal Logo Tee',
                'sku' => 'TL-005-ML',
                'category' => 'KINETIC BASICS',
                'shop_category' => 'minimal',
                'release_order' => 5,
                'layout' => 'feature',
                'price' => '₱949',
                'price_value' => 949,
                'original_price' => '₱1,150',
                'badge' => 'V-05 SIGNATURE',
                'short_description' => 'Our signature minimalist statement with subtle branding and 240GSM premium cotton construction.',
                'description' => [
                    'The Minimal Logo Tee pares the visual language back to its essentials, letting material quality and proportion do the talking.',
                ],
                'features' => [
                    'Subtle logo placement with elevated finish',
                    'Dense premium cotton for shape retention',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'selected_size' => 'M',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAmhZrHsF9AM5XF32dhzr7RURiKTVJJnpVuV2XDK-aBcPerIltnSQpCsfqWZAvmEQz305yeHVS34rTy_LT24qiPv_f9x2YmVjYqZlyrK3d9a_dCeU9N-aikdOAR7czpjhwdAhgnNjtfu_nVFVzMUK6PEdNujVgUS0pGyblD-uedfQK_ZhrzTcIo-R_Uu5Ce84kNHL9irC5UvfjpPmgN78tTmuehEULmoHZ7Vpzs3q4QJ-czp8FJCkagWBEeDGDPmgrhkSm2EHrnmYs',
                'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAmhZrHsF9AM5XF32dhzr7RURiKTVJJnpVuV2XDK-aBcPerIltnSQpCsfqWZAvmEQz305yeHVS34rTy_LT24qiPv_f9x2YmVjYqZlyrK3d9a_dCeU9N-aikdOAR7czpjhwdAhgnNjtfu_nVFVzMUK6PEdNujVgUS0pGyblD-uedfQK_ZhrzTcIo-R_Uu5Ce84kNHL9irC5UvfjpPmgN78tTmuehEULmoHZ7Vpzs3q4QJ-czp8FJCkagWBEeDGDPmgrhkSm2EHrnmYs',
                'gallery' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAmhZrHsF9AM5XF32dhzr7RURiKTVJJnpVuV2XDK-aBcPerIltnSQpCsfqWZAvmEQz305yeHVS34rTy_LT24qiPv_f9x2YmVjYqZlyrK3d9a_dCeU9N-aikdOAR7czpjhwdAhgnNjtfu_nVFVzMUK6PEdNujVgUS0pGyblD-uedfQK_ZhrzTcIo-R_Uu5Ce84kNHL9irC5UvfjpPmgN78tTmuehEULmoHZ7Vpzs3q4QJ-czp8FJCkagWBEeDGDPmgrhkSm2EHrnmYs',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBaysYXlmBblQhbmjyYDR9-UZlaIIQeAP6GxqA4pgHitivFmL5UsKOsSjsfgRyl8gLmITTgtPNFaFkXlNPgR7J7Efh7zqq22lzlCw-26xipJhe-nEwpvHCWz_ctFp7dsBx4X2YAGnoniz5zigRGcn-tS6k0bRjxVNrbZf1Y7U1NO0BfrBdCUPCq0yRqEvB_uEIh8m783GKulKEOTSuax0q2yPiLTBeHArEgxxfMEE14653A7ycHmtSIly5nybqDBQgwOC03xfjoH2E',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAYw2Eq2az-5YpmVklYYgG0YbZmVtxva4ERtyfFEyEgsimKUgjFosu-P84YbEr8CylR2sSwPkZlmmrOqap8ItrFrD5p5cMEfUW1Gh4Ejr8BqjlRt9U-kafZt4Q2XRTfafRdRuo2Kf6ZqDg2Zz6JUQfKz8ddX53pLTBqZ8ail14Xrh-us46CU37cjqIMSTh2F7qiml9togO9vr_kxeuwSr1_ublwgtIzkqRi3pw3lF1Uq4FFZ5jygPu3c2wsTZzUwl5D-DoNZc7N-4Q',
                ],
            ],
        ];
    }

    private function cartSummary(string $shippingMethod = 'standard'): array
    {
        $items = array_values($this->currentCart());
        $subtotalValue = collect($items)->sum(fn (array $item) => $item['price_value'] * $item['quantity']);
        $shippingValue = match ($shippingMethod) {
            'express' => $subtotalValue > 0 ? 300 : 0,
            default => $subtotalValue > 0 ? 100 : 0,
        };
        $totalValue = $subtotalValue + $shippingValue;

        $items = array_map(function (array $item) {
            $item['meta'] = 'Size: '.$item['size'];
            $item['line_total'] = $this->formatPeso($item['price_value'] * $item['quantity']);

            return $item;
        }, $items);

        return [
            'items' => $items,
            'count' => collect($items)->sum('quantity'),
            'total_value' => $totalValue,
            'subtotal_formatted' => $this->formatPeso($subtotalValue),
            'shipping_formatted' => $this->formatPeso($shippingValue),
            'total_formatted' => $this->formatPeso($totalValue),
        ];
    }

    private function priceToInt(string $price): int
    {
        return (int) preg_replace('/[^\d]/', '', $price);
    }

    private function formatPeso(int $amount): string
    {
        return '₱'.number_format($amount);
    }

    private function formatCompactPeso(int $amount): string
    {
        if ($amount >= 1000000) {
            return '₱'.rtrim(rtrim(number_format($amount / 1000000, 1), '0'), '.').'M';
        }

        if ($amount >= 1000) {
            return '₱'.rtrim(rtrim(number_format($amount / 1000, 1), '0'), '.').'K';
        }

        return $this->formatPeso($amount);
    }

    private function initialsFromName(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        $initials = collect($parts)
            ->filter()
            ->take(2)
            ->map(fn (string $part) => strtoupper(substr($part, 0, 1)))
            ->implode('');

        return $initials !== '' ? $initials : strtoupper(substr($name, 0, 2));
    }

    private function buildAdminOrderSignal(int $totalOrders, int $completedOrders, int $pendingOrders, int $activeCustomers): array
    {
        $denominator = max($totalOrders, 1);

        return [
            [
                'label' => 'COMPLETED_FLOW',
                'value' => min(100, (int) round(($completedOrders / $denominator) * 100)),
                'color' => 'bg-primary-container',
                'text_color' => 'text-primary-container',
            ],
            [
                'label' => 'PENDING_QUEUE',
                'value' => min(100, (int) round(($pendingOrders / $denominator) * 100)),
                'color' => 'bg-secondary',
                'text_color' => 'text-secondary',
            ],
            [
                'label' => 'ACTIVE_CUSTOMERS',
                'value' => min(100, $activeCustomers * 10),
                'color' => 'bg-on-surface-variant',
                'text_color' => 'text-on-surface-variant',
            ],
        ];
    }

    private function storeProductImage($image): string
    {
        $directory = public_path('uploads/products');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('product_', true).'.'.$image->getClientOriginalExtension();
        $image->move($directory, $filename);

        return asset('uploads/products/'.$filename);
    }

    private function uniqueProductSlug(string $title, array $existingSlugs): string
    {
        $base = str($title)->slug()->toString();
        $slug = $base;
        $counter = 2;

        while (in_array($slug, $existingSlugs, true)) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function managedProducts(): array
    {
        $stored = $this->loadAdminCatalog()['products'];

        if (array_is_list($stored)) {
            return collect($stored)
                ->filter(fn ($product) => is_array($product) && isset($product['slug']))
                ->keyBy('slug')
                ->all();
        }

        return $stored;
    }

    private function deletedProductSlugs(): array
    {
        return $this->loadAdminCatalog()['deleted'];
    }

    private function loadAdminCatalog(): array
    {
        $path = $this->adminCatalogPath();

        if (file_exists($path)) {
            $decoded = json_decode((string) file_get_contents($path), true);

            return [
                'products' => is_array($decoded['products'] ?? null) ? $decoded['products'] : [],
                'deleted' => array_values(is_array($decoded['deleted'] ?? null) ? $decoded['deleted'] : []),
            ];
        }

        $sessionProducts = session('admin_products', []);
        $sessionDeleted = array_values(session('admin_deleted_products', []));

        if ($sessionProducts !== [] || $sessionDeleted !== []) {
            $products = array_is_list($sessionProducts)
                ? collect($sessionProducts)
                    ->filter(fn ($product) => is_array($product) && isset($product['slug']))
                    ->keyBy('slug')
                    ->all()
                : $sessionProducts;

            $this->saveAdminCatalog($products, $sessionDeleted);

            return [
                'products' => $products,
                'deleted' => $sessionDeleted,
            ];
        }

        return [
            'products' => [],
            'deleted' => [],
        ];
    }

    private function saveAdminCatalog(array $products, array $deleted): void
    {
        $path = $this->adminCatalogPath();
        $directory = dirname($path);

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        file_put_contents($path, json_encode([
            'products' => $products,
            'deleted' => array_values(array_unique($deleted)),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        session()->forget(['admin_products', 'admin_deleted_products']);
    }

    private function adminCatalogPath(): string
    {
        return storage_path('app/admin-catalog.json');
    }

    private function buildAdminProductPayload(Request $request, ?array $existingProduct, string $slug, int $releaseOrder): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'description' => ['required', 'string', 'max:2000'],
            'category' => ['required', 'in:basic,oversized,minimal'],
            'sizes' => ['required', 'array', 'min:1'],
            'sizes.*' => ['in:S,M,L,XL'],
            'featured_image' => [$existingProduct ? 'nullable' : 'required', 'image', 'max:4096'],
            'gallery_images' => ['nullable', 'array', 'max:4'],
            'gallery_images.*' => ['image', 'max:4096'],
            'remove_gallery' => ['nullable', 'array'],
            'remove_gallery.*' => ['string'],
        ]);

        $sizes = collect($data['sizes'])->unique()->values()->all();
        $priceValue = (int) round($data['price']);
        $categoryLabel = match ($data['category']) {
            'oversized' => 'KINETIC OVERSIZED',
            'minimal' => 'KINETIC MINIMAL',
            default => 'KINETIC BASICS',
        };

        $featuredImage = $existingProduct['image'] ?? '';
        if ($request->hasFile('featured_image')) {
            $featuredImage = $this->storeProductImage($request->file('featured_image'));
        }

        $galleryImages = collect($existingProduct['gallery'] ?? [])
            ->filter()
            ->reject(fn (string $image) => in_array($image, $data['remove_gallery'] ?? [], true))
            ->take(4)
            ->values()
            ->all();

        if ($request->hasFile('gallery_images')) {
            $newGalleryImages = collect($request->file('gallery_images', []))
                ->filter()
                ->take(4)
                ->map(fn ($image) => $this->storeProductImage($image))
                ->values()
                ->all();

            $galleryImages = collect($galleryImages)
                ->concat($newGalleryImages)
                ->take(4)
                ->values()
                ->all();
        }

        return [
            'slug' => $slug,
            'name' => $data['title'],
            'sku' => $existingProduct['sku'] ?? ('TL-'.strtoupper(substr(bin2hex(random_bytes(3)), 0, 6))),
            'category' => $categoryLabel,
            'shop_category' => $data['category'],
            'release_order' => $releaseOrder,
            'layout' => $existingProduct['layout'] ?? 'standard',
            'price' => $this->formatPeso($priceValue),
            'price_value' => $priceValue,
            'original_price' => $existingProduct['original_price'] ?? $this->formatPeso($priceValue + ($priceValue >= 1000 ? 300 : 200)),
            'badge' => $existingProduct['badge'] ?? 'NEW DROP',
            'short_description' => str($data['description'])->limit(120)->toString(),
            'description' => [$data['description']],
            'features' => $existingProduct['features'] ?? [
                'Admin managed product',
                'Exclusive THREADLAB release',
            ],
            'sizes' => $sizes,
            'selected_size' => $sizes[0],
            'image' => $featuredImage,
            'hero_image' => $featuredImage,
            'gallery' => array_slice($galleryImages, 0, 4),
        ];
    }

    private function emptyAdminProduct(): array
    {
        return [
            'slug' => '',
            'name' => '',
            'price_value' => '',
            'description' => [''],
            'shop_category' => 'basic',
            'sizes' => ['M'],
            'image' => '',
            'gallery' => [],
        ];
    }

    private function normalizeOrderStatus(?string $status): string
    {
        return match (strtolower((string) $status)) {
            'processing' => 'processing',
            'in transit', 'in_transit' => 'in_transit',
            'shipped' => 'shipped',
            'delivered', 'completed' => 'delivered',
            default => 'processing',
        };
    }

    private function displayOrderStatus(string $status): string
    {
        return match ($status) {
            'processing' => 'Processing',
            'in_transit' => 'In Transit',
            'shipped' => 'Shipped',
            'delivered' => 'Delivered',
            default => 'Processing',
        };
    }

    private function orderStatusStyle(string $status): string
    {
        return $this->isCompletedOrderStatus($status) ? 'muted' : 'primary';
    }

    private function orderActionLabel(string $status): string
    {
        return $this->isCompletedOrderStatus($status) ? 'View Receipt' : 'Track Order';
    }

    private function isCompletedOrderStatus(string $status): bool
    {
        return $status === 'delivered';
    }

    private function persistCustomerAccount(array $customer): void
    {
        $accounts = session('customer_accounts', []);
        $emailKey = strtolower($customer['email']);
        $accounts[$emailKey] = $customer;

        session([
            'customer_accounts' => $accounts,
            'customer_auth' => $customer,
        ]);
    }

    private function currentCart(): array
    {
        $customer = session('customer_auth');

        if ($customer) {
            $customerCarts = session('customer_carts', []);

            return $customerCarts[strtolower($customer['email'])] ?? [];
        }

        return session('guest_cart', session('cart', []));
    }

    private function storeCurrentCart(array $cart): void
    {
        $customer = session('customer_auth');

        if ($customer) {
            $customerCarts = session('customer_carts', []);
            $customerCarts[strtolower($customer['email'])] = $cart;
            session(['customer_carts' => $customerCarts]);

            return;
        }

        session([
            'guest_cart' => $cart,
            'cart' => $cart,
        ]);
    }
}
