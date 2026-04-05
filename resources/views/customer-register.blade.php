<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | Join The Registry</title>
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
                            "secondary-container": "#0053db",
                            secondary: "#7799ff",
                            "on-surface-variant": "#adaaaa",
                            "on-tertiary": "#675600",
                            outline: "#777575",
                            "primary-fixed": "#d5fb00",
                            "tertiary-fixed-dim": "#efcd34",
                            "on-tertiary-container": "#5d4d00",
                            "secondary-dim": "#316bf3",
                            "error-container": "#b92902",
                            "on-tertiary-fixed-variant": "#685700",
                            "inverse-primary": "#556600",
                            "on-error": "#450900",
                            error: "#ff7351",
                            "inverse-surface": "#fcf8f8",
                            "on-primary-fixed": "#3d4a00",
                            "on-primary-fixed-variant": "#576800",
                            "on-secondary": "#001b55",
                            "tertiary-fixed": "#fedb42",
                            "surface-container-highest": "#262626",
                            "surface-variant": "#262626",
                            "on-secondary-fixed": "#002d80",
                            "primary-dim": "#cbef00",
                            "surface-tint": "#f5ffc4",
                            "inverse-on-surface": "#565554",
                            "tertiary-dim": "#efcd34",
                            primary: "#f5ffc4",
                            "surface-container-lowest": "#000000",
                            "surface-container": "#1a1919",
                            "surface-container-low": "#131313",
                            background: "#0e0e0e",
                            "on-tertiary-fixed": "#473b00",
                            "primary-fixed-dim": "#c8ec00",
                            "on-secondary-fixed-variant": "#0047bd",
                            surface: "#0e0e0e",
                            "primary-container": "#d5fb00",
                            "surface-bright": "#2c2c2c",
                            "on-error-container": "#ffd2c8",
                            tertiary: "#ffeaa2",
                            "surface-container-high": "#201f1f",
                            "on-background": "#ffffff",
                            "tertiary-container": "#fedb42",
                            "on-surface": "#ffffff",
                            "error-dim": "#d53d18",
                            "surface-dim": "#0e0e0e",
                            "on-primary-container": "#4e5d00",
                            "secondary-fixed-dim": "#b0c2ff",
                            "on-primary": "#556600",
                            "secondary-fixed": "#c4d0ff",
                            "on-secondary-container": "#f8f7ff",
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

            .editorial-text-shadow {
                text-shadow: 0 0 40px rgba(213, 251, 0, 0.4);
            }

            input:focus {
                box-shadow: 0 0 0 2px #7799ff;
            }
        </style>
    </head>
    <body class="overflow-x-hidden bg-background font-body text-on-surface">
        <nav class="fixed top-0 z-50 flex w-full max-w-full items-center justify-between bg-neutral-950/80 px-6 py-4 backdrop-blur-xl">
            <div class="font-headline text-2xl font-black italic tracking-tighter text-lime-400">KINETIC</div>
            <div class="hidden items-center space-x-12 md:flex">
                <a class="font-body text-sm tracking-widest text-neutral-400 transition-colors hover:text-white" href="{{ route('shop') }}">SHOP</a>
                <a class="font-body text-sm tracking-widest text-neutral-400 transition-colors hover:text-white" href="#">COLLECTIONS</a>
                <a class="font-body text-sm tracking-widest text-neutral-400 transition-colors hover:text-white" href="{{ route('home') }}">EDITORIAL</a>
            </div>
            <div class="flex items-center space-x-6">
                <a class="text-neutral-400 transition-all duration-300 hover:text-lime-400 active:opacity-80" href="{{ route('cart') }}">
                    <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                </a>
                <a class="text-neutral-400 transition-all duration-300 hover:text-lime-400 active:opacity-80" href="{{ route('customer.login') }}">
                    <span class="material-symbols-outlined" data-icon="person">person</span>
                </a>
            </div>
        </nav>

        <main class="grid min-h-screen grid-cols-1 pt-16 md:grid-cols-2 md:pt-0">
            <section class="relative flex h-[409px] w-full items-center justify-center overflow-hidden bg-surface md:h-screen">
                <div class="absolute inset-0 z-0">
                    <img alt="Editorial Streetwear" class="h-full w-full object-cover grayscale brightness-50" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfW8aakj1ITa020I4Wo6OfjLAD1M08JZOtbMNmSJJjZ9js9pS39TeE7wQhipMstE4WjpSTbb4UCJSEKM70bbdagvCwU_cNg-D0gtEgqJtGOVkeWwpfaruGMcKXZJcIYLR-6-5H-2FztLNIDtuo1attZ7u7PYLb9A4BRRW671tZh_XuFjE1a5OIe-R52kBsr0caRPsqKeFaM-VfLG6FKb0yKUXx2JpMR1c-jn2YxZamY1omIDCLKMV2oSrHdxMpHHVIuffWqi5EEtU">
                    <div class="absolute inset-0 bg-gradient-to-tr from-background via-transparent to-transparent opacity-80"></div>
                </div>
                <div class="relative z-10 w-full max-w-2xl p-12 text-center md:text-left">
                    <p class="mb-2 font-headline text-xl font-black italic tracking-tighter text-primary-container opacity-90 md:text-2xl">V-01 ACCESS GRANTED</p>
                    <h1 class="editorial-text-shadow font-headline text-5xl font-extrabold leading-none tracking-tighter text-white md:text-8xl">
                        JOIN THE<br>REGISTRY
                    </h1>
                    <div class="mt-8 flex items-center space-x-4">
                        <div class="h-px w-12 bg-primary-container"></div>
                        <span class="font-label text-xs uppercase tracking-[0.3em] text-neutral-400">EST. 2024 / CORE UNIT</span>
                    </div>
                </div>
            </section>

            <section class="relative flex items-center justify-center bg-background p-8 md:p-20">
                <div class="w-full max-w-md space-y-12">
                    <header class="space-y-4">
                        <h2 class="font-headline text-4xl font-extrabold tracking-tighter text-white md:text-5xl">Create Account</h2>
                        <p class="font-body text-lg text-on-surface-variant">Start your journey with THREADLAB.</p>
                    </header>

                    @if ($errors->any())
                        <div class="border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('customer.store') }}" class="space-y-8" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div class="group">
                                <label class="mb-2 block font-label text-xs font-semibold uppercase tracking-widest text-neutral-500 transition-colors group-focus-within:text-secondary">Full Name</label>
                                <input class="w-full rounded-lg border-none bg-surface-container-highest p-4 font-body text-on-surface outline-none transition-all placeholder:text-neutral-700 focus:ring-0" name="full_name" placeholder="ALEXANDER VOGUE" type="text" value="{{ old('full_name') }}">
                            </div>
                            <div class="group">
                                <label class="mb-2 block font-label text-xs font-semibold uppercase tracking-widest text-neutral-500 transition-colors group-focus-within:text-secondary">Email Address</label>
                                <input class="w-full rounded-lg border-none bg-surface-container-highest p-4 font-body text-on-surface outline-none transition-all placeholder:text-neutral-700 focus:ring-0" name="email" placeholder="IDENTITY@THREADLAB.COM" type="email" value="{{ old('email') }}">
                            </div>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="group">
                                    <label class="mb-2 block font-label text-xs font-semibold uppercase tracking-widest text-neutral-500 transition-colors group-focus-within:text-secondary">Password</label>
                                    <input class="w-full rounded-lg border-none bg-surface-container-highest p-4 font-body text-on-surface outline-none transition-all placeholder:text-neutral-700 focus:ring-0" name="password" placeholder="••••••••" type="password">
                                </div>
                                <div class="group">
                                    <label class="mb-2 block font-label text-xs font-semibold uppercase tracking-widest text-neutral-500 transition-colors group-focus-within:text-secondary">Confirm</label>
                                    <input class="w-full rounded-lg border-none bg-surface-container-highest p-4 font-body text-on-surface outline-none transition-all placeholder:text-neutral-700 focus:ring-0" name="password_confirmation" placeholder="••••••••" type="password">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="flex h-5 items-center">
                                <input class="h-5 w-5 rounded-sm border-outline-variant bg-surface-container-highest text-primary-container focus:ring-0 focus:ring-offset-0" {{ old('terms') ? 'checked' : '' }} name="terms" type="checkbox" value="1">
                            </div>
                            <label class="font-body text-sm leading-tight text-neutral-400">
                                I agree to the <a class="text-secondary underline-offset-4 hover:underline" href="#">Terms &amp; Privacy Policy</a>
                            </label>
                        </div>

                        <button class="w-full rounded-none bg-gradient-to-r from-primary to-primary-container py-5 font-headline text-sm font-extrabold uppercase tracking-widest text-on-primary-container transition-all hover:opacity-90 active:scale-[0.98]" type="submit">
                            Register
                        </button>
                    </form>

                    <footer class="flex flex-col items-center justify-between space-y-4 border-t border-outline-variant/20 pt-8 md:flex-row md:space-y-0">
                        <p class="font-body text-sm text-neutral-500">
                            Already a member? <a class="font-bold text-white transition-colors hover:text-primary-container" href="{{ route('customer.login') }}">Login</a>
                        </p>
                        <div class="flex space-x-6 font-label text-xs tracking-tighter text-neutral-600">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[12px]" data-icon="verified_user">verified_user</span>
                                ENCRYPTED
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[12px]" data-icon="public">public</span>
                                GLOBAL ACCESS
                            </span>
                        </div>
                    </footer>
                </div>
            </section>
        </main>

        <footer class="mt-auto flex w-full flex-col items-center justify-between border-t border-neutral-800/20 bg-neutral-950 px-10 py-8 md:flex-row">
            <div class="font-headline text-xs font-bold uppercase tracking-widest text-neutral-500">© 2024 KINETIC EDITORIAL. ALL RIGHTS RESERVED.</div>
            <div class="mt-4 flex space-x-8 md:mt-0">
                <a class="font-label text-[10px] text-neutral-600 transition-opacity hover:text-lime-400" href="#">PRIVACY</a>
                <a class="font-label text-[10px] text-neutral-600 transition-opacity hover:text-lime-400" href="#">TERMS</a>
                <a class="font-label text-[10px] text-neutral-600 transition-opacity hover:text-lime-400" href="#">ACCESSIBILITY</a>
            </div>
        </footer>
    </body>
</html>
