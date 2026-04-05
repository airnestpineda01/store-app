<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB Admin | Login</title>
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
                            primary: "#D9FF00",
                            "primary-container": "#D9FF00",
                            "on-primary-container": "#000000",
                            background: "#0B0B0B",
                            surface: "#0B0B0B",
                            "surface-container": "#1A1A1A",
                            "surface-container-highest": "#262626",
                            "on-surface": "#ffffff",
                            "on-surface-variant": "#adaaaa",
                            outline: "#777575",
                            secondary: "#7799ff"
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
                font-family: 'Inter', sans-serif;
                background-color: #0B0B0B;
            }

            h1, h2, h3, .headline {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            .btn-glow:hover {
                box-shadow: 0 0 20px rgba(217, 255, 0, 0.4);
            }
        </style>
    </head>
    <body class="overflow-hidden bg-background text-on-surface antialiased selection:bg-primary selection:text-on-primary-container">
        <main class="flex min-h-screen flex-col md:flex-row">
            <section class="relative flex w-full items-end overflow-hidden bg-black p-8 md:w-1/2 md:p-16 lg:w-3/5 lg:p-24">
                <div class="absolute inset-0 z-0">
                    <img alt="Editorial streetwear fashion" class="h-full w-full object-cover grayscale contrast-125 opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBebLjj5yzCcuoC-afBrxgMXDriYKPB6IeXTtF6TUnGK3FA0gA1UUjk_zfGUYOb-ZowmD_0X0iMDKk01x9XcaxtCtJjYBevo-4X9ldM_dN9aZO9V9DTRX4sK31kLxZYGwUq7lRQ2GP1e7CIJ1PsZoTXITFoQkOBRIKowQSlw85dZHC_N5CQHtNQfjNpfxbCADpp2_E6EG0jdNfaB_Fa1sHVHVqVejjSCWN_ZXI36MlygTC771suexUaTqF9qXvesrVx5uzJeHeRkOk">
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-90"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-background via-transparent to-transparent opacity-40"></div>
                </div>
                <div class="relative z-10 max-w-2xl">
                    <div class="mb-12">
                        <span class="font-headline text-3xl font-black italic tracking-tighter text-primary">THREADLAB</span>
                        <span class="mt-2 block text-xs uppercase tracking-[0.3em] text-white/40">Kinetic Editorial Systems</span>
                    </div>
                    <h1 class="mb-8 font-headline text-5xl font-extrabold leading-[0.9] tracking-tighter text-white md:text-7xl lg:text-8xl">
                        Manage Your <span class="italic text-primary">Store</span> with <br>Confidence
                    </h1>
                    <p class="max-w-md border-l-2 border-primary pl-6 text-lg leading-relaxed text-white/60 md:text-xl">
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
                <div class="absolute -right-32 -top-32 h-64 w-64 rounded-full bg-primary/5 blur-[120px]"></div>
                <div class="w-full max-w-md">
                    <div class="mb-10 text-left">
                        <h2 class="mb-2 font-headline text-3xl font-bold tracking-tight text-white md:text-4xl">Admin Login</h2>
                        <p class="text-sm text-white/50 md:text-base">Access the THREADLAB dashboard</p>
                    </div>
                    <form action="{{ route('admin.dashboard') }}" class="space-y-6" method="GET">
                        <div class="space-y-1.5">
                            <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="email">Email Address</label>
                            <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-primary" id="email" name="email" placeholder="admin@threadlab.studio" required type="email">
                        </div>
                        <div class="space-y-1.5">
                            <label class="ml-1 text-[10px] font-semibold uppercase tracking-widest text-white/40" for="password">Password</label>
                            <input class="w-full rounded-xl border-none bg-surface-container-highest px-4 py-4 text-on-surface outline-none transition-all placeholder:text-white/20 focus:ring-2 focus:ring-primary" id="password" name="password" placeholder="••••••••••••" required type="password">
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <label class="group flex cursor-pointer items-center gap-3">
                                <input class="h-5 w-5 rounded border-none bg-surface-container-highest text-primary focus:ring-primary focus:ring-offset-background" type="checkbox">
                                <span class="text-xs text-white/40 transition-colors group-hover:text-white">Remember Me</span>
                            </label>
                            <a class="text-xs font-bold italic text-primary transition-colors hover:text-white" href="#">Forgot Password?</a>
                        </div>
                        <button class="btn-glow mt-4 w-full rounded-xl bg-primary py-5 font-headline text-sm font-black uppercase tracking-widest text-on-primary-container transition-all active:scale-[0.98]" type="submit">
                            Login
                        </button>
                    </form>
                    <div class="mt-12 border-t border-white/10 pt-8 text-center">
                        <p class="text-sm text-white/40">
                            Don't have an account?
                            <a class="ml-1 font-bold text-secondary transition-colors hover:text-primary" href="{{ route('admin.register') }}">Register</a>
                        </p>
                    </div>
                </div>
                <footer class="absolute bottom-8 flex w-full items-center justify-between px-8 opacity-40 transition-opacity hover:opacity-100">
                    <span class="font-headline text-[9px] font-bold uppercase tracking-[0.3em] text-white">© 2024 THREADLAB KINETIC EDITORIAL</span>
                    <div class="flex gap-6">
                        <a class="text-[9px] uppercase tracking-widest text-white transition-colors hover:text-primary" href="#">Support</a>
                        <a class="text-[9px] uppercase tracking-widest text-white transition-colors hover:text-primary" href="#">System Status</a>
                    </div>
                </footer>
            </section>
        </main>

        <div class="pointer-events-none fixed -left-32 top-1/4 h-64 w-64 rounded-full bg-primary/10 blur-[150px]"></div>
        <div class="pointer-events-none fixed bottom-0 right-0 h-96 w-96 rounded-full bg-secondary/5 blur-[180px]"></div>
    </body>
</html>
