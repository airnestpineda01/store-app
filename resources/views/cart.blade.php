<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | YOUR CART</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: "#D9FF00",
                            "on-primary": "#000000",
                            background: "#000000",
                            surface: "#111111",
                            "surface-container": "#1A1A1A",
                            "surface-variant": "#222222",
                            "on-surface": "#FFFFFF",
                            "on-surface-variant": "#A1A1A1"
                        },
                        borderRadius: {
                            DEFAULT: "0rem",
                            lg: "0rem",
                            xl: "0rem",
                            full: "9999px"
                        },
                        fontFamily: {
                            headline: ["Plus Jakarta Sans", "sans-serif"],
                            body: ["Plus Jakarta Sans", "sans-serif"],
                            label: ["Plus Jakarta Sans", "sans-serif"]
                        }
                    },
                }
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
                vertical-align: middle;
            }

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background-color: #000000;
                color: #FFFFFF;
            }

            h1, h2, h3, h4 {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-weight: 800;
            }

            .italic-headline {
                font-style: italic;
            }
        </style>
    </head>
    <body class="bg-background text-on-surface antialiased">
        @include('partials.header')

        <main class="mx-auto min-h-screen max-w-[1200px] px-6 pb-24 pt-32">
            <header class="mb-20">
                <h1 class="italic-headline mb-4 text-7xl font-extrabold uppercase leading-none tracking-tighter md:text-9xl">Your Cart</h1>
                <p class="font-body text-xs font-bold uppercase tracking-[0.2em] text-primary">Atelier Selection / Vol. 24</p>
            </header>

            <div class="flex flex-col gap-16 lg:flex-row">
                <div class="flex-grow space-y-16">
                    @if (empty($cartItems))
                        <div class="border border-white/10 bg-surface p-10 text-center">
                            <h2 class="italic-headline text-3xl font-extrabold uppercase tracking-tighter">Your cart is empty</h2>
                            <p class="mt-4 text-sm uppercase tracking-[0.2em] text-zinc-500">Add pieces from the collection to begin your order.</p>
                            <a class="mt-8 inline-block bg-primary px-8 py-4 text-xs font-extrabold uppercase tracking-[0.2em] text-black transition-transform hover:scale-[1.02]" href="{{ route('shop') }}">
                                Continue Shopping
                            </a>
                        </div>
                    @endif

                    @foreach ($cartItems as $item)
                        <div class="flex flex-col items-start gap-8 border-b border-white/10 pb-16 md:flex-row">
                            <div class="aspect-[3/4] w-full overflow-hidden bg-surface-container md:w-64">
                                <a class="block h-full w-full" href="{{ route('product.show', $item['slug']) }}">
                                    <img alt="{{ $item['name'] }}" class="h-full w-full object-cover grayscale transition-all duration-700 hover:grayscale-0" src="{{ $item['image'] }}">
                                </a>
                            </div>
                            <div class="flex h-64 flex-grow flex-col justify-between py-2">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="italic-headline text-3xl font-extrabold uppercase tracking-tighter">
                                            <a class="transition-colors hover:text-primary" href="{{ route('product.show', $item['slug']) }}">{{ $item['name'] }}</a>
                                        </h3>
                                        <p class="mt-2 text-sm font-bold uppercase tracking-widest text-zinc-500">{{ $item['meta'] }}</p>
                                    </div>
                                    <span class="italic-headline text-2xl font-extrabold tracking-tighter text-primary">{{ $item['line_total'] }}</span>
                                </div>
                                <div class="flex items-end justify-between">
                                    <div class="flex items-center border border-white/20 p-1">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input name="key" type="hidden" value="{{ $item['key'] }}">
                                            <input name="direction" type="hidden" value="decrease">
                                            <button class="flex h-10 w-10 items-center justify-center transition-colors hover:bg-white/10" type="submit">
                                                <span class="material-symbols-outlined text-sm">remove</span>
                                            </button>
                                        </form>
                                        <span class="px-6 text-lg font-bold">{{ $item['quantity'] }}</span>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input name="key" type="hidden" value="{{ $item['key'] }}">
                                            <input name="direction" type="hidden" value="increase">
                                            <button class="flex h-10 w-10 items-center justify-center transition-colors hover:bg-white/10" type="submit">
                                                <span class="material-symbols-outlined text-sm">add</span>
                                            </button>
                                        </form>
                                    </div>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input name="key" type="hidden" value="{{ $item['key'] }}">
                                        <button class="text-xs font-bold uppercase tracking-widest text-zinc-500 underline decoration-primary underline-offset-8 transition-colors hover:text-white" type="submit">
                                            Remove Item
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <aside class="lg:w-96">
                    <div class="sticky top-32 border border-white/10 bg-surface p-10">
                        <h2 class="italic-headline mb-10 text-3xl font-extrabold uppercase tracking-tighter">Summary</h2>
                        <div class="space-y-6 font-body text-sm uppercase tracking-[0.15em]">
                            <div class="flex justify-between">
                                <span class="font-bold text-zinc-500">Subtotal</span>
                                <span class="font-extrabold text-white">{{ $subtotal }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-bold text-zinc-500">Shipping</span>
                                <span class="font-extrabold text-white">{{ $shipping }}</span>
                            </div>
                            <div class="flex justify-between border-t border-white/10 pt-6">
                                <span class="text-lg font-extrabold">Total</span>
                                <span class="italic-headline text-3xl font-extrabold tracking-tighter text-primary">{{ $total }}</span>
                            </div>
                        </div>
                        <div class="mt-12 space-y-4">
                            <a class="block w-full bg-primary py-6 text-center text-xs font-extrabold uppercase tracking-[0.2em] text-black shadow-[0_0_20px_rgba(217,255,0,0.3)] transition-all duration-300 hover:scale-[1.02] active:scale-95 {{ empty($cartItems) ? 'pointer-events-none opacity-40' : '' }}" href="{{ route('checkout') }}">
                                Proceed to Checkout
                            </a>
                            <p class="mt-6 text-center text-[9px] font-bold uppercase tracking-[0.2em] text-zinc-500">
                                Tax included. Shipping calculated at checkout.
                            </p>
                        </div>
                        <div class="mt-10 flex items-start gap-4 border-t border-white/10 pt-10">
                            <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">verified</span>
                            <p class="text-[10px] font-bold uppercase tracking-widest leading-relaxed text-zinc-400">
                                Exclusive Atelier Guarantee. Limited production runs ensuring rarity.
                            </p>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="-mx-6 mt-40 -rotate-1 overflow-hidden whitespace-nowrap bg-primary py-6">
                <div class="animate-marquee inline-block">
                    <span class="mx-8 text-5xl font-extrabold uppercase tracking-tighter text-black italic">New Archive Drop 2024 — Worldwide Shipping — ThreadLab Atelier — Hand-Finished Details — Kinetic Editorial —</span>
                    <span class="mx-8 text-5xl font-extrabold uppercase tracking-tighter text-black italic">New Archive Drop 2024 — Worldwide Shipping — ThreadLab Atelier — Hand-Finished Details — Kinetic Editorial —</span>
                </div>
            </div>
            <style>
                @keyframes marquee {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }

                .animate-marquee {
                    display: inline-block;
                    animation: marquee 20s linear infinite;
                }
            </style>
        </main>

        <footer class="w-full border-t border-white/10 bg-black px-6 py-24">
            <div class="mx-auto flex max-w-[1200px] flex-col items-center justify-between gap-12 md:flex-row">
                <div class="flex flex-col items-center md:items-start">
                    <span class="italic-headline mb-4 text-2xl font-extrabold tracking-tighter text-white">THREADLAB</span>
                    <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-600">© 2024 THREADLAB ATELIER. PRODUCED IN LIMITED QUANTITIES.</p>
                </div>
                <div class="flex flex-wrap justify-center gap-x-12 gap-y-6">
                    <a class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-500 transition-all duration-300 hover:text-primary" href="#">PRIVACY</a>
                    <a class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-500 transition-all duration-300 hover:text-primary" href="#">TERMS</a>
                    <a class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-500 transition-all duration-300 hover:text-primary" href="#">SHIPPING</a>
                    <a class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-500 transition-all duration-300 hover:text-primary" href="#">RETURNS</a>
                    <a class="text-[10px] font-bold uppercase tracking-[0.3em] text-zinc-500 transition-all duration-300 hover:text-primary" href="#">CONTACT</a>
                </div>
            </div>
        </footer>
    </body>
</html>
