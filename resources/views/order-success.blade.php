<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | ORDER SUCCESS</title>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "error-container": "#b92902",
                            "surface-container-lowest": "#000000",
                            "secondary-dim": "#316bf3",
                            "on-secondary": "#001b55",
                            "surface-container-low": "#131313",
                            "outline-variant": "#484847",
                            "surface-variant": "#262626",
                            "on-surface": "#ffffff",
                            "primary-container": "#d5fb00",
                            "primary": "#f5ffc4",
                            "tertiary-container": "#fedb42",
                            "surface-container-high": "#201f1f",
                            "outline": "#777575",
                            "tertiary-dim": "#efcd34",
                            "on-tertiary-fixed": "#473b00",
                            "background": "#0e0e0e",
                            "on-primary": "#556600",
                            "primary-fixed": "#d5fb00",
                            "on-secondary-fixed": "#002d80",
                            "tertiary": "#ffeaa2",
                            "primary-dim": "#cbef00",
                            "on-tertiary-fixed-variant": "#685700",
                            "surface-container": "#1a1919",
                            "surface": "#0e0e0e",
                            "secondary": "#7799ff",
                            "surface-container-highest": "#262626",
                            "tertiary-fixed-dim": "#efcd34",
                            "secondary-fixed": "#c4d0ff",
                            "on-secondary-container": "#f8f7ff",
                            "inverse-primary": "#556600",
                            "on-primary-container": "#4e5d00",
                            "surface-bright": "#2c2c2c",
                            "inverse-on-surface": "#565554",
                            "surface-dim": "#0e0e0e",
                            "on-background": "#ffffff",
                            "on-error": "#450900",
                            "tertiary-fixed": "#fedb42",
                            "on-primary-fixed": "#3d4a00",
                            "secondary-fixed-dim": "#b0c2ff",
                            "secondary-container": "#0053db",
                            "on-primary-fixed-variant": "#576800",
                            "error-dim": "#d53d18",
                            "on-error-container": "#ffd2c8",
                            "on-tertiary-container": "#5d4d00",
                            "on-secondary-fixed-variant": "#0047bd",
                            "on-surface-variant": "#adaaaa",
                            "on-tertiary": "#675600",
                            "inverse-surface": "#fcf8f8",
                            "error": "#ff7351",
                            "surface-tint": "#f5ffc4",
                            "primary-fixed-dim": "#c8ec00"
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

            .kinetic-grid {
                background-image: linear-gradient(to right, #484847 1px, transparent 1px), linear-gradient(to bottom, #484847 1px, transparent 1px);
                background-size: 40px 40px;
                opacity: 0.05;
            }

            .blur-glow {
                filter: blur(80px);
                opacity: 0.15;
            }
        </style>
    </head>
    <body class="bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
        <main class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-6">
            <div class="kinetic-grid pointer-events-none absolute inset-0"></div>
            <div class="blur-glow pointer-events-none absolute -left-20 -top-20 h-96 w-96 rounded-full bg-primary-container"></div>
            <div class="blur-glow pointer-events-none absolute -bottom-20 -right-20 h-96 w-96 rounded-full bg-secondary"></div>

            <div class="relative z-10 w-full max-w-2xl">
                <div class="mb-12 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary-container opacity-40 blur-2xl"></div>
                        <div class="relative flex h-24 w-24 rotate-12 transform items-center justify-center bg-primary-container">
                            <span class="material-symbols-outlined !text-5xl -rotate-12 text-on-primary-container" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        </div>
                    </div>
                </div>

                <div class="mb-16 space-y-4 text-center">
                    <h1 class="font-headline text-5xl font-extrabold uppercase leading-none tracking-tighter italic md:text-7xl">
                        Your order has been placed <span class="text-primary-container">successfully</span>
                    </h1>
                    <p class="font-label text-sm uppercase tracking-[0.2em] text-on-surface-variant">Confirmation Stage Complete</p>
                </div>

                <div class="mb-16 grid grid-cols-1 gap-1 md:grid-cols-3">
                    <div class="flex flex-col justify-between border-l-4 border-primary-container bg-surface-container-low p-8">
                        <span class="mb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Reference</span>
                        <span class="font-headline text-xl font-bold tracking-tight text-white">{{ $reference }}</span>
                    </div>
                    <div class="flex flex-col justify-between bg-surface-container p-8">
                        <span class="mb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Total Amount</span>
                        <span class="font-headline text-xl font-bold tracking-tight text-primary-container">{{ $total }}</span>
                    </div>
                    <div class="flex flex-col justify-between border-r-4 border-secondary bg-surface-container-high p-8">
                        <span class="mb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Method</span>
                        <span class="font-headline text-xl font-bold tracking-tight text-white">{{ $paymentMethod }}</span>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center gap-6 md:flex-row">
                    <a class="group relative w-full overflow-hidden bg-gradient-to-r from-primary to-primary-container px-12 py-5 text-center font-headline font-extrabold uppercase tracking-tighter text-on-primary-container transition-all hover:scale-105 active:scale-95 md:w-auto" href="{{ route('dashboard') }}">
                        <span class="relative z-10">DASHBOARD</span>
                        <div class="absolute inset-0 translate-x-full bg-white/20 transition-transform duration-300 group-hover:translate-x-0"></div>
                    </a>
                    <a class="w-full border-2 border-outline-variant px-12 py-5 text-center font-headline font-bold uppercase tracking-tighter text-white transition-all hover:border-secondary hover:text-secondary active:scale-95 md:w-auto" href="{{ route('cart') }}">
                        BACK TO CART
                    </a>
                </div>

                <div class="mt-24 flex items-center justify-center gap-4 opacity-30">
                    <div class="h-[1px] w-12 bg-outline-variant"></div>
                    <span class="font-label text-[10px] uppercase tracking-[0.5em] text-on-surface-variant">KINETIC EDITORIAL SYST v2.0</span>
                    <div class="h-[1px] w-12 bg-outline-variant"></div>
                </div>
            </div>

            <div class="pointer-events-none absolute -right-20 top-1/2 hidden -translate-y-1/2 opacity-20 lg:block">
                <p class="select-none font-headline text-[20rem] font-black leading-none tracking-tighter text-outline-variant italic">THREAD</p>
            </div>
            <div class="pointer-events-none absolute -left-20 top-1/2 hidden -translate-y-1/2 opacity-20 lg:block">
                <p class="rotate-180 select-none font-headline text-[20rem] font-black leading-none tracking-tighter text-outline-variant italic">LAB</p>
            </div>
        </main>

        <footer class="mt-auto flex w-full flex-col items-center justify-between gap-8 border-t border-[#484847]/20 bg-[#131313] px-6 py-12 md:flex-row">
            <div class="text-lg font-bold text-white">THREADLAB</div>
            <div class="flex flex-wrap justify-center gap-6">
                <a class="font-label text-xs uppercase tracking-widest text-white/40 transition-colors hover:text-secondary" href="#">TERMS</a>
                <a class="font-label text-xs uppercase tracking-widest text-white/40 transition-colors hover:text-secondary" href="#">PRIVACY</a>
                <a class="font-label text-xs uppercase tracking-widest text-white/40 transition-colors hover:text-secondary" href="#">SHIPPING</a>
                <a class="font-label text-xs uppercase tracking-widest text-white/40 transition-colors hover:text-secondary" href="#">RETURNS</a>
                <a class="font-label text-xs uppercase tracking-widest text-white/40 transition-colors hover:text-secondary" href="#">CONTACT</a>
            </div>
            <div class="font-label text-[10px] uppercase tracking-wider text-white/40">
                ©2024 THREADLAB KINETIC EDITORIAL
            </div>
        </footer>
    </body>
</html>
