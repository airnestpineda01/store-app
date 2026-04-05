<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | {{ $product['name'] }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "surface": "#0e0e0e",
                            "error-container": "#b92902",
                            "surface-dim": "#0e0e0e",
                            "surface-variant": "#262626",
                            "surface-container-high": "#201f1f",
                            "tertiary": "#ffeaa2",
                            "inverse-on-surface": "#565554",
                            "surface-tint": "#f5ffc4",
                            "on-surface": "#ffffff",
                            "on-secondary-container": "#f8f7ff",
                            "on-tertiary-container": "#5d4d00",
                            "primary": "#f5ffc4",
                            "on-primary-fixed": "#3d4a00",
                            "on-secondary-fixed": "#002d80",
                            "on-primary-container": "#4e5d00",
                            "surface-container": "#1a1919",
                            "tertiary-fixed": "#fedb42",
                            "on-surface-variant": "#adaaaa",
                            "on-secondary": "#001b55",
                            "surface-bright": "#2c2c2c",
                            "outline": "#777575",
                            "tertiary-fixed-dim": "#efcd34",
                            "primary-fixed-dim": "#c8ec00",
                            "background": "#0e0e0e",
                            "inverse-primary": "#556600",
                            "on-secondary-fixed-variant": "#0047bd",
                            "tertiary-dim": "#efcd34",
                            "secondary-fixed-dim": "#b0c2ff",
                            "primary-fixed": "#d5fb00",
                            "on-primary-fixed-variant": "#576800",
                            "tertiary-container": "#fedb42",
                            "on-error": "#450900",
                            "primary-dim": "#cbef00",
                            "surface-container-lowest": "#000000",
                            "on-background": "#ffffff",
                            "secondary-fixed": "#c4d0ff",
                            "on-tertiary-fixed": "#473b00",
                            "on-primary": "#556600",
                            "primary-container": "#d5fb00",
                            "surface-container-highest": "#262626",
                            "on-tertiary": "#675600",
                            "on-error-container": "#ffd2c8",
                            "error": "#ff7351",
                            "surface-container-low": "#131313",
                            "outline-variant": "#484847",
                            "secondary": "#7799ff",
                            "inverse-surface": "#fcf8f8",
                            "secondary-dim": "#316bf3",
                            "secondary-container": "#0053db",
                            "error-dim": "#d53d18",
                            "on-tertiary-fixed-variant": "#685700"
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

            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .product-hero-image {
                transition: opacity 220ms ease, transform 220ms ease, filter 220ms ease;
            }

            .product-hero-image.is-swapping {
                opacity: 0.2;
                transform: scale(0.985);
                filter: blur(6px);
            }
        </style>
    </head>
    <body class="bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
        @php
            $materials = $product['materials'] ?? [
                '240GSM combed cotton jersey with a dense, structured hand feel',
                'Reinforced shoulder tape and double-needle finishing for long-term shape retention',
                'Pre-shrunk construction to keep the silhouette consistent after washing',
            ];

            $sizingGuide = $product['sizing_guide'] ?? [
                'S' => 'Chest 20" / Length 27" / Shoulder 18"',
                'M' => 'Chest 21" / Length 28" / Shoulder 19"',
                'L' => 'Chest 22" / Length 29" / Shoulder 20"',
                'XL' => 'Chest 23" / Length 30" / Shoulder 21"',
            ];
        @endphp

        @include('partials.header')

        <main class="mx-auto max-w-[1200px] px-6 pb-20 pt-24">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-20">
                <div class="space-y-6 lg:col-span-7">
                    <div class="group relative aspect-[4/5] overflow-hidden rounded-xl bg-surface-container-low" id="product-hero">
                        <img alt="{{ $product['name'] }}" class="product-hero-image h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" data-product-hero-image src="{{ $product['hero_image'] }}">
                        <div class="absolute left-6 top-6">
                            <span class="rounded-full bg-secondary px-4 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-surface">{{ $product['badge'] }}</span>
                        </div>
                    </div>

                    @if (! empty($product['gallery']))
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                            @foreach ($product['gallery'] as $index => $image)
                                <button
                                    class="aspect-square overflow-hidden rounded-lg bg-surface-container transition-all {{ $image === $product['hero_image'] ? 'ring-2 ring-primary-container' : 'cursor-pointer opacity-60 hover:opacity-100' }}"
                                    data-gallery-thumb
                                    data-image="{{ $image }}"
                                    type="button"
                                >
                                    <img alt="{{ $product['name'] }} gallery image {{ $index + 1 }}" class="h-full w-full object-cover" src="{{ $image }}">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="flex flex-col justify-center lg:col-span-5">
                    <header class="mb-8">
                        <div class="mb-4 flex items-center gap-4">
                            <span class="font-label text-[11px] font-bold uppercase tracking-[0.3em] text-primary-container">{{ $product['category'] }}</span>
                            <div class="h-px flex-1 bg-outline-variant/20"></div>
                        </div>
                        <h1 class="mb-4 font-headline text-5xl font-black uppercase leading-none tracking-tighter italic lg:text-7xl">{{ $product['name'] }}</h1>
                        <div class="flex items-baseline gap-4">
                            <p class="font-headline text-3xl font-bold italic text-on-surface">{{ $product['price'] }}</p>
                            <span class="text-sm text-on-surface-variant line-through">{{ $product['original_price'] }}</span>
                        </div>
                    </header>

                    <div class="mb-10 max-w-md">
                        <p class="font-body text-lg leading-relaxed text-on-surface-variant">
                            {{ $product['short_description'] }}
                        </p>
                    </div>

                    <form action="{{ route('cart.add') }}" class="mb-12" method="POST">
                        @csrf
                        <input name="slug" type="hidden" value="{{ $product['slug'] }}">
                        <div class="mb-10">
                            <div class="mb-4 flex items-center justify-between">
                                <label class="font-label text-[10px] font-black uppercase tracking-widest text-on-surface">SELECT SIZE</label>
                                <button class="text-[10px] font-bold uppercase tracking-widest text-secondary hover:underline" data-open-tab="sizing" type="button">SIZE GUIDE</button>
                            </div>
                            <div class="grid grid-cols-4 gap-3">
                                @foreach ($product['sizes'] as $size)
                                    <label>
                                        <input {{ $size === $product['selected_size'] ? 'checked' : '' }} class="peer sr-only" name="size" type="radio" value="{{ $size }}">
                                        <span class="flex cursor-pointer items-center justify-center border border-outline-variant/30 py-4 text-sm font-bold transition-all peer-checked:border-2 peer-checked:border-primary-container peer-checked:bg-primary-container/5 peer-checked:text-primary-container hover:border-primary-container hover:text-primary-container">
                                            {{ $size }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4">
                            <button class="kinetic-gradient w-full py-5 font-label font-black uppercase tracking-widest text-on-primary-container transition-transform active:scale-[0.98]" name="redirect_to" type="submit" value="cart">
                                ADD TO CART
                            </button>
                            <button class="w-full border-2 border-on-surface py-5 font-label font-black uppercase tracking-widest text-on-surface transition-all hover:bg-on-surface hover:text-surface active:scale-[0.98]" name="redirect_to" type="submit" value="checkout">
                                BUY NOW
                            </button>
                        </div>
                    </form>

                    <div class="border-t border-outline-variant/10 pt-8" data-tabs>
                        <div class="no-scrollbar mb-6 flex gap-8 overflow-x-auto border-b border-outline-variant/10 pb-4">
                            <button class="whitespace-nowrap text-[11px] font-bold uppercase tracking-widest text-primary-container transition-colors hover:text-on-surface" data-tab-button="description" type="button">Description</button>
                            <button class="whitespace-nowrap text-[11px] font-bold uppercase tracking-widest text-on-surface-variant transition-colors hover:text-on-surface" data-tab-button="materials" type="button">Materials</button>
                            <button class="whitespace-nowrap text-[11px] font-bold uppercase tracking-widest text-on-surface-variant transition-colors hover:text-on-surface" data-tab-button="sizing" type="button">Sizing Guide</button>
                        </div>
                        <div class="space-y-4 font-body text-sm leading-relaxed text-on-surface-variant" data-tab-panel="description">
                            @foreach ($product['description'] as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                            <ul class="list-none space-y-2">
                                @foreach ($product['features'] as $feature)
                                    <li class="flex items-center gap-3">
                                        <span class="h-1 w-1 rounded-full bg-primary-container"></span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="hidden space-y-4 font-body text-sm leading-relaxed text-on-surface-variant" data-tab-panel="materials">
                            <p>Built for repeated wear with a premium knit structure that keeps the silhouette sharp and the finish clean through daily rotation.</p>
                            <ul class="list-none space-y-2">
                                @foreach ($materials as $material)
                                    <li class="flex items-center gap-3">
                                        <span class="h-1 w-1 rounded-full bg-primary-container"></span>
                                        <span>{{ $material }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="hidden space-y-4 font-body text-sm leading-relaxed text-on-surface-variant" data-tab-panel="sizing">
                            <p>Choose your regular fit for a clean silhouette, or size up for a more relaxed editorial drape.</p>
                            <div class="overflow-hidden border border-outline-variant/20">
                                <div class="grid grid-cols-[1fr_3fr] border-b border-outline-variant/10 bg-surface-container-low px-4 py-3 text-[11px] font-bold uppercase tracking-[0.2em] text-white">
                                    <span>Size</span>
                                    <span>Measurements</span>
                                </div>
                                @foreach ($sizingGuide as $size => $details)
                                    <div class="grid grid-cols-[1fr_3fr] border-b border-outline-variant/10 px-4 py-3 last:border-b-0">
                                        <span class="font-headline text-sm font-black uppercase text-primary-container">{{ $size }}</span>
                                        <span>{{ $details }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="mt-32">
                <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                    <div>
                        <h2 class="mb-2 font-headline text-4xl font-black uppercase tracking-tighter italic">Complement the Look</h2>
                        <p class="font-body text-on-surface-variant">Curated pieces to complete your digital uniform.</p>
                    </div>
                    <div class="mx-12 hidden h-[2px] flex-1 bg-outline-variant/10 md:block"></div>
                    <a class="group flex items-center gap-2 text-xs font-black uppercase tracking-widest text-primary-container" href="{{ route('shop') }}">
                        View Full Collection
                        <span class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1" data-icon="arrow_forward">arrow_forward</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="group">
                            <div class="relative mb-6 aspect-[3/4] overflow-hidden rounded-lg bg-surface-container-low">
                                <img alt="{{ $relatedProduct['name'] }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $relatedProduct['image'] }}">
                                <div class="absolute bottom-4 right-4 translate-y-8 opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                    <a class="rounded-full bg-primary-container p-3 text-on-primary-container" href="{{ route('product.show', $relatedProduct['slug']) }}">
                                        <span class="material-symbols-outlined" data-icon="add">add</span>
                                    </a>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <a class="font-headline text-lg font-bold uppercase tracking-tight italic hover:text-primary-container" href="{{ route('product.show', $relatedProduct['slug']) }}">{{ $relatedProduct['name'] }}</a>
                                <p class="font-label text-sm uppercase tracking-widest text-on-surface-variant">{{ $relatedProduct['price'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>

        <footer class="w-full border-t border-white/5 bg-black">
            <div class="mx-auto flex max-w-[1200px] flex-col items-center justify-between gap-8 px-6 py-12 md:flex-row">
                <div class="flex flex-col items-center gap-4 md:items-start">
                    <div class="font-headline text-xl font-black italic tracking-tighter text-[#D9FF00]">THREADLAB</div>
                    <p class="font-['Inter'] text-[10px] uppercase tracking-widest text-white/30">©2024 THREADLAB KINETIC EDITORIAL. ALL RIGHTS RESERVED.</p>
                </div>
                <div class="flex gap-8">
                    <a class="font-['Inter'] text-[10px] uppercase tracking-widest text-white/30 transition-colors hover:text-[#D9FF00]" href="#">PRIVACY</a>
                    <a class="font-['Inter'] text-[10px] uppercase tracking-widest text-white/30 transition-colors hover:text-[#D9FF00]" href="#">TERMS</a>
                    <a class="font-['Inter'] text-[10px] uppercase tracking-widest text-white/30 transition-colors hover:text-[#D9FF00]" href="#">SHIPPING</a>
                    <a class="font-['Inter'] text-[10px] uppercase tracking-widest text-white/30 transition-colors hover:text-[#D9FF00]" href="#">RETURNS</a>
                </div>
                <div class="flex gap-4">
                    <div class="group flex h-8 w-8 cursor-pointer items-center justify-center rounded-full border border-white/10 transition-colors hover:border-[#D9FF00]">
                        <span class="material-symbols-outlined text-sm text-white/30 group-hover:text-[#D9FF00]" data-icon="share">share</span>
                    </div>
                    <div class="group flex h-8 w-8 cursor-pointer items-center justify-center rounded-full border border-white/10 transition-colors hover:border-[#D9FF00]">
                        <span class="material-symbols-outlined text-sm text-white/30 group-hover:text-[#D9FF00]" data-icon="language">language</span>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            (() => {
                const heroImage = document.querySelector('[data-product-hero-image]');
                const heroContainer = document.getElementById('product-hero');
                const thumbnails = Array.from(document.querySelectorAll('[data-gallery-thumb]'));

                if (!heroImage || !heroContainer || thumbnails.length === 0) {
                    return;
                }

                const setActiveThumb = (activeThumb) => {
                    thumbnails.forEach((thumb) => {
                        thumb.classList.remove('ring-2', 'ring-primary-container');
                        thumb.classList.add('opacity-60');
                    });

                    if (!activeThumb) {
                        return;
                    }

                    activeThumb.classList.add('ring-2', 'ring-primary-container');
                    activeThumb.classList.remove('opacity-60');
                };

                setActiveThumb(
                    thumbnails.find((thumb) => thumb.dataset.image === heroImage.getAttribute('src')) ?? null
                );

                thumbnails.forEach((thumb) => {
                    thumb.addEventListener('click', () => {
                        const nextImage = thumb.dataset.image;

                        if (!nextImage || heroImage.getAttribute('src') === nextImage) {
                            setActiveThumb(thumb);
                            heroContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            return;
                        }

                        heroImage.classList.add('is-swapping');

                        window.setTimeout(() => {
                            heroImage.setAttribute('src', nextImage);
                            setActiveThumb(thumb);
                            heroContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }, 120);

                        window.setTimeout(() => {
                            heroImage.classList.remove('is-swapping');
                        }, 260);
                    });
                });
            })();

            document.querySelectorAll('[data-tabs]').forEach((tabsRoot) => {
                const buttons = tabsRoot.querySelectorAll('[data-tab-button]');
                const panels = tabsRoot.querySelectorAll('[data-tab-panel]');

                const activateTab = (tabName) => {
                    buttons.forEach((button) => {
                        const isActive = button.dataset.tabButton === tabName;
                        button.classList.toggle('text-primary-container', isActive);
                        button.classList.toggle('text-on-surface-variant', !isActive);
                    });

                    panels.forEach((panel) => {
                        panel.classList.toggle('hidden', panel.dataset.tabPanel !== tabName);
                    });
                };

                buttons.forEach((button) => {
                    button.addEventListener('click', () => activateTab(button.dataset.tabButton));
                });

                activateTab('description');
            });

            document.querySelectorAll('[data-open-tab]').forEach((trigger) => {
                trigger.addEventListener('click', () => {
                    const tabName = trigger.dataset.openTab;
                    const button = document.querySelector(`[data-tab-button="${tabName}"]`);
                    const tabsRoot = trigger.closest('main')?.querySelector('[data-tabs]');

                    if (button) {
                        button.click();
                    }

                    tabsRoot?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });
        </script>
    </body>
</html>
