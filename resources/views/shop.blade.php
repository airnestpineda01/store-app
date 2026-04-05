<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | Shop Collection</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "secondary-fixed": "#c4d0ff",
                            "outline-variant": "#484847",
                            "on-secondary-container": "#f8f7ff",
                            "on-primary-container": "#4e5d00",
                            "on-primary": "#556600",
                            "secondary-fixed-dim": "#b0c2ff",
                            "surface-dim": "#0e0e0e",
                            "tertiary-container": "#fedb42",
                            "on-surface": "#ffffff",
                            "error-dim": "#d53d18",
                            "surface-container-high": "#201f1f",
                            "tertiary": "#ffeaa2",
                            "on-background": "#ffffff",
                            "primary-container": "#d5fb00",
                            "on-error-container": "#ffd2c8",
                            "surface-bright": "#2c2c2c",
                            "surface": "#0e0e0e",
                            "on-secondary-fixed-variant": "#0047bd",
                            "primary-fixed-dim": "#c8ec00",
                            "surface-container-low": "#131313",
                            "surface-container": "#1a1919",
                            "on-tertiary-fixed": "#473b00",
                            "background": "#0e0e0e",
                            "primary": "#f5ffc4",
                            "tertiary-dim": "#efcd34",
                            "inverse-on-surface": "#565554",
                            "surface-container-lowest": "#000000",
                            "primary-dim": "#cbef00",
                            "surface-variant": "#262626",
                            "on-secondary-fixed": "#002d80",
                            "surface-tint": "#f5ffc4",
                            "surface-container-highest": "#262626",
                            "tertiary-fixed": "#fedb42",
                            "on-secondary": "#001b55",
                            "inverse-surface": "#fcf8f8",
                            "error": "#ff7351",
                            "on-primary-fixed-variant": "#576800",
                            "on-primary-fixed": "#3d4a00",
                            "error-container": "#b92902",
                            "on-error": "#450900",
                            "on-tertiary-fixed-variant": "#685700",
                            "inverse-primary": "#556600",
                            "tertiary-fixed-dim": "#efcd34",
                            "primary-fixed": "#d5fb00",
                            "secondary-dim": "#316bf3",
                            "on-tertiary-container": "#5d4d00",
                            "secondary": "#7799ff",
                            "on-surface-variant": "#adaaaa",
                            "secondary-container": "#0053db",
                            "outline": "#777575",
                            "on-tertiary": "#675600"
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

            .tonal-shift-via-bg-surface-container-low {
                background-color: rgba(19, 19, 19, 0.8);
            }

            .glass-gradient {
                background: linear-gradient(135deg, #f5ffc4 0%, #d5fb00 100%);
            }

            body {
                background-color: #0e0e0e;
                color: #ffffff;
                font-family: 'Inter', sans-serif;
            }

            .shop-transition-surface {
                transition: opacity 220ms ease, transform 220ms ease, filter 220ms ease;
                transform-origin: top center;
            }

            .shop-transition-surface.is-entering {
                opacity: 0;
                transform: translateY(18px);
                filter: blur(8px);
            }

            .shop-transition-surface.is-leaving {
                opacity: 0;
                transform: translateY(12px);
                filter: blur(6px);
            }

            @media (prefers-reduced-motion: reduce) {
                .shop-transition-surface {
                    transition: none;
                }

                .shop-transition-surface.is-entering,
                .shop-transition-surface.is-leaving {
                    opacity: 1;
                    transform: none;
                    filter: none;
                }
            }
        </style>
    </head>
    <body class="bg-background text-on-background">
        @include('partials.header')

        <main class="pb-12 pt-24">
            <header class="mx-auto max-w-[1200px] px-6 py-16 md:py-24">
                <div class="relative mb-4 inline-block">
                    <h1 class="font-headline text-6xl font-black uppercase leading-none tracking-tighter md:text-8xl">
                        Shop <span class="text-primary-container italic">Collection</span>
                    </h1>
                    <div class="absolute -right-8 -top-4 rounded-full bg-secondary px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-black">KINETIC EDITORIAL</div>
                </div>
                <p class="mt-6 max-w-2xl font-body text-lg text-on-surface-variant md:text-xl">
                    Explore our curated line of premium t-shirts. Engineered for the high-velocity urban lifestyle.
                </p>
            </header>

            <section class="sticky top-16 z-40 border-y border-outline-variant/10 bg-surface/90 px-6 py-6 backdrop-blur-md">
                <div class="mx-auto flex max-w-[1200px] flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                    <div class="flex flex-wrap gap-3">
                        @foreach ($shopCategories as $categoryKey => $categoryLabel)
                            <a
                                class="{{ $selectedCategory === $categoryKey ? 'bg-primary-container text-on-primary-container' : 'bg-surface-container-high text-white hover:text-primary-container' }} rounded-full px-6 py-2 text-xs font-bold uppercase tracking-widest transition-colors"
                                data-shop-transition-link
                                href="{{ route('shop', ['category' => $categoryKey, 'sort' => $selectedSort]) }}"
                            >
                                {{ $categoryLabel }}
                            </a>
                        @endforeach
                    </div>
                    <form action="{{ route('shop') }}" class="flex items-center gap-4 rounded-lg bg-surface-container-low px-4 py-2" method="GET">
                        <input name="category" type="hidden" value="{{ $selectedCategory }}">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Sort By:</span>
                        <select class="cursor-pointer border-none bg-transparent text-xs font-bold uppercase tracking-widest focus:ring-0" name="sort" onchange="this.form.submit()">
                            @foreach ($sortOptions as $sortKey => $sortLabel)
                                <option {{ $selectedSort === $sortKey ? 'selected' : '' }} value="{{ $sortKey }}">{{ $sortLabel }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </section>

            <section class="shop-transition-surface mx-auto max-w-[1200px] px-6 py-16" data-shop-transition-surface>
                <div class="grid grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 lg:grid-cols-3">
                    @forelse ($products as $product)
                        @if (($product['layout'] ?? 'standard') === 'feature')
                            <article class="group relative overflow-hidden rounded-xl bg-surface-container-low lg:col-span-2">
                                <div class="flex h-full w-full aspect-[16/9] flex-col overflow-hidden md:flex-row lg:aspect-auto">
                                    <a class="block h-64 w-full overflow-hidden md:h-full md:w-1/2" href="{{ route('product.show', $product['slug']) }}">
                                        <img alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale transition-all duration-700 group-hover:scale-105 group-hover:grayscale-0" src="{{ $product['image'] }}">
                                    </a>
                                    <div class="relative flex w-full flex-col justify-center bg-surface-container-high p-8 md:w-1/2">
                                        <div class="mb-8">
                                            <a class="mb-4 block font-headline text-4xl font-black uppercase tracking-tighter hover:text-primary-container" href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a>
                                            <p class="mb-6 font-body text-on-surface-variant">{{ $product['short_description'] }}</p>
                                            <span class="text-2xl font-bold text-primary-container">{{ $product['price'] }}</span>
                                        </div>
                                        <a class="block w-full bg-primary-container py-4 text-center font-black uppercase tracking-tighter text-on-primary-container transition-transform hover:scale-95" href="{{ route('product.show', $product['slug']) }}">View Product</a>
                                    </div>
                                </div>
                            </article>
                        @else
                            <article class="group relative overflow-hidden rounded-xl bg-surface-container-low {{ $product['shop_category'] === 'oversized' ? 'md:col-span-2 lg:col-span-1' : '' }}">
                                <a class="relative block aspect-[3/4] w-full overflow-hidden" href="{{ route('product.show', $product['slug']) }}">
                                    <img alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale transition-all duration-700 group-hover:scale-105 group-hover:grayscale-0" src="{{ $product['image'] }}">
                                    @if (($product['badge'] ?? null) === 'LIMITED DROP')
                                        <div class="absolute left-4 top-4 bg-primary-container px-3 py-1 text-[10px] font-black uppercase tracking-widest text-on-primary-container">{{ $product['badge'] }}</div>
                                    @endif
                                    <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 to-transparent p-8 opacity-0 transition-opacity group-hover:opacity-100">
                                        <span class="glass-gradient block w-full translate-y-4 rounded-xl py-4 text-center font-black uppercase tracking-tighter text-on-primary-container transition-transform group-hover:translate-y-0">View Product</span>
                                    </div>
                                </a>
                                <div class="p-6">
                                    <div class="mb-2 flex items-start justify-between gap-4">
                                        <a class="font-headline text-xl font-bold uppercase tracking-tighter hover:text-primary-container" href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a>
                                        <span class="font-body font-bold text-primary-container">{{ $product['price'] }}</span>
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">SKU: {{ $product['sku'] }}</span>
                                </div>
                            </article>
                        @endif
                    @empty
                        <div class="col-span-full rounded-xl border border-dashed border-white/10 bg-surface-container-low px-6 py-20 text-center">
                            <p class="font-headline text-2xl font-black uppercase tracking-[0.2em] text-white">No products found</p>
                            <p class="mt-3 text-sm uppercase tracking-[0.2em] text-white/40">Try another filter or sort combination</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <section class="mt-12 border-y border-outline-variant/10 bg-surface-container-low py-12">
                <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 px-6 md:grid-cols-3">
                    <div class="group flex items-center gap-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-surface-container-high text-primary-container transition-colors group-hover:bg-primary-container group-hover:text-black">
                            <span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
                        </div>
                        <div>
                            <h4 class="font-headline text-sm font-bold uppercase tracking-widest">Free Shipping</h4>
                            <p class="mt-1 text-[10px] uppercase tracking-widest text-on-surface-variant">Nationwide Delivery</p>
                        </div>
                    </div>
                    <div class="group flex items-center gap-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-surface-container-high text-primary-container transition-colors group-hover:bg-primary-container group-hover:text-black">
                            <span class="material-symbols-outlined" data-icon="verified">verified</span>
                        </div>
                        <div>
                            <h4 class="font-headline text-sm font-bold uppercase tracking-widest">Premium Quality</h4>
                            <p class="mt-1 text-[10px] uppercase tracking-widest text-on-surface-variant">Ethically Sourced Fabric</p>
                        </div>
                    </div>
                    <div class="group flex items-center gap-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-surface-container-high text-primary-container transition-colors group-hover:bg-primary-container group-hover:text-black">
                            <span class="material-symbols-outlined" data-icon="undo">undo</span>
                        </div>
                        <div>
                            <h4 class="font-headline text-sm font-bold uppercase tracking-widest">Easy Returns</h4>
                            <p class="mt-1 text-[10px] uppercase tracking-widest text-on-surface-variant">30-Day Policy</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-4xl px-6 py-24 text-center">
                <h2 class="mb-4 font-headline text-4xl font-black uppercase tracking-tighter md:text-5xl">Stay Updated with <span class="text-primary-container">THREADLAB</span></h2>
                <p class="mb-12 font-body text-lg text-on-surface-variant">Get exclusive drops and offers straight to your inbox.</p>
                <form class="mx-auto flex max-w-xl flex-col gap-4 md:flex-row">
                    <input class="flex-grow rounded-lg border-none bg-surface-container-highest px-6 py-4 text-xs font-bold uppercase tracking-widest text-white focus:ring-2 focus:ring-secondary" placeholder="ENTER YOUR EMAIL" type="email">
                    <button class="glass-gradient rounded-lg px-12 py-4 font-black uppercase tracking-tighter text-on-primary-container transition-transform hover:scale-95" type="submit">Subscribe</button>
                </form>
            </section>
        </main>

        <footer class="w-full bg-[#0e0e0e] px-6 py-12 border-t border-[#484847]/20">
            <div class="mx-auto flex w-full max-w-[1200px] flex-col items-center justify-between gap-8 md:flex-row">
                <div class="flex flex-col items-center gap-4 md:items-start">
                    <span class="font-headline text-lg font-bold uppercase text-white">THREADLAB</span>
                    <p class="font-body text-[10px] uppercase tracking-widest text-white/40">©2024 THREADLAB KINETIC EDITORIAL. ALL RIGHTS RESERVED.</p>
                </div>
                <div class="flex gap-8">
                    <a class="font-body text-[10px] uppercase tracking-widest text-white/40 transition-all duration-200 hover:text-[#7799ff]" href="#">PRIVACY</a>
                    <a class="font-body text-[10px] uppercase tracking-widest text-white/40 transition-all duration-200 hover:text-[#7799ff]" href="#">TERMS</a>
                    <a class="font-body text-[10px] uppercase tracking-widest text-white/40 transition-all duration-200 hover:text-[#7799ff]" href="#">SHIPPING</a>
                    <a class="font-body text-[10px] uppercase tracking-widest text-white/40 transition-all duration-200 hover:text-[#7799ff]" href="#">CONTACT</a>
                </div>
            </div>
        </footer>

        <script>
            (() => {
                const surface = document.querySelector('[data-shop-transition-surface]');
                const transitionLinks = document.querySelectorAll('[data-shop-transition-link]');

                if (!surface) {
                    return;
                }

                surface.classList.add('is-entering');
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        surface.classList.remove('is-entering');
                    });
                });

                transitionLinks.forEach((link) => {
                    link.addEventListener('click', (event) => {
                        if (
                            event.defaultPrevented ||
                            event.metaKey ||
                            event.ctrlKey ||
                            event.shiftKey ||
                            event.altKey ||
                            link.target === '_blank'
                        ) {
                            return;
                        }

                        event.preventDefault();
                        surface.classList.add('is-leaving');

                        window.setTimeout(() => {
                            window.location.href = link.href;
                        }, 180);
                    });
                });
            })();
        </script>
    </body>
</html>
