<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | CHECKOUT</title>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: "#D9FF00",
                            background: "#0B0B0B",
                            surface: "#141414",
                            "surface-variant": "#1A1A1A",
                            "on-surface": "#FFFFFF",
                            "on-surface-variant": "#A1A1A1",
                            outline: "#2A2A2A",
                            error: "#FF4444"
                        },
                        borderRadius: {
                            DEFAULT: "0px",
                            lg: "2px",
                            xl: "4px",
                            full: "9999px"
                        },
                        fontFamily: {
                            headline: ["Plus Jakarta Sans"],
                            body: ["Plus Jakarta Sans"],
                            label: ["Plus Jakarta Sans"]
                        }
                    },
                }
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .neon-border {
                box-shadow: 0 0 15px rgba(217, 255, 0, 0.15);
            }

            .neon-glow {
                text-shadow: 0 0 10px rgba(217, 255, 0, 0.5);
            }

            .italic-heading {
                font-style: italic;
                font-weight: 800;
            }
        </style>
    </head>
    <body class="bg-background font-body text-on-surface selection:bg-primary selection:text-black">
        @php
            $subtotalValue = (int) preg_replace('/[^\d]/', '', $subtotal);
            $standardShipping = $cartItems ? 100 : 0;
            $expressShipping = $cartItems ? 300 : 0;
            $initialShippingValue = $shippingMethod === 'express' ? $expressShipping : $standardShipping;
            $initialTotalValue = $subtotalValue + $initialShippingValue;
        @endphp

        @include('partials.header')

        <main class="mx-auto min-h-screen max-w-[1200px] px-6 pb-24 pt-32">
            <div class="grid grid-cols-1 gap-16 lg:grid-cols-12 lg:gap-24">
                <div class="space-y-20 lg:col-span-7">
                    <div class="relative">
                        <h1 class="italic-heading mb-2 text-6xl uppercase tracking-tighter md:text-8xl">Checkout</h1>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-primary">Secure your selection from the Digital Atelier.</p>
                        <div class="neon-border absolute -left-6 top-0 h-full w-1 bg-primary"></div>
                    </div>

                    <section class="space-y-10">
                        <div class="flex items-baseline justify-between border-b border-outline pb-4">
                            <h2 class="italic-heading text-2xl uppercase tracking-tight">01 / Shipping Address</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-x-12 gap-y-8 md:grid-cols-2">
                            <div class="space-y-3">
                                <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">First Name</label>
                                <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" form="checkout-form" name="first_name" placeholder="ALEXANDER" type="text" value="{{ old('first_name', $profile['first_name']) }}">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Last Name</label>
                                <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" form="checkout-form" name="last_name" placeholder="MCQUEEN" type="text" value="{{ old('last_name', $profile['last_name']) }}">
                            </div>
                            <div class="space-y-3 md:col-span-2">
                                <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Street Address</label>
                                <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" form="checkout-form" name="street_address" placeholder="128 STUDIO ALLEY, SUITE 4" type="text" value="{{ old('street_address', $profile['street_address']) }}">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">City</label>
                                <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" form="checkout-form" name="city" placeholder="METRO MANILA" type="text" value="{{ old('city', $profile['city']) }}">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Zip Code</label>
                                <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" form="checkout-form" name="zip_code" placeholder="1200" type="text" value="{{ old('zip_code', $profile['zip_code']) }}">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-10">
                        <h2 class="italic-heading border-b border-outline pb-4 text-2xl uppercase tracking-tight">02 / Shipping Method</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <label class="group relative flex cursor-pointer items-center justify-between border border-outline bg-surface-variant p-8 transition-all duration-300 hover:border-primary">
                                <input {{ $shippingMethod === 'standard' ? 'checked' : '' }} class="peer hidden" name="shipping" type="radio" value="standard">
                                <div class="space-y-1">
                                    <span class="block text-lg font-bold uppercase italic">Standard</span>
                                    <span class="text-[10px] uppercase tracking-widest text-on-surface-variant">3-5 BUSINESS DAYS</span>
                                </div>
                                <span class="text-xl font-bold italic tracking-tighter">₱100</span>
                                <div class="neon-border pointer-events-none absolute inset-0 border-2 border-primary opacity-0 transition-opacity peer-checked:opacity-100"></div>
                            </label>
                            <label class="group relative flex cursor-pointer items-center justify-between border border-outline bg-surface-variant p-8 transition-all duration-300 hover:border-primary">
                                <input {{ $shippingMethod === 'express' ? 'checked' : '' }} class="peer hidden" name="shipping" type="radio" value="express">
                                <div class="space-y-1">
                                    <span class="block text-lg font-bold uppercase italic">Express</span>
                                    <span class="text-[10px] uppercase tracking-widest text-on-surface-variant">OVERNIGHT DELIVERY</span>
                                </div>
                                <span class="text-xl font-bold italic tracking-tighter">₱300</span>
                                <div class="neon-border pointer-events-none absolute inset-0 border-2 border-primary opacity-0 transition-opacity peer-checked:opacity-100"></div>
                            </label>
                        </div>
                    </section>

                    <section class="space-y-10">
                        <h2 class="italic-heading border-b border-outline pb-4 text-2xl uppercase tracking-tight">03 / Payment Method</h2>
                        <div class="space-y-8">
                            <div class="border border-outline bg-surface-variant">
                                <label class="group flex cursor-pointer items-center gap-6 p-8">
                                    <input checked class="h-6 w-6 border-2 border-primary bg-transparent text-primary focus:ring-0 focus:ring-offset-0" name="payment" type="radio" value="card">
                                    <span class="text-xl font-bold uppercase italic">Credit / Debit Card</span>
                                </label>
                                <div class="space-y-8 px-8 pb-10">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Card Number</label>
                                        <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" placeholder="0000 0000 0000 0000" type="text">
                                    </div>
                                    <div class="grid grid-cols-2 gap-12">
                                        <div class="space-y-3">
                                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">Expiry Date</label>
                                            <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" placeholder="MM/YY" type="text">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-on-surface-variant">CVV</label>
                                            <input class="w-full border-0 border-b-2 border-outline bg-transparent px-0 py-4 text-lg font-bold uppercase placeholder:text-white/10 focus:border-primary focus:ring-0" placeholder="***" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="group relative">
                                <div class="absolute -inset-0.5 bg-primary opacity-20 blur transition duration-500 group-hover:opacity-40"></div>
                                <div class="relative border-2 border-primary/50 bg-surface-variant transition-all duration-300 group-hover:border-primary">
                                    <label class="flex cursor-pointer items-center gap-6 p-8">
                                        <input class="h-6 w-6 border-2 border-primary bg-transparent text-primary focus:ring-0 focus:ring-offset-0" name="payment" type="radio" value="cod">
                                        <div class="flex flex-col">
                                            <span class="neon-glow text-xl font-bold uppercase italic text-primary">Cash on Delivery</span>
                                            <span class="text-[10px] uppercase tracking-[0.2em] text-white/50">Pay upon receiving your pieces — Premium Service</span>
                                        </div>
                                        <span class="material-symbols-outlined ml-auto text-primary">workspace_premium</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="lg:col-span-5">
                    <div class="neon-border sticky top-32 space-y-10 border border-outline bg-surface p-10">
                        <h2 class="italic-heading mb-10 border-b border-primary/20 pb-6 text-4xl uppercase tracking-tighter">Summary</h2>
                        <div class="space-y-8 border-b border-outline pb-10">
                            @forelse ($cartItems as $item)
                                <div class="flex gap-6">
                                    <div class="relative h-36 w-28 flex-shrink-0 overflow-hidden border border-outline bg-surface-variant">
                                        <img alt="{{ $item['name'] }}" class="h-full w-full object-cover grayscale transition-all duration-500 hover:scale-110 hover:grayscale-0" src="{{ $item['image'] }}">
                                        <div class="absolute inset-0 bg-primary/5"></div>
                                    </div>
                                    <div class="flex flex-grow flex-col justify-between py-2">
                                        <div>
                                            <h3 class="text-lg font-bold uppercase tracking-tight italic">{{ $item['name'] }}</h3>
                                            <p class="mt-2 text-[10px] uppercase tracking-widest text-on-surface-variant">{{ $item['meta'] }}</p>
                                            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant">Qty: <span class="font-bold text-on-surface">{{ $item['quantity'] }}</span></p>
                                        </div>
                                        <span class="text-xl font-bold tracking-tighter text-primary italic">{{ $item['line_total'] }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="border border-dashed border-outline p-6 text-center">
                                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-on-surface-variant">No items in checkout yet</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-bold uppercase tracking-[0.3em] text-on-surface-variant">Subtotal</span>
                                <span class="font-bold tracking-tighter italic" data-checkout-subtotal="{{ $subtotalValue }}">{{ $subtotal }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-bold uppercase tracking-[0.3em] text-on-surface-variant">Shipping</span>
                                <span
                                    class="font-bold tracking-tighter italic"
                                    data-checkout-shipping
                                    data-standard-shipping="{{ $standardShipping }}"
                                    data-express-shipping="{{ $expressShipping }}"
                                >{{ $shipping }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-primary/20 pt-8">
                                <span class="italic-heading text-2xl uppercase tracking-tighter">Total</span>
                                <span class="neon-glow text-4xl font-black tracking-tighter text-primary italic" data-checkout-total="{{ $initialTotalValue }}">{{ $total }}</span>
                            </div>
                        </div>

                        <form action="{{ route('checkout.complete') }}" id="checkout-form" method="POST">
                            @csrf
                            <input name="shipping_method" type="hidden" value="{{ $shippingMethod }}" data-checkout-shipping-input>
                            <button class="group flex w-full items-center justify-center gap-4 bg-primary px-12 py-8 text-sm uppercase tracking-[0.3em] text-black transition-all duration-300 hover:scale-[1.02] hover:bg-white active:scale-95 {{ empty($cartItems) ? 'pointer-events-none opacity-40' : '' }}" type="submit">
                                <span class="italic-heading">Complete Purchase</span>
                                <span class="material-symbols-outlined font-bold transition-transform group-hover:translate-x-2">arrow_forward</span>
                            </button>
                        </form>

                        <div class="flex items-center justify-center gap-4 pt-6 opacity-30">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span class="text-[9px] font-bold uppercase tracking-[0.4em]">SSL SECURED ENCRYPTION</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mt-24 w-full border-t border-outline bg-surface px-6 py-16">
            <div class="mx-auto flex w-full max-w-[1200px] flex-col items-center justify-between gap-12 md:flex-row">
                <div class="italic-heading text-xl uppercase tracking-tighter text-primary">
                    THREADLAB ATELIER
                </div>
                <div class="flex flex-wrap justify-center gap-12">
                    <a class="text-[10px] uppercase tracking-[0.4em] text-on-surface-variant transition-colors hover:text-primary" href="#">PRIVACY</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] text-on-surface-variant transition-colors hover:text-primary" href="#">TERMS</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] text-on-surface-variant transition-colors hover:text-primary" href="#">SHIPPING</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] text-on-surface-variant transition-colors hover:text-primary" href="#">RETURNS</a>
                </div>
                <div class="text-[9px] font-bold tracking-[0.3em] text-white/20">
                    © 2024 THREADLAB DIGITAL ATELIER
                </div>
            </div>
        </footer>

        <script>
            (() => {
                const shippingRadios = document.querySelectorAll('input[name="shipping"]');
                const shippingOutput = document.querySelector('[data-checkout-shipping]');
                const totalOutput = document.querySelector('[data-checkout-total]');
                const subtotalOutput = document.querySelector('[data-checkout-subtotal]');
                const shippingInput = document.querySelector('[data-checkout-shipping-input]');

                if (!shippingRadios.length || !shippingOutput || !totalOutput || !subtotalOutput || !shippingInput) {
                    return;
                }

                const formatPeso = (amount) => `₱${Number(amount).toLocaleString('en-US')}`;
                const subtotalValue = Number(subtotalOutput.dataset.checkoutSubtotal || 0);
                const standardShipping = Number(shippingOutput.dataset.standardShipping || 0);
                const expressShipping = Number(shippingOutput.dataset.expressShipping || 0);

                const updateSummary = () => {
                    const selectedMethod = document.querySelector('input[name="shipping"]:checked')?.value || 'standard';
                    const shippingValue = selectedMethod === 'express' ? expressShipping : standardShipping;

                    shippingOutput.textContent = formatPeso(shippingValue);
                    totalOutput.textContent = formatPeso(subtotalValue + shippingValue);
                    shippingInput.value = selectedMethod;
                };

                shippingRadios.forEach((radio) => {
                    radio.addEventListener('change', updateSummary);
                });

                updateSummary();
            })();
        </script>
    </body>
</html>
