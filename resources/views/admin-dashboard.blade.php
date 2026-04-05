<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>VOLT_ADMIN | KINETIC_CORE</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;family=Inter:wght@400;700;900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "surface-container-lowest": "#000000",
                            "on-surface-variant": "#adaaaa",
                            "on-primary-fixed-variant": "#576800",
                            "tertiary-fixed": "#fedb42",
                            "on-secondary-container": "#f8f7ff",
                            "surface-bright": "#2c2c2c",
                            "secondary-container": "#0053db",
                            "on-secondary-fixed-variant": "#0047bd",
                            "primary-fixed-dim": "#c8ec00",
                            "on-tertiary-fixed": "#473b00",
                            "on-tertiary-fixed-variant": "#685700",
                            "on-secondary": "#001b55",
                            "on-primary": "#556600",
                            "surface-variant": "#262626",
                            "tertiary-fixed-dim": "#efcd34",
                            "surface-container-high": "#201f1f",
                            "error-container": "#b92902",
                            "primary-dim": "#cbef00",
                            "secondary-fixed-dim": "#b0c2ff",
                            "surface-container-highest": "#262626",
                            "background": "#0e0e0e",
                            "error-dim": "#d53d18",
                            "secondary": "#7799ff",
                            "surface-container": "#1a1919",
                            "secondary-fixed": "#c4d0ff",
                            "on-surface": "#ffffff",
                            "error": "#ff7351",
                            "primary-fixed": "#d5fb00",
                            "surface-dim": "#0e0e0e",
                            "surface": "#0e0e0e",
                            "on-primary-container": "#4e5d00",
                            "surface-container-low": "#131313",
                            "surface-tint": "#f5ffc4",
                            "on-tertiary": "#675600",
                            "inverse-primary": "#556600",
                            "outline-variant": "#484847",
                            "on-error": "#450900",
                            "on-primary-fixed": "#3d4a00",
                            "on-background": "#ffffff",
                            "inverse-surface": "#fcf8f8",
                            "on-secondary-fixed": "#002d80",
                            "tertiary-container": "#fedb42",
                            "primary-container": "#d5fb00",
                            "tertiary": "#ffeaa2",
                            "on-tertiary-container": "#5d4d00",
                            "primary": "#f5ffc4",
                            "outline": "#777575",
                            "tertiary-dim": "#efcd34",
                            "secondary-dim": "#316bf3",
                            "on-error-container": "#ffd2c8"
                        },
                        borderRadius: {
                            DEFAULT: "0.125rem",
                            lg: "0.25rem",
                            xl: "0.5rem",
                            full: "0.75rem"
                        },
                        fontFamily: {
                            headline: ["Plus Jakarta Sans"],
                            body: ["Inter"],
                            label: ["Inter"]
                        }
                    },
                },
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            body { font-family: 'Inter', sans-serif; }

            .editorial-grid {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                gap: 1.5rem;
            }

            .bento-card {
                background: #131313;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .bento-card:hover {
                background: #201f1f;
            }

            .admin-status-select {
                background-image: none;
            }
        </style>
    </head>
    <body class="bg-background text-on-background selection:bg-primary-container selection:text-on-primary-container">
        <header class="fixed top-0 z-50 flex h-16 w-full items-center justify-between border-b border-[#484847]/20 bg-[#0e0e0e]/80 px-6 font-['Plus_Jakarta_Sans'] tracking-tight backdrop-blur-xl">
            <div class="text-2xl font-black uppercase italic text-[#d5fb00]">VOLT_ADMIN</div>
            <div class="flex items-center gap-6">
                <div class="hidden gap-8 md:flex">
                    <span class="cursor-pointer font-bold text-[#d5fb00] transition-transform active:scale-95">SYSTEM_STATUS</span>
                    <span class="cursor-pointer text-white/70 transition-colors duration-300 hover:text-[#d5fb00] active:scale-95">LOGS</span>
                    <span class="cursor-pointer text-white/70 transition-colors duration-300 hover:text-[#d5fb00] active:scale-95">REPORTS</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined cursor-pointer text-white/70 hover:text-[#d5fb00]">notifications</span>
                    <span class="material-symbols-outlined cursor-pointer text-white/70 hover:text-[#d5fb00]">settings</span>
                    <img alt="Admin Profile" class="h-8 w-8 rounded-full border border-primary-container/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnfhBTAR42k3DjoAdqz6TtW9Zlp9af9Hsrwe7CJ9CNGg02GCLa25-X5NhDRHgNx9oYQcwRobvVygbmbYZxyRJy1ZfsAc4ICAeGBpL1-_wd2v1oONfuhDrbPGXurknMQK3zuZWhEmRWB2eW6W8gYhL-7x-_dARcIGRwKD0KrXAQLg2Eoy6oEpOfXpfXc-azjZSZVIlZmH-w0xnuCOisRMNwNvPOZuHI2jjz2T4mVLWzT-IJy4Q-kGHT-zdfhlo8sTovoTqXeMn2wmw">
                </div>
            </div>
        </header>

        <aside class="fixed left-0 top-0 z-[60] hidden h-full w-64 flex-col bg-[#131313] pb-8 pt-20 shadow-[0px_24px_48px_rgba(0,0,0,0.4)] lg:flex">
            <div class="mb-10 px-6">
                <div class="flex items-center gap-3">
                    <div class="h-8 w-2 bg-primary-container"></div>
                    <div>
                        <div class="font-['Inter'] text-[12px] font-black uppercase tracking-widest text-[#d5fb00]">KINETIC_CORE</div>
                        <div class="text-[10px] font-bold text-white/30">V2.0.48_STABLE</div>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <div class="mb-2 flex cursor-pointer items-center gap-4 border-l-4 border-[#d5fb00] bg-[#201f1f] px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-[#d5fb00]">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    Dashboard
                </div>
                <div class="mb-2 flex cursor-pointer items-center gap-4 px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white">
                    <span class="material-symbols-outlined" data-icon="monitoring">monitoring</span>
                    Analytics
                </div>
                <a class="mb-2 flex items-center gap-4 px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white" href="{{ route('admin.products.index') }}">
                    <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                    Inventory
                </a>
                <div class="mb-2 flex cursor-pointer items-center gap-4 px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white">
                    <span class="material-symbols-outlined" data-icon="payments">payments</span>
                    Transactions
                </div>
                <div class="mb-2 flex cursor-pointer items-center gap-4 px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white">
                    <span class="material-symbols-outlined" data-icon="terminal">terminal</span>
                    System Logs
                </div>
            </nav>
            <div class="mb-8 px-6">
                <button class="w-full bg-primary-container py-3 text-[10px] font-black uppercase tracking-tighter text-on-primary-container transition-transform active:scale-95" type="button">
                    DEPLOY UPDATE
                </button>
            </div>
            <div class="space-y-4 px-6">
                <div class="flex cursor-pointer items-center gap-4 text-[10px] font-bold uppercase tracking-widest text-white/40 hover:text-white">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                    Support
                </div>
                <div class="flex cursor-pointer items-center gap-4 text-[10px] font-bold uppercase tracking-widest text-white/40 hover:text-error">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    Logout
                </div>
            </div>
        </aside>

        <main class="px-6 pb-12 pt-24 lg:ml-64">
            <div class="mx-auto max-w-[1200px]">
                @if (session('admin_status_success'))
                    <div class="mb-8 border border-primary-container/20 bg-primary-container/10 px-5 py-4 text-sm font-bold uppercase tracking-[0.2em] text-primary-container">
                        {{ session('admin_status_success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-8 border border-error/20 bg-error/10 px-5 py-4 text-sm font-bold uppercase tracking-[0.2em] text-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <section class="editorial-grid mb-12">
                    <div class="col-span-12 lg:col-span-8">
                        <h1 class="mb-4 font-headline text-7xl font-extrabold uppercase leading-none tracking-tighter italic md:text-8xl">
                            SYSTEM <span class="text-primary-container">OVERVIEW</span>
                        </h1>
                        <p class="max-w-xl text-lg text-on-surface-variant">
                            Real-time transaction matrix and operational velocity. Core stability maintained at <span class="text-primary-container">{{ $stabilityPercent }}%</span>.
                        </p>
                    </div>
                    <div class="col-span-12 flex items-end justify-end lg:col-span-4">
                        <div class="rounded-xl border-l-2 border-primary-container bg-surface-container-high p-6">
                            <div class="mb-1 text-on-surface-variant text-label-sm font-bold uppercase tracking-widest">Live Node</div>
                            <div class="font-headline text-2xl font-bold">{{ $liveNode }}</div>
                        </div>
                    </div>
                </section>

                <section class="editorial-grid mb-12">
                    <div class="bento-card group relative col-span-12 overflow-hidden p-8 md:col-span-6 lg:col-span-3">
                        <div class="relative z-10">
                            <div class="mb-2 text-xs font-black uppercase tracking-[0.2em] text-primary-container">Total Orders</div>
                            <div class="font-headline text-4xl font-black italic">{{ $totalOrders }}</div>
                            <div class="mt-4 flex items-center gap-2 text-xs font-bold text-primary/60">
                                <span class="material-symbols-outlined text-sm">trending_up</span>
                                {{ $activeCustomers }} ACTIVE CUSTOMERS
                            </div>
                        </div>
                        <div class="absolute -bottom-4 -right-4 opacity-5 transition-opacity group-hover:opacity-10">
                            <span class="material-symbols-outlined text-[120px]" data-icon="shopping_cart">shopping_cart</span>
                        </div>
                    </div>

                    <div class="bento-card relative col-span-12 bg-gradient-to-br from-surface-container-low to-surface-container-high border-t-4 border-secondary p-8 md:col-span-6 lg:col-span-3">
                        <div class="relative z-10">
                            <div class="mb-2 text-xs font-black uppercase tracking-[0.2em] text-secondary">Total Revenue</div>
                            <div class="font-headline text-4xl font-black italic text-on-surface">{{ $totalRevenue }}</div>
                            <div class="mt-4 flex items-center gap-2 text-xs font-bold text-secondary/60">
                                <span class="material-symbols-outlined text-sm">payments</span>
                                AVG ORDER {{ $averageOrderValue }}
                            </div>
                        </div>
                    </div>

                    <div class="bento-card group relative col-span-12 overflow-hidden p-8 md:col-span-6 lg:col-span-3">
                        <div class="relative z-10">
                            <div class="mb-2 text-xs font-black uppercase tracking-[0.2em] text-primary-container">Pending Orders</div>
                            <div class="font-headline text-4xl font-black italic">{{ $pendingOrders }}</div>
                            <div class="mt-4 flex items-center gap-2">
                                <span class="inline-block h-2 w-2 animate-pulse rounded-full bg-primary-container"></span>
                                <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Awaiting Dispatch</span>
                            </div>
                        </div>
                        <div class="absolute -bottom-4 -right-4 opacity-5 transition-opacity group-hover:opacity-10">
                            <span class="material-symbols-outlined text-[120px]" data-icon="pending_actions">pending_actions</span>
                        </div>
                    </div>

                    <div class="bento-card col-span-12 overflow-hidden bg-surface-container-highest p-8 md:col-span-6 lg:col-span-3">
                        <div class="relative z-10">
                            <div class="mb-2 text-xs font-black uppercase tracking-[0.2em] text-white/40">Completed Orders</div>
                            <div class="font-headline text-4xl font-black italic">{{ $completedOrders }}</div>
                            <div class="mt-4 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-on-surface-variant">
                                <span class="material-symbols-outlined text-sm text-primary-container">verified</span>
                                Fulfillment_Success
                            </div>
                        </div>
                    </div>
                </section>

                <section class="editorial-grid">
                    <div class="col-span-12 rounded-lg bg-surface-container-low p-8">
                        <div class="mb-8 flex items-end justify-between">
                            <div>
                                <h2 class="font-headline text-4xl font-black uppercase tracking-tighter italic">Recent <span class="text-secondary">Orders</span></h2>
                                <p class="mt-2 text-label-sm uppercase tracking-[0.1em] text-on-surface-variant">Latest activity across the network</p>
                            </div>
                            <div class="flex gap-4">
                                <button class="bg-surface-container-highest px-6 py-2 text-[10px] font-black uppercase tracking-widest transition-all hover:bg-secondary hover:text-on-secondary" type="button">Export_CSV</button>
                                <button class="bg-primary-container px-6 py-2 text-[10px] font-black uppercase tracking-widest text-on-primary-container transition-transform active:scale-95" type="button">Filter_Matrix</button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left font-['Inter']">
                                <thead class="border-b border-outline-variant/20">
                                    <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant">
                                        <th class="pb-4 font-bold">Transaction ID</th>
                                        <th class="pb-4 font-bold">Customer Name</th>
                                        <th class="pb-4 font-bold">Value</th>
                                        <th class="pb-4 font-bold">Status</th>
                                        <th class="pb-4 text-right font-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/10">
                                    @forelse ($recentTransactions as $transaction)
                                        <tr class="group transition-colors hover:bg-surface-container-high/50">
                                            <td class="py-6 text-sm font-black text-secondary">{{ $transaction['reference'] }}</td>
                                            <td class="py-6">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-surface-container-highest text-[10px] font-bold">{{ $transaction['initials'] }}</div>
                                                    <span class="text-sm font-bold uppercase">{{ $transaction['customer_name'] }}</span>
                                                </div>
                                            </td>
                                            <td class="py-6 text-sm font-bold">{{ $transaction['value'] }}</td>
                                            <td class="py-6">
                                                <form action="{{ route('admin.orders.status.update') }}" class="flex items-center gap-2" method="POST">
                                                    @csrf
                                                    <input name="reference" type="hidden" value="{{ $transaction['reference'] }}">
                                                    <select class="admin-status-select border {{ $transaction['status_pending'] ? 'border-primary-container/20 bg-primary-container/10 text-primary-container' : 'border-white/20 bg-white/10 text-white' }} px-3 py-1 text-[10px] font-black uppercase tracking-widest focus:border-primary-container focus:outline-none focus:ring-0" name="status" onchange="this.form.submit()">
                                                        <option value="processing" @selected($transaction['status_key'] === 'processing')>Processing</option>
                                                        <option value="in_transit" @selected($transaction['status_key'] === 'in_transit')>In Transit</option>
                                                        <option value="shipped" @selected($transaction['status_key'] === 'shipped')>Shipped</option>
                                                        <option value="delivered" @selected($transaction['status_key'] === 'delivered')>Delivered</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="py-6 text-right">
                                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">
                                                    {{ $transaction['status_pending'] ? 'Live' : 'Closed' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="py-10 text-sm text-on-surface-variant" colspan="5">
                                                No customer activity yet. Orders will appear here after the first successful checkout.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="editorial-grid mt-12">
                    <div class="col-span-12 flex flex-col justify-between bg-surface-container-high p-8 lg:col-span-4">
                        <div>
                            <h3 class="mb-4 font-headline text-2xl font-black uppercase italic">Order_Signal</h3>
                            <div class="mt-8 space-y-6">
                                @foreach ($orderSignal as $signal)
                                    <div>
                                        <div class="mb-2 flex justify-between text-[10px] font-bold tracking-widest {{ $signal['text_color'] }}">
                                            <span>{{ $signal['label'] }}</span>
                                            <span>{{ $signal['value'] }}%</span>
                                        </div>
                                        <div class="h-1 w-full bg-surface-container-highest">
                                            <div class="h-full {{ $signal['color'] }}" style="width: {{ $signal['value'] }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-12 text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant/40">
                            {{ $hasAdminData ? 'LIVE_SESSION_MATRIX' : 'AWAITING_FIRST_ORDER' }}
                        </div>
                    </div>
                    <div class="relative col-span-12 min-h-[300px] overflow-hidden lg:col-span-8">
                        <img alt="Performance Analytics" class="h-full w-full object-cover brightness-50 contrast-125 grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8wwbxbFOJ4oI4xYp3lxF5BR9KHt-cf9cVrQadfje7ryn-egwnUBy4x1eSnOl3bE6ig7nVffzNeobY5KD-mfkC7K8OrOAMu9LDB9CIadfIAqXMp9g23hk_09jh_xqxxIxM1-HPZNczan5N4LMCGuEPg0_am53DULwHKk1zXLWDV_vAPiYWfihrpqXd5TyPyjOxqgYRoUTYzaCCwVGcEoCciLonIQlc-H1aKgkH4xWreqV8-Khl2sLvkI-xfSi4m8YbZO5X6eU_Sfc">
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent"></div>
                        <div class="absolute bottom-8 left-8">
                            <div class="mb-2 font-headline text-4xl font-black italic text-display-md">LIVE_CUSTOMERS</div>
                            <div class="text-xl font-black text-primary-container">{{ $activeCustomers }} REGISTERED ACCOUNTS</div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <nav class="fixed bottom-0 z-50 flex h-16 w-full items-center justify-around border-t border-[#484847]/20 bg-[#0e0e0e]/95 backdrop-blur-xl md:hidden">
            <div class="flex flex-col items-center text-[#d5fb00]">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="mt-1 text-[8px] font-bold uppercase tracking-widest">Dash</span>
            </div>
            <div class="flex flex-col items-center text-white/50">
                <span class="material-symbols-outlined" data-icon="monitoring">monitoring</span>
                <span class="mt-1 text-[8px] font-bold uppercase tracking-widest">Analytics</span>
            </div>
            <div class="flex flex-col items-center text-white/50">
                <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                <span class="mt-1 text-[8px] font-bold uppercase tracking-widest">Stock</span>
            </div>
            <div class="flex flex-col items-center text-white/50">
                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                <span class="mt-1 text-[8px] font-bold uppercase tracking-widest">Sales</span>
            </div>
        </nav>

        <a class="fixed bottom-24 right-6 z-[70] flex h-14 w-14 items-center justify-center rounded-full bg-primary-container text-on-primary-container shadow-[0px_24px_48px_rgba(213,251,0,0.3)] transition-transform active:scale-90 md:bottom-8 md:right-8" href="{{ route('admin.products.create') }}">
            <span class="material-symbols-outlined font-black" data-icon="add">add</span>
        </a>
    </body>
</html>
