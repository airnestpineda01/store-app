<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB Admin Register</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&amp;family=Inter:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "surface-bright": "#2c2c2c",
                            "on-primary-fixed-variant": "#576800",
                            "on-secondary-container": "#f8f7ff",
                            "on-secondary": "#001b55",
                            surface: "#0e0e0e",
                            "error-container": "#b92902",
                            "on-tertiary-fixed-variant": "#685700",
                            "primary-fixed-dim": "#c8ec00",
                            "surface-variant": "#262626",
                            "surface-container-highest": "#262626",
                            "on-background": "#ffffff",
                            "surface-container-high": "#201f1f",
                            "primary-fixed": "#d5fb00",
                            "surface-container-low": "#131313",
                            "surface-container": "#1a1919",
                            "on-tertiary-container": "#5d4d00",
                            secondary: "#7799ff",
                            error: "#ff7351",
                            "primary-dim": "#cbef00",
                            "on-tertiary-fixed": "#473b00",
                            tertiary: "#ffeaa2",
                            "tertiary-dim": "#efcd34",
                            "outline-variant": "#484847",
                            background: "#0e0e0e",
                            "inverse-on-surface": "#565554",
                            "secondary-dim": "#316bf3",
                            outline: "#777575",
                            "on-primary": "#556600",
                            "surface-tint": "#f5ffc4",
                            "on-surface": "#ffffff",
                            "surface-container-lowest": "#000000",
                            "secondary-fixed": "#c4d0ff",
                            "inverse-surface": "#fcf8f8",
                            "error-dim": "#d53d18",
                            "on-error": "#450900",
                            "primary-container": "#d5fb00",
                            "on-tertiary": "#675600",
                            "tertiary-container": "#fedb42",
                            "on-surface-variant": "#adaaaa",
                            "on-secondary-fixed": "#002d80",
                            "secondary-fixed-dim": "#b0c2ff",
                            "inverse-primary": "#556600",
                            "on-primary-container": "#4e5d00",
                            "tertiary-fixed-dim": "#efcd34",
                            "on-primary-fixed": "#3d4a00",
                            "on-error-container": "#ffd2c8",
                            "on-secondary-fixed-variant": "#0047bd",
                            primary: "#f5ffc4",
                            "surface-dim": "#0e0e0e",
                            "tertiary-fixed": "#fedb42",
                            "secondary-container": "#0053db"
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
                }
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .btn-glow:hover {
                box-shadow: 0 0 20px rgba(213, 251, 0, 0.4);
            }
        </style>
    </head>
    <body class="min-h-screen bg-background font-body text-on-background selection:bg-primary-container selection:text-on-primary-container">
        <main class="flex min-h-screen flex-col md:flex-row">
            <section class="relative flex w-full items-end overflow-hidden bg-surface-container-lowest p-8 md:w-1/2 md:p-16 lg:w-3/5 lg:p-24">
                <div class="absolute inset-0 z-0">
                    <img alt="Editorial streetwear fashion" class="h-full w-full object-cover grayscale contrast-125 opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBebLjj5yzCcuoC-afBrxgMXDriYKPB6IeXTtF6TUnGK3FA0gA1UUjk_zfGUYOb-ZowmD_0X0iMDKk01x9XcaxtCtJjYBevo-4X9ldM_dN9aZO9V9DTRX4sK31kLxZYGwUq7lRQ2GP1e7CIJ1PsZoTXITFoQkOBRIKowQSlw85dZHC_N5CQHtNQfjNpfxbCADpp2_E6EG0jdNfaB_Fa1sHVHVqVejjSCWN_ZXI36MlygTC771suexUaTqF9qXvesrVx5uzJeHeRkOk">
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-90"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-background via-transparent to-transparent opacity-40"></div>
                </div>
                <div class="relative z-10 max-w-2xl">
                    <div class="mb-12">
                        <span class="font-headline text-3xl font-black italic tracking-tighter text-primary-container">THREADLAB</span>
                        <span class="mt-2 block text-xs uppercase tracking-[0.3em] text-white/40">Kinetic Editorial Systems</span>
                    </div>
                    <h1 class="mb-8 font-headline text-5xl font-extrabold leading-[0.9] tracking-tighter md:text-7xl lg:text-8xl">
                        Manage Your <span class="italic text-primary-container">Store</span> with <br>Confidence
                    </h1>
                    <p class="max-w-md border-l-2 border-primary-container pl-6 text-lg leading-relaxed text-white/60 md:text-xl">
                        Track orders, manage products, and monitor performance in one place. The digital flagship for your kinetic brand evolution.
                    </p>
                    <div class="mt-16 flex items-center gap-12 text-white/20">
                        <div class="flex flex-col">
                            <span class="font-headline text-3xl font-bold text-white">99.9%</span>
                            <span class="text-[10px] uppercase tracking-widest">Uptime Performance</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-headline text-3xl font-bold text-white">0.02s</span>
                            <span class="text-[10px] uppercase tracking-widest">Global Latency</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative flex w-full flex-col items-center justify-center bg-surface p-6 md:w-1/2 md:p-12 lg:w-2/5 lg:p-20">
                <div class="absolute -right-32 -top-32 h-64 w-64 rounded-full bg-primary-container/5 blur-[120px]"></div>
                <div class="w-full max-w-md">
                    <div class="mb-10 text-left">
                        <h2 class="mb-2 font-headline text-3xl font-bold tracking-tight md:text-4xl">Create Admin Account</h2>
                        <p class="text-sm text-white/50 md:text-base">Set up your THREADLAB admin access</p>
                    </div>

                    <form action="{{ route('admin.dashboard') }}" class="space-y-6" method="GET">
                        <div class="space-y-1.5">
                            <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="full_name">Full Name</label>
                            <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-secondary" id="full_name" name="full_name" placeholder="Alexander McQueen" type="text">
                        </div>
                        <div class="space-y-1.5">
                            <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="email">Email Address</label>
                            <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-secondary" id="email" name="email" placeholder="admin@threadlab.com" type="email">
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="space-y-1.5">
                                <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="password">Password</label>
                                <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-secondary" id="password" name="password" placeholder="••••••••" type="password">
                            </div>
                            <div class="space-y-1.5">
                                <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="confirm_password">Confirm Password</label>
                                <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-secondary" id="confirm_password" name="confirm_password" placeholder="••••••••" type="password">
                            </div>
                        </div>
                        <div class="flex items-center gap-3 pt-2">
                            <input class="h-5 w-5 rounded border-none bg-surface-container-highest text-primary-container focus:ring-primary-container focus:ring-offset-background" id="terms" name="terms" type="checkbox">
                            <label class="text-xs leading-snug text-white/40" for="terms">
                                I agree to the <span class="cursor-pointer text-white underline underline-offset-4 transition-colors hover:text-primary-container">Terms of Service</span> and <span class="cursor-pointer text-white underline underline-offset-4 transition-colors hover:text-primary-container">Privacy Policy</span>.
                            </label>
                        </div>
                        <button class="btn-glow mt-4 w-full rounded-xl bg-primary-container py-5 font-headline text-sm font-black uppercase tracking-widest text-on-primary-container transition-all active:scale-[0.98]" type="submit">
                            Register
                        </button>
                    </form>

                    <div class="mt-12 border-t border-outline-variant/10 pt-8 text-center">
                        <p class="text-sm text-white/40">
                            Already have an account?
                            <a class="ml-1 font-bold text-secondary transition-colors hover:text-primary-container" href="{{ route('admin.login') }}">Login</a>
                        </p>
                    </div>
                </div>

                <footer class="absolute bottom-8 flex w-full items-center justify-between px-8 opacity-40 transition-opacity hover:opacity-100">
                    <span class="font-headline text-[9px] font-bold uppercase tracking-[0.3em]">© 2024 THREADLAB KINETIC EDITORIAL</span>
                    <div class="flex gap-6">
                        <a class="text-[9px] uppercase tracking-widest transition-colors hover:text-primary-container" href="#">Support</a>
                        <a class="text-[9px] uppercase tracking-widest transition-colors hover:text-primary-container" href="#">System Status</a>
                    </div>
                </footer>
            </section>
        </main>

        <div class="pointer-events-none fixed -left-32 top-1/4 h-64 w-64 rounded-full bg-primary-container/10 blur-[150px]"></div>
        <div class="pointer-events-none fixed bottom-0 right-0 h-96 w-96 rounded-full bg-secondary/5 blur-[180px]"></div>
    </body>
</html>
