<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>KINETIC // CUSTOMER DASHBOARD</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "on-surface": "#ffffff",
                            "surface-container-lowest": "#000000",
                            "outline": "#777575",
                            "on-primary": "#556600",
                            "surface-tint": "#f5ffc4",
                            "on-error": "#450900",
                            "primary-container": "#d5fb00",
                            "on-tertiary": "#675600",
                            "tertiary-container": "#fedb42",
                            "on-surface-variant": "#adaaaa",
                            "inverse-surface": "#fcf8f8",
                            "secondary-fixed": "#c4d0ff",
                            "error-dim": "#d53d18",
                            "tertiary-fixed-dim": "#efcd34",
                            "on-error-container": "#ffd2c8",
                            "on-primary-fixed": "#3d4a00",
                            "on-secondary-fixed": "#002d80",
                            "secondary-fixed-dim": "#b0c2ff",
                            "inverse-primary": "#556600",
                            "on-primary-container": "#4e5d00",
                            "primary": "#f5ffc4",
                            "surface-dim": "#0e0e0e",
                            "tertiary-fixed": "#fedb42",
                            "secondary-container": "#0053db",
                            "on-secondary-fixed-variant": "#0047bd",
                            "surface": "#0e0e0e",
                            "error-container": "#b92902",
                            "on-primary-fixed-variant": "#576800",
                            "surface-bright": "#2c2c2c",
                            "on-secondary-container": "#f8f7ff",
                            "on-secondary": "#001b55",
                            "surface-container-highest": "#262626",
                            "on-background": "#ffffff",
                            "on-tertiary-fixed-variant": "#685700",
                            "primary-fixed-dim": "#c8ec00",
                            "surface-variant": "#262626",
                            "surface-container-low": "#131313",
                            "surface-container": "#1a1919",
                            "on-tertiary-container": "#5d4d00",
                            "primary-fixed": "#d5fb00",
                            "primary-dim": "#cbef00",
                            "on-tertiary-fixed": "#473b00",
                            "secondary": "#7799ff",
                            "error": "#ff7351",
                            "tertiary-dim": "#efcd34",
                            "tertiary": "#ffeaa2",
                            "surface-container-high": "#201f1f",
                            "background": "#0e0e0e",
                            "inverse-on-surface": "#565554",
                            "secondary-dim": "#316bf3",
                            "outline-variant": "#484847"
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

            .kinetic-gradient {
                background: linear-gradient(135deg, #f5ffc4 0%, #d5fb00 100%);
            }

            .glass-panel {
                background: rgba(32, 31, 31, 0.6);
                backdrop-filter: blur(20px);
            }
        </style>
    </head>
    <body class="bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
        @include('partials.header')

        <div class="flex min-h-screen pt-20">
            <aside class="fixed left-0 top-0 z-40 hidden h-full w-64 flex-col bg-[#131313] pb-8 pt-24 shadow-[24px_0_48px_rgba(0,0,0,0.4)] lg:flex">
                <div class="mb-10 px-6">
                    <div class="mb-1 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-[#d5fb00]">VIP STATUS</div>
                    <div class="font-headline text-lg font-extrabold uppercase leading-tight text-white italic">{{ $vipStatus }}</div>
                </div>
                <nav class="flex-1 space-y-1">
                    <a class="group flex translate-x-1 items-center gap-4 rounded-none border-l-4 border-[#d5fb00] bg-[#201f1f] px-6 py-4 font-['Inter'] text-xs font-bold uppercase tracking-widest text-[#d5fb00] transition-all duration-300" href="{{ route('dashboard') }}">
                        <span class="material-symbols-outlined">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                    <a class="group flex items-center gap-4 px-6 py-4 font-['Inter'] text-xs font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white" href="#">
                        <span class="material-symbols-outlined">package_2</span>
                        <span>Order History</span>
                    </a>
                    <a class="group flex items-center gap-4 px-6 py-4 font-['Inter'] text-xs font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white" href="#">
                        <span class="material-symbols-outlined">person</span>
                        <span>Account</span>
                    </a>
                </nav>
                <div class="mb-8 mt-auto px-6">
                    <button class="kinetic-gradient w-full rounded-none py-3 text-[10px] font-bold uppercase tracking-[0.2em] text-on-primary-container transition-opacity hover:opacity-90" type="button">
                        UPGRADE STATUS
                    </button>
                </div>
                <div class="border-t border-white/5 pt-4">
                    <a class="flex items-center gap-4 px-6 py-3 font-['Inter'] text-xs font-bold uppercase tracking-widest text-white/40 transition-all hover:text-white" href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <span>Settings</span>
                    </a>
                    <form action="{{ route('customer.logout') }}" method="POST">
                        @csrf
                        <button class="flex w-full items-center gap-4 px-6 py-3 text-left font-['Inter'] text-xs font-bold uppercase tracking-widest text-white/40 transition-all hover:text-white" type="submit">
                            <span class="material-symbols-outlined">logout</span>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <main class="flex-1 bg-background p-6 lg:ml-64 lg:p-10">
                <div class="mx-auto max-w-[1200px]">
                    <header class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                        <div>
                            <h1 class="mb-2 font-headline text-5xl font-extrabold uppercase tracking-tighter text-white italic md:text-6xl">Welcome Back, <span class="text-primary-container">{{ $customerName }}</span></h1>
                            <p class="max-w-lg text-lg text-on-surface-variant">Your curated style edit and kinetic performance metrics are ready for review.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="text-right">
                                <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Member Since</div>
                                <div class="font-headline text-xl font-bold text-white">{{ $memberSince }}</div>
                            </div>
                        </div>
                    </header>

                    @if (session('account_success'))
                        <div class="mb-8 border border-primary-container/20 bg-primary-container/10 px-5 py-4 text-sm font-bold uppercase tracking-[0.2em] text-primary-container">
                            {{ session('account_success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 mt-8">
                            <h2 class="font-headline text-3xl font-extrabold uppercase tracking-tight text-white italic">Recent Acquisitions</h2>
                        </div>

                        @forelse ($recentOrders as $order)
                            <article class="col-span-12 flex items-center gap-6 bg-surface-container-low p-6 transition-colors hover:bg-surface-container-high md:col-span-6">
                                <div class="h-32 w-32 flex-shrink-0 overflow-hidden bg-surface-container-highest">
                                    <img alt="{{ $order['product_name'] }}" class="h-full w-full object-cover grayscale transition-all duration-500 hover:grayscale-0" src="{{ $order['product_image'] }}">
                                </div>
                                <div class="flex-1">
                                    <div class="mb-2 flex items-start justify-between">
                                        <h4 class="font-headline text-xl font-bold uppercase text-white italic">{{ $order['product_name'] }}</h4>
                                        <span class="{{ $order['status_style'] === 'primary' ? 'bg-primary-container/10 text-primary-container' : 'bg-surface-container-highest text-on-surface-variant' }} px-2 py-1 text-[10px] font-bold uppercase tracking-widest">{{ $order['status'] }}</span>
                                    </div>
                                    <p class="mb-4 text-xs text-on-surface-variant">ORDER #{{ $order['reference'] }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="font-bold text-white">{{ $order['total'] }}</span>
                                        <button class="font-label text-[10px] font-bold uppercase tracking-widest text-white transition-colors hover:text-primary-container" type="button">{{ $order['action'] }}</button>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <article class="col-span-12 border border-dashed border-outline-variant/20 bg-surface-container-low p-8 text-center">
                                <h3 class="font-headline text-2xl font-bold uppercase italic text-white">No orders yet</h3>
                                <p class="mt-3 text-sm uppercase tracking-[0.2em] text-on-surface-variant">Complete your first purchase to unlock a personalized dashboard history.</p>
                                <a class="mt-6 inline-block bg-primary-container px-6 py-3 text-xs font-black uppercase tracking-[0.2em] text-on-primary-container" href="{{ route('shop') }}">Shop Now</a>
                            </article>
                        @endforelse

                        <section class="col-span-12 mt-12 flex flex-col overflow-hidden bg-surface-container-low md:flex-row">
                            <div class="order-2 flex flex-col justify-center p-12 md:order-1 md:w-1/2">
                                <span class="mb-4 font-headline text-xs font-bold uppercase tracking-[0.3em] text-secondary">Personal Style Edit</span>
                                <h2 class="mb-6 font-headline text-5xl font-extrabold uppercase leading-[0.9] text-white italic">THE<br>CYBER-PUNK<br>COLLECTION</h2>
                                <p class="mb-8 max-w-md text-lg text-on-surface-variant">Based on your recent interest in techwear and structural silhouettes, we've curated a unique drop just for your tier.</p>
                                <div>
                                    <a class="kinetic-gradient inline-block px-10 py-5 text-sm font-extrabold uppercase tracking-[0.2em] text-on-primary-container transition-transform active:scale-95" href="{{ route('shop') }}">
                                        SHOP THE EDIT
                                    </a>
                                </div>
                            </div>
                            <div class="order-1 min-h-[400px] md:order-2 md:w-1/2">
                                <img alt="Style Edit" class="h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5ldsVdfSlU4hqHz_LriYolFNeySHrvqBePKwOXTN7XJozSYHlUj-TNKqyfSlLTBqhIxV-0ekZp77oi59R0Vpbgbsox461fkHUcKhz9l2_TJC5OgoZ9tw31KBZ5V_TW1Etq4VAiG5zREDZ9E_M0cuvrvFcmhuovtLE40ohuOgJZYI9Ny7nZOddh1Y3ytxMt3_PNkUxVoIFJ8pSbk5O2rkOONnoKaJkPiF-16n71H2dj3Z5-uQ7YpFu05vVOWUcjIiib6XxdxtzW74">
                            </div>
                        </section>

                        <section class="col-span-12 mt-12 border border-outline-variant/20 bg-surface-container-low p-8">
                            <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                                <div>
                                    <h2 class="font-headline text-3xl font-extrabold uppercase tracking-tight text-white italic">Account Details</h2>
                                    <p class="mt-2 text-sm uppercase tracking-[0.2em] text-on-surface-variant">Manage your saved name and shipping address</p>
                                </div>
                                <div class="text-xs uppercase tracking-[0.2em] text-on-surface-variant">{{ $customerProfile['email'] }}</div>
                            </div>

                            <form action="{{ route('dashboard.account.update') }}" class="grid grid-cols-1 gap-6 md:grid-cols-2" method="POST">
                                @csrf
                                <label class="block">
                                    <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">First Name</span>
                                    <input class="w-full border border-outline-variant/20 bg-surface px-4 py-4 text-white focus:border-primary-container focus:outline-none" name="first_name" type="text" value="{{ old('first_name', $customerProfile['first_name']) }}">
                                </label>
                                <label class="block">
                                    <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Last Name</span>
                                    <input class="w-full border border-outline-variant/20 bg-surface px-4 py-4 text-white focus:border-primary-container focus:outline-none" name="last_name" type="text" value="{{ old('last_name', $customerProfile['last_name']) }}">
                                </label>
                                <label class="block md:col-span-2">
                                    <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Street Address</span>
                                    <input class="w-full border border-outline-variant/20 bg-surface px-4 py-4 text-white focus:border-primary-container focus:outline-none" name="street_address" type="text" value="{{ old('street_address', $customerProfile['street_address']) }}">
                                </label>
                                <label class="block">
                                    <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">City</span>
                                    <input class="w-full border border-outline-variant/20 bg-surface px-4 py-4 text-white focus:border-primary-container focus:outline-none" name="city" type="text" value="{{ old('city', $customerProfile['city']) }}">
                                </label>
                                <label class="block">
                                    <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Zip Code</span>
                                    <input class="w-full border border-outline-variant/20 bg-surface px-4 py-4 text-white focus:border-primary-container focus:outline-none" name="zip_code" type="text" value="{{ old('zip_code', $customerProfile['zip_code']) }}">
                                </label>
                                <div class="md:col-span-2">
                                    <button class="kinetic-gradient px-8 py-4 text-xs font-black uppercase tracking-[0.25em] text-on-primary-container transition-transform hover:scale-[0.99] active:scale-95" type="submit">
                                        Save Account Details
                                    </button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </main>
        </div>

        <nav class="fixed bottom-0 z-50 flex h-20 w-full items-center justify-around bg-[#0e0e0e]/95 px-4 backdrop-blur-xl md:hidden">
            <a class="flex flex-col items-center gap-1 text-[#d5fb00]" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span class="text-[8px] font-bold uppercase tracking-widest">Dashboard</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-white/40" href="#">
                <span class="material-symbols-outlined">military_tech</span>
                <span class="text-[8px] font-bold uppercase tracking-widest">Tier</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-white/40" href="#">
                <span class="material-symbols-outlined">hotel_class</span>
                <span class="text-[8px] font-bold uppercase tracking-widest">Rewards</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-white/40" href="#">
                <span class="material-symbols-outlined">package_2</span>
                <span class="text-[8px] font-bold uppercase tracking-widest">Orders</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-white/40" href="#">
                <span class="material-symbols-outlined">person</span>
                <span class="text-[8px] font-bold uppercase tracking-widest">Account</span>
            </a>
        </nav>
    </body>
</html>
