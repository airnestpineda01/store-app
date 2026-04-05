<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>KINETIC | LOGIN</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,800;1,800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
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
                            "on-error-container": "#ffd2c8",
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

            .editorial-gradient {
                background: linear-gradient(to bottom, rgba(14, 14, 14, 0.4) 0%, rgba(14, 14, 14, 0.9) 100%);
            }

            .btn-volt-gradient {
                background: linear-gradient(90deg, #f5ffc4 0%, #d5fb00 100%);
            }
        </style>
    </head>
    <body class="bg-background font-body text-on-background selection:bg-primary-container selection:text-on-primary-container">
        <main class="flex min-h-screen flex-col md:flex-row">
            <section class="relative h-[409px] w-full overflow-hidden md:h-screen md:w-1/2 lg:w-3/5">
                <img alt="High-impact streetwear model" class="absolute inset-0 h-full w-full object-cover grayscale contrast-125" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqmBIkICqUgdwWrmESCz8QNvzs4jDK72JLsXZ6Qx863AQwthy7LN88m-FZGNzjS1wBBbR46-hgQKxF2IMrnNz3n_YiSREwPG8XfDNAdi8gLj8kkEz1YMClHueucmbcYXbQYAKN_EDJkQDxUPuQpJpW4RJ1seyrqZw7u4OOz6OPoc2jogFqprA2CIMkuA4qn1FwwBntLO4IZc00InG11VGwUqZqBp8YuU3BwPWSZ-J4_NBHp9jW9sS8BOliGY-HsmIrrwIXOmonoyk">
                <div class="editorial-gradient absolute inset-0 flex flex-col justify-end p-8 md:p-16 lg:p-24">
                    <div class="space-y-2">
                        <h1 class="font-headline text-5xl font-black italic leading-[0.85] tracking-tighter text-white md:text-7xl lg:text-8xl">
                            KINETIC ACCESS
                        </h1>
                        <div class="flex items-center gap-4">
                            <div class="h-[2px] w-12 bg-primary-container"></div>
                            <p class="font-label text-sm font-bold tracking-[0.3em] text-primary-container md:text-base">
                                THE DIGITAL ATELIER
                            </p>
                        </div>
                    </div>
                </div>
                <div class="absolute left-8 top-8 border border-white/10 px-4 py-2 backdrop-blur-md">
                    <span class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">EST. 2024 / AUTHENTICATED</span>
                </div>
            </section>

            <section class="flex w-full flex-col justify-center bg-surface px-8 py-16 md:w-1/2 md:px-16 lg:w-2/5 lg:px-24">
                <div class="mx-auto w-full max-w-md">
                    <div class="mb-12">
                        <span class="text-2xl font-black italic tracking-tighter text-lime-400">KINETIC</span>
                    </div>
                    <header class="mb-10">
                        <h2 class="mb-3 font-headline text-4xl font-bold tracking-tight text-white">Welcome Back</h2>
                        <p class="font-body text-on-surface-variant">Login to access your kinetic registry.</p>
                    </header>
                    @if ($errors->any())
                        <div class="border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('customer.authenticate') }}" class="space-y-6" method="POST">
                        @csrf
                        <div class="space-y-2">
                            <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant" for="email">Email Address</label>
                            <div class="group relative">
                                <input class="w-full rounded-none border-none bg-surface-container-highest px-5 py-4 text-white outline-none transition-all placeholder:text-neutral-600 focus:ring-2 focus:ring-secondary" id="email" name="email" placeholder="name@kinetic.com" type="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant" for="password">Password</label>
                                <a class="text-[10px] font-bold uppercase tracking-tighter text-secondary transition-colors hover:text-primary-container" href="#">Forgot Password?</a>
                            </div>
                            <div class="group relative">
                                <input class="w-full rounded-none border-none bg-surface-container-highest px-5 py-4 text-white outline-none transition-all placeholder:text-neutral-600 focus:ring-2 focus:ring-secondary" id="password" name="password" placeholder="••••••••" type="password">
                            </div>
                        </div>
                        <div class="flex items-center gap-3 py-2">
                            <div class="relative flex items-center">
                                <input class="h-5 w-5 cursor-pointer rounded-none border-none bg-surface-container-highest text-primary-container focus:ring-0" id="remember" name="remember" type="checkbox">
                            </div>
                            <label class="font-label select-none text-xs text-neutral-400" for="remember">Remember Me</label>
                        </div>
                        <div class="pt-4">
                            <button class="btn-volt-gradient w-full py-5 font-headline text-sm font-black uppercase tracking-widest text-on-primary-container transition-transform hover:brightness-110 active:scale-[0.98]" type="submit">
                                Login
                            </button>
                        </div>
                    </form>
                    <footer class="mt-12 border-t border-white/5 pt-8 text-center">
                        <p class="font-body text-sm text-on-surface-variant">
                            New to ThreadLab?
                            <a class="ml-1 font-bold text-white underline decoration-primary-container underline-offset-8 transition-colors hover:text-primary-container" href="{{ route('customer.register') }}">Create Account</a>
                        </p>
                    </footer>
                </div>
            </section>
        </main>

        <footer class="mt-auto flex w-full flex-col items-center justify-between border-t border-neutral-800/20 bg-neutral-950 px-10 py-8 md:flex-row">
            <div class="mb-4 text-xs font-bold uppercase tracking-tighter text-neutral-500 md:mb-0">KINETIC</div>
            <div class="mb-6 flex gap-8 md:mb-0">
                <a class="font-label text-[10px] tracking-widest text-neutral-600 opacity-70 transition-opacity hover:text-lime-400 hover:opacity-100" href="#">PRIVACY</a>
                <a class="font-label text-[10px] tracking-widest text-neutral-600 opacity-70 transition-opacity hover:text-lime-400 hover:opacity-100" href="#">TERMS</a>
                <a class="font-label text-[10px] tracking-widest text-neutral-600 opacity-70 transition-opacity hover:text-lime-400 hover:opacity-100" href="#">ACCESSIBILITY</a>
            </div>
            <div class="text-[10px] font-medium tracking-widest text-neutral-600">
                © 2024 KINETIC EDITORIAL. ALL RIGHTS RESERVED.
            </div>
        </footer>
    </body>
</html>
