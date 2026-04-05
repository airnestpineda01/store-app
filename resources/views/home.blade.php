<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | KINETIC EDITORIAL</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "primary-fixed-dim": "#c8ec00",
                            "surface-container-low": "#131313",
                            "outline-variant": "#484847",
                            "on-error": "#450900",
                            "on-secondary": "#001b55",
                            "surface-variant": "#262626",
                            "on-primary-fixed": "#3d4a00",
                            "on-surface-variant": "#adaaaa",
                            "on-primary-fixed-variant": "#576800",
                            "on-tertiary-fixed": "#473b00",
                            "error-container": "#b92902",
                            "on-background": "#ffffff",
                            "primary-dim": "#cbef00",
                            "primary": "#f5ffc4",
                            "on-primary": "#556600",
                            "primary-container": "#d5fb00",
                            "tertiary-container": "#fedb42",
                            "background": "#0e0e0e",
                            "inverse-on-surface": "#565554",
                            "on-tertiary-fixed-variant": "#685700",
                            "surface-bright": "#2c2c2c",
                            "surface": "#0e0e0e",
                            "inverse-primary": "#556600",
                            "tertiary-fixed": "#fedb42",
                            "on-error-container": "#ffd2c8",
                            "surface-container-high": "#201f1f",
                            "surface-container": "#1a1919",
                            "surface-dim": "#0e0e0e",
                            "inverse-surface": "#fcf8f8",
                            "primary-fixed": "#d5fb00",
                            "surface-tint": "#f5ffc4",
                            "on-tertiary-container": "#5d4d00",
                            "on-secondary-fixed-variant": "#0047bd",
                            "secondary-container": "#0053db",
                            "surface-container-lowest": "#000000",
                            "secondary-dim": "#316bf3",
                            "secondary": "#7799ff",
                            "error-dim": "#d53d18",
                            "error": "#ff7351",
                            "surface-container-highest": "#262626",
                            "tertiary-fixed-dim": "#efcd34",
                            "on-surface": "#ffffff",
                            "on-secondary-container": "#f8f7ff",
                            "secondary-fixed": "#c4d0ff",
                            "on-secondary-fixed": "#002d80",
                            "tertiary-dim": "#efcd34",
                            "tertiary": "#ffeaa2",
                            "on-tertiary": "#675600",
                            "secondary-fixed-dim": "#b0c2ff",
                            "on-primary-container": "#4e5d00",
                            "outline": "#777575"
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

            body {
                background-color: #0e0e0e;
                color: #ffffff;
                font-family: 'Inter', sans-serif;
            }

            .kinetic-gradient {
                background: linear-gradient(to right, #f5ffc4, #d5fb00);
            }
        </style>
    </head>
    <body class="bg-background text-on-background selection:bg-primary-container selection:text-on-primary-container">
        @include('partials.header')

        <main class="pt-24">
            <section class="relative flex min-h-[921px] items-center overflow-hidden px-6">
                <div class="absolute inset-0 z-0">
                    <img alt="High-fashion streetwear editorial" class="h-full w-full object-cover object-center" data-alt="Editorial fashion photography of a model in oversized technical streetwear standing against a minimalist concrete architectural background with dramatic shadows" decoding="sync" fetchpriority="high" loading="eager" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApCHgxKC2uIm8vmSLOOyxF6upvBUIH7bebXeF-n7kXsRfNteasmW1F0MTHSOMLh9XA8AOb2v5Npo2J0h8gMLkvkluZLOIAEQus0DNNCjjpiieM1zOuQuWknoSGdsskizojPCxRa7Vh_Yhd8YwxGr3OHRdOBHS0K8HX3qqqHp3Z8vmyR8Wy-lBY0VU6PDOgxn3BFpcBsCjlH2q5y3FSCqI9Lc3V7gP76Fn3WXXF0L9049rlWrM02_oqeSTFKKrixs4ZkpxolUYvFtw">
                    <div class="absolute inset-0 bg-gradient-to-t from-background/70 via-background/10 to-transparent"></div>
                </div>
                <div class="relative z-10 mx-auto w-full max-w-[1200px]">
                    <div class="mb-6 inline-block bg-primary-container px-3 py-1 font-headline text-xs font-black tracking-widest text-on-primary-container">
                        KINETIC SERIES 01
                    </div>
                    <h1 class="mb-8 font-headline text-[12vw] font-black uppercase leading-[0.85] tracking-tighter text-white italic md:text-[8rem]">
                        Minimal.<br>Bold.<br><span class="text-primary-container">Timeless.</span>
                    </h1>
                    <div class="flex gap-4">
                        <a class="kinetic-gradient flex items-center gap-2 px-10 py-5 font-headline text-sm font-black uppercase tracking-widest text-on-primary-container transition-transform scale-95 active:scale-90" href="{{ route('shop') }}">
                            Shop Collection
                            <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                        </a>
                        <button class="bg-surface-container-highest px-10 py-5 font-headline text-sm font-black uppercase tracking-widest text-secondary transition-transform scale-95 active:scale-90" type="button">
                            Lookbook
                        </button>
                    </div>
                </div>
            </section>

            <section class="bg-surface px-6 py-32">
                <div class="mx-auto max-w-[1200px]">
                    <div class="mb-16 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                        <div>
                            <h2 class="font-headline text-5xl font-black uppercase leading-none tracking-tighter italic md:text-7xl">
                                Shop<br>Products.
                            </h2>
                        </div>
                        <div class="max-w-md text-right">
                            <p class="font-body text-on-surface-variant">
                                Live storefront pieces pulled from your actual catalog, including products uploaded and edited from the admin inventory.
                            </p>
                            <a class="mt-5 inline-flex items-center gap-2 font-headline text-sm font-black uppercase tracking-widest text-primary-container transition-colors hover:text-white" href="{{ route('shop') }}">
                                View Full Shop
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                        @foreach($featuredProducts as $product)
                            <article class="group overflow-hidden rounded-xl bg-surface-container-low">
                                <a class="block" href="{{ route('product.show', $product['slug']) }}">
                                    <div class="relative aspect-[4/5] overflow-hidden">
                                        <img alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale transition-all duration-700 group-hover:scale-105 group-hover:grayscale-0" src="{{ $product['image'] }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-transparent to-transparent opacity-80"></div>
                                        <div class="absolute left-5 top-5 inline-flex items-center rounded-full px-3 py-1 text-[10px] font-black uppercase tracking-[0.25em] {{ $product['shop_category'] === 'minimal' ? 'bg-secondary text-on-secondary' : 'bg-primary-container text-on-primary-container' }}">
                                            {{ strtoupper($product['shop_category']) }}
                                        </div>
                                        <div class="absolute bottom-0 left-0 right-0 p-6">
                                            <div class="flex items-end justify-between gap-4">
                                                <div>
                                                    <h3 class="font-headline text-2xl font-black uppercase tracking-tighter text-white italic">
                                                        {{ $product['name'] }}
                                                    </h3>
                                                    <p class="mt-2 font-body text-[10px] font-bold uppercase tracking-[0.25em] text-on-surface-variant">
                                                        SKU: {{ $product['sku'] }}
                                                    </p>
                                                </div>
                                                <div class="font-headline text-2xl font-black italic text-primary-container">
                                                    {{ $product['price'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="relative overflow-hidden bg-surface-container-low py-40">
                <div class="absolute -left-20 -top-20 select-none text-[20rem] font-black leading-none tracking-tighter text-white/[0.02] italic">
                    KINETIC
                </div>
                <div class="relative z-10 mx-auto max-w-[1200px] px-6">
                    <div class="grid grid-cols-1 items-center gap-20 md:grid-cols-2">
                        <div>
                            <h2 class="mb-10 font-headline text-6xl font-black uppercase leading-[0.9] tracking-tighter italic md:text-8xl">
                                The New<br><span class="text-primary-container">Uniform.</span>
                            </h2>
                            <div class="flex flex-col gap-4">
                                <p class="font-body text-xl leading-relaxed text-white/80">
                                    THREADLAB exists at the intersection of technical performance and high-fashion editorial. We don't follow seasons; we follow the pulse.
                                </p>
                                <p class="font-body text-on-surface-variant">
                                    Every piece is validated through our global registry for authenticity and material excellence. Designed in the laboratory, proven on the street.
                                </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="aspect-[4/5] overflow-hidden bg-surface-container-highest">
                                <img alt="Editorial Motion" class="h-full w-full object-cover mix-blend-lighten" data-alt="Motion blur fashion shot of a person running through a city at night with neon lights creating streaks of vibrant yellow and blue" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACQCmM9Hb1yQp_IzBoTOq0vdxNotV5AN-0nDohSepQhraaYQp4AXFIxQP7vE7JrEM9cltryu3z1amoRS6FhnM_Wyuw3S_mz9LfVlpWpg2RzD8iYuSj2tkxGTG9zj24qkjLNtJQcAQ5mosuSdXj4TV5aqqjUqGfxCfd6A4jtbQXe96ljoi0x00S4GHrewTjktUZTAbIpFVw-8VuBF243Pp1BCcwaBIEzjLDt-ODSw9zmyokyniU7srbt7TsA_nvoTf9y7qIIbsaiko">
                            </div>
                            <div class="absolute -bottom-10 -right-10 flex h-48 w-48 rotate-12 transform items-center justify-center bg-primary-container p-8 text-center font-headline text-xl font-black uppercase leading-tight italic text-on-primary-container">
                                Validated Archive 2024
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="overflow-hidden bg-surface py-32">
                <div class="mx-auto max-w-[1200px] px-6">
                    <h2 class="mb-16 font-headline text-4xl font-black uppercase tracking-tighter text-[#d5fb00] italic md:text-6xl">
                        COMMUNITY_VOICE
                    </h2>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <div class="group relative rounded-xl border border-white/10 bg-white/5 p-10 backdrop-blur-md transition-all duration-500 hover:border-[#d5fb00]/30">
                            <div class="absolute right-0 top-0 p-4 text-[#d5fb00]/20 transition-colors group-hover:text-[#d5fb00]/40">
                                <span class="material-symbols-outlined text-4xl" data-icon="format_quote">format_quote</span>
                            </div>
                            <p class="mb-8 font-body text-xl leading-relaxed text-white italic md:text-2xl">
                                "This is the most comfortable shirt I’ve ever owned."
                            </p>
                            <div class="flex items-center gap-4">
                                <div class="h-0.5 w-12 bg-[#d5fb00]"></div>
                                <span class="font-headline text-xs font-black uppercase tracking-widest text-on-surface-variant">Verified Lab Participant</span>
                            </div>
                        </div>
                        <div class="group relative rounded-xl border border-white/10 bg-white/5 p-10 backdrop-blur-md transition-all duration-500 hover:border-[#d5fb00]/30">
                            <div class="absolute right-0 top-0 p-4 text-[#d5fb00]/20 transition-colors group-hover:text-[#d5fb00]/40">
                                <span class="material-symbols-outlined text-4xl" data-icon="format_quote">format_quote</span>
                            </div>
                            <p class="mb-8 font-body text-xl leading-relaxed text-white italic md:text-2xl">
                                "Simple but premium — exactly what I was looking for."
                            </p>
                            <div class="flex items-center gap-4">
                                <div class="h-0.5 w-12 bg-[#d5fb00]"></div>
                                <span class="font-headline text-xs font-black uppercase tracking-widest text-on-surface-variant">Archival Member</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="w-full border-t border-[#484847]/20 bg-[#0e0e0e] px-6 py-20">
            <div class="mx-auto flex max-w-[1200px] flex-col gap-12 md:flex-row md:items-end md:justify-between">
                <div class="flex w-full flex-col gap-8 md:w-auto">
                    <div class="font-headline text-5xl font-black tracking-tighter text-white italic">THREADLAB</div>
                    <div class="flex flex-wrap gap-8">
                        <a class="font-body text-[10px] font-medium uppercase tracking-widest text-[#484847] opacity-80 transition-colors hover:text-white hover:opacity-100" href="#">PRIVACY</a>
                        <a class="font-body text-[10px] font-medium uppercase tracking-widest text-[#484847] opacity-80 transition-colors hover:text-white hover:opacity-100" href="#">TERMS</a>
                        <a class="font-body text-[10px] font-medium uppercase tracking-widest text-[#484847] opacity-80 transition-colors hover:text-white hover:opacity-100" href="#">SHIPPING</a>
                        <a class="font-body text-[10px] font-medium uppercase tracking-widest text-[#484847] opacity-80 transition-colors hover:text-white hover:opacity-100" href="#">CONTACT</a>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-4">
                    <div class="flex gap-4">
                        <span class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border border-outline-variant transition-colors hover:bg-primary-container hover:text-black">
                            <span class="material-symbols-outlined text-sm" data-icon="language">language</span>
                        </span>
                        <span class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border border-outline-variant transition-colors hover:bg-primary-container hover:text-black">
                            <span class="material-symbols-outlined text-sm" data-icon="share">share</span>
                        </span>
                    </div>
                    <p class="font-body text-[10px] font-medium uppercase tracking-widest text-[#484847]">©2024 THREADLAB GLOBAL REGISTRY. ALL RIGHTS RESERVED.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
