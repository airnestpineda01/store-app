@php
    $customerAuth = session('customer_auth');
    $customerEmail = $customerAuth ? strtolower($customerAuth['email']) : null;
    $customerCarts = session('customer_carts', []);
    $cartPreviewItems = collect(
        $customerEmail
            ? ($customerCarts[$customerEmail] ?? [])
            : session('guest_cart', session('cart', []))
    )->values();
    $cartCount = $cartPreviewItems->sum('quantity');
    $cartSubtotal = '₱'.number_format($cartPreviewItems->sum(fn ($item) => $item['price_value'] * $item['quantity']));
@endphp

<nav class="fixed top-0 z-50 w-full border-b border-[#484847]/20 bg-[#0e0e0e]/80 px-6 py-6 backdrop-blur-xl">
    <div class="mx-auto flex w-full max-w-[1200px] items-center justify-between">
        <a class="font-headline text-3xl font-black italic tracking-tighter text-[#d5fb00]" href="{{ route('home') }}">THREADLAB</a>
        <div class="hidden items-center gap-8 md:flex">
            <a class="{{ request()->routeIs('home') ? 'border-b-2 border-[#d5fb00] pb-1 text-[#d5fb00]' : 'text-white' }} font-headline text-sm font-black uppercase tracking-tighter transition-colors duration-300 hover:text-[#d5fb00]" href="{{ route('home') }}">HOME</a>
            <a class="{{ request()->routeIs('shop') || request()->routeIs('product.show') || request()->routeIs('cart') || request()->routeIs('checkout') ? 'border-b-2 border-[#d5fb00] pb-1 text-[#d5fb00]' : 'text-white' }} font-headline text-sm font-black uppercase tracking-tighter transition-colors duration-300 hover:text-[#d5fb00]" href="{{ route('shop') }}">SHOP</a>
            <a class="font-headline text-sm font-black uppercase tracking-tighter text-white transition-colors duration-300 hover:text-[#d5fb00]" href="#">COLLECTIONS</a>
            <a class="{{ request()->routeIs('contact') ? 'border-b-2 border-[#d5fb00] pb-1 text-[#d5fb00]' : 'text-white' }} font-headline text-sm font-black uppercase tracking-tighter transition-colors duration-300 hover:text-[#d5fb00]" href="{{ route('contact') }}">CONTACT</a>
        </div>
        <div class="flex items-center gap-6">
            <button class="scale-95 text-white transition-transform hover:text-[#d5fb00] active:scale-90" type="button">
                <span class="material-symbols-outlined" data-icon="search">search</span>
            </button>
            <div class="group relative hidden md:block">
                <a class="{{ request()->routeIs('cart') ? 'text-[#d5fb00]' : 'text-white' }} relative block scale-95 transition-transform hover:text-[#d5fb00] active:scale-90" href="{{ route('cart') }}">
                    <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                    @if ($cartCount > 0)
                        <span class="absolute -right-2 -top-2 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-[#d5fb00] px-1 text-[10px] font-bold leading-none text-black">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <div class="invisible absolute right-0 top-full z-50 mt-4 w-[360px] translate-y-2 border border-[#484847]/40 bg-[#131313]/95 p-4 opacity-0 shadow-[0_24px_60px_rgba(0,0,0,0.45)] backdrop-blur-xl transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
                    <div class="absolute -top-2 right-4 h-4 w-4 rotate-45 border-l border-t border-[#484847]/40 bg-[#131313]/95"></div>
                    <div class="mb-4 flex items-center justify-between border-b border-white/10 pb-3">
                        <div>
                            <p class="font-headline text-sm font-black uppercase tracking-[0.2em] text-[#d5fb00]">Cart Preview</p>
                            <p class="mt-1 text-xs text-white/50">{{ $cartCount > 0 ? 'Recently added pieces' : 'Your bag is empty' }}</p>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/40">{{ $cartCount }} Items</span>
                    </div>

                    @if ($cartPreviewItems->isNotEmpty())
                        <div class="space-y-3">
                            @foreach ($cartPreviewItems->take(3) as $item)
                                <a class="flex items-center gap-3 border border-transparent bg-[#1a1919] p-3 transition-colors hover:border-[#d5fb00]/30 hover:bg-[#201f1f]" href="{{ route('cart') }}">
                                    <img alt="{{ $item['name'] }}" class="h-16 w-16 object-cover" src="{{ $item['image'] }}">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate font-headline text-sm font-black uppercase tracking-tight text-white">{{ $item['name'] }}</p>
                                        <p class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/45">Size {{ $item['size'] }} / Qty {{ $item['quantity'] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-headline text-sm font-black text-[#d5fb00]">{{ $item['price'] }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-4 border-t border-white/10 pt-4">
                            <div class="mb-4 flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/45">Subtotal</span>
                                <span class="font-headline text-base font-black text-white">{{ $cartSubtotal }}</span>
                            </div>
                            <a class="block w-full bg-[#d5fb00] px-4 py-3 text-center font-headline text-xs font-black uppercase tracking-[0.25em] text-black transition-opacity hover:opacity-90" href="{{ route('cart') }}">
                                View Cart
                            </a>
                        </div>
                    @else
                        <div class="border border-dashed border-white/10 bg-[#1a1919] px-4 py-8 text-center">
                            <p class="font-headline text-sm font-black uppercase tracking-[0.2em] text-white">No items yet</p>
                            <p class="mt-2 text-xs uppercase tracking-[0.2em] text-white/40">Add a piece to see it here</p>
                        </div>
                    @endif
                </div>
            </div>

            <a class="{{ request()->routeIs('cart') ? 'text-[#d5fb00]' : 'text-white' }} relative block scale-95 transition-transform hover:text-[#d5fb00] active:scale-90 md:hidden" href="{{ route('cart') }}">
                <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                @if ($cartCount > 0)
                    <span class="absolute -right-2 -top-2 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-[#d5fb00] px-1 text-[10px] font-bold leading-none text-black">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>
            <a class="{{ request()->routeIs('dashboard') ? 'text-[#d5fb00]' : 'text-white' }} scale-95 transition-transform hover:text-[#d5fb00] active:scale-90" href="{{ $customerAuth ? route('dashboard') : route('customer.login') }}">
                <span class="material-symbols-outlined" data-icon="person">person</span>
            </a>
        </div>
    </div>
</nav>
