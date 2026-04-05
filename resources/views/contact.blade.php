<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>THREADLAB | Connect</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "on-tertiary-container": "#5d4d00",
                            "tertiary-fixed": "#fedb42",
                            "primary-fixed-dim": "#c8ec00",
                            "error-dim": "#d53d18",
                            "surface-container": "#1a1919",
                            "on-surface-variant": "#adaaaa",
                            "on-error": "#450900",
                            "surface": "#0e0e0e",
                            "on-primary-fixed": "#3d4a00",
                            "surface-dim": "#0e0e0e",
                            "primary-fixed": "#d5fb00",
                            "error-container": "#b92902",
                            "secondary-fixed": "#c4d0ff",
                            "primary-dim": "#cbef00",
                            "surface-container-lowest": "#000000",
                            "on-secondary": "#001b55",
                            "on-surface": "#ffffff",
                            "tertiary-fixed-dim": "#efcd34",
                            "on-secondary-container": "#f8f7ff",
                            "outline-variant": "#484847",
                            "surface-tint": "#f5ffc4",
                            "tertiary-dim": "#efcd34",
                            "inverse-on-surface": "#565554",
                            "on-secondary-fixed-variant": "#0047bd",
                            "tertiary": "#ffeaa2",
                            "surface-variant": "#262626",
                            "on-secondary-fixed": "#002d80",
                            "on-tertiary-fixed": "#473b00",
                            "on-primary-fixed-variant": "#576800",
                            "secondary-fixed-dim": "#b0c2ff",
                            "secondary": "#7799ff",
                            "background": "#0e0e0e",
                            "primary": "#f5ffc4",
                            "on-background": "#ffffff",
                            "secondary-container": "#0053db",
                            "on-error-container": "#ffd2c8",
                            "on-tertiary": "#675600",
                            "surface-bright": "#2c2c2c",
                            "on-primary-container": "#4e5d00",
                            "inverse-surface": "#fcf8f8",
                            "surface-container-low": "#131313",
                            "on-primary": "#556600",
                            "tertiary-container": "#fedb42",
                            "error": "#ff7351",
                            "secondary-dim": "#316bf3",
                            "primary-container": "#d5fb00",
                            "inverse-primary": "#556600",
                            "surface-container-high": "#201f1f",
                            "surface-container-highest": "#262626",
                            "on-tertiary-fixed-variant": "#685700",
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
            body { background-color: #0e0e0e; color: white; font-family: 'Inter', sans-serif; }
            .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
            .kinetic-title { letter-spacing: -0.05em; line-height: 0.9; }
            input, textarea { border-radius: 12px !important; }
        </style>
    </head>
    <body class="bg-background text-on-background antialiased selection:bg-primary-container selection:text-on-primary-container">
        @include('partials.header')

        <main class="mx-auto max-w-[1200px] px-8 pb-24 pt-32">
            <header class="mb-20">
                <h1 class="kinetic-title mb-4 font-headline text-6xl font-black uppercase italic text-on-surface md:text-9xl">
                    Connect <span class="text-primary-container">with the</span> Registry
                </h1>
                <div class="h-1 w-24 bg-primary-container"></div>
            </header>

            @if (session('contact_success'))
                <div class="mb-10 rounded-xl border border-primary-container/20 bg-primary-container/10 px-6 py-5 text-sm font-bold uppercase tracking-[0.2em] text-primary-container">
                    {{ session('contact_success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-10 rounded-xl border border-error/20 bg-error/10 px-6 py-5 text-sm font-bold uppercase tracking-[0.2em] text-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="grid grid-cols-1 items-start gap-16 lg:grid-cols-12">
                <div class="space-y-16 lg:col-span-5">
                    <section>
                        <h2 class="mb-8 font-headline text-xs uppercase tracking-[0.3em] text-on-surface-variant">Direct Channel</h2>
                        <div class="space-y-2">
                            <p class="font-headline text-3xl font-bold text-on-surface">studio@threadlab.com</p>
                            <p class="font-body text-on-surface-variant">General inquiries and wholesale partnerships.</p>
                        </div>
                    </section>
                    <section>
                        <h2 class="mb-8 font-headline text-xs uppercase tracking-[0.3em] text-on-surface-variant">Social Grid</h2>
                        <ul class="space-y-4 font-headline text-2xl font-bold">
                            <li><a class="flex items-center gap-4 transition-colors hover:text-primary-container" href="#">Instagram <span class="material-symbols-outlined text-sm">north_east</span></a></li>
                            <li><a class="flex items-center gap-4 transition-colors hover:text-primary-container" href="#">X <span class="material-symbols-outlined text-sm">north_east</span></a></li>
                            <li><a class="flex items-center gap-4 transition-colors hover:text-primary-container" href="#">Discord <span class="material-symbols-outlined text-sm">north_east</span></a></li>
                        </ul>
                    </section>
                    <section>
                        <h2 class="mb-8 font-headline text-xs uppercase tracking-[0.3em] text-on-surface-variant">Physical Node</h2>
                        <div class="flex items-start gap-6">
                            <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-xl bg-surface-variant">
                                <img class="absolute inset-0 h-full w-full object-cover grayscale opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAS3jL4JGaP4cfW3nYSmFTL_fflrCAx8nS3j7_owZBwOKxM5JljRru_GhD4htEAHHs5K9L4XDXfZAJcJ7fIDCUsw05r5BlmGdKSKMifogQ5K7OUGCLC4VgKYhXVKTj-Sklcn_8IZEwQNIXhAAm-sIyzRlGSeBa0RHoUoQHK2_ial671jbDLRFS2Wu5ZVdSix2oCwKOdcz2iLdgWpx0NfoBdjWwjP5NEDW4pql7Wwi_CWP8E1QF5_j8ftufOpwdpj7yyUka_onFpF4Y" alt="THREADLAB Manila studio">
                            </div>
                            <div>
                                <p class="font-headline text-xl font-bold">Manila, PH</p>
                                <p class="font-body text-on-surface-variant">Central Business District,<br>Taguig City 1634</p>
                            </div>
                        </div>
                    </section>
                    <div class="group relative mt-12 overflow-hidden rounded-xl bg-surface-container-low">
                        <img class="aspect-[4/5] w-full object-cover grayscale transition-transform duration-700 group-hover:scale-110 hover:grayscale-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsP6oywWf1jevi_gsjCoV7rqJ_SVEhf0UEwQ4v2YZA-kt1GQKRlQ7ydWPaod9az49L1Z-B57cajZ_KRfGwnRM8PFNvpBpnl7ww4Jak42pxCClYHou50_fcW-9gpJWlev3NcHQXIJlDH4AceDGwm-JM-aH8CX8unIiqY76UBKo38_naTIS51TP6K_m6ph3IG2Sfn5TDHDDBkKFKjvXL4u6rFzNqjSCPHTk8KT9q5sCUk9jcVChmJy6BtLkbpXl0cLqJB-MpjsW-mrI" alt="THREADLAB editorial portrait">
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="rounded-full bg-primary-container px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-on-primary-container">Editorial 004</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl bg-surface-container-low p-8 md:p-12 lg:col-span-7">
                    <form action="{{ route('contact.submit') }}" class="space-y-8" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <div class="space-y-2">
                                <label class="ml-2 font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Full Name</label>
                                <input class="w-full border-none bg-surface-container-highest px-6 py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:ring-2 focus:ring-secondary" name="full_name" placeholder="ALEX MERCER" type="text" value="{{ old('full_name') }}">
                            </div>
                            <div class="space-y-2">
                                <label class="ml-2 font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Email Address</label>
                                <input class="w-full border-none bg-surface-container-highest px-6 py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:ring-2 focus:ring-secondary" name="email" placeholder="ALEX@KINETIC.XYZ" type="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="ml-2 font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Message</label>
                            <textarea class="w-full resize-none border-none bg-surface-container-highest px-6 py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:ring-2 focus:ring-secondary" name="message" placeholder="TELL US ABOUT THE PROJECT..." rows="6">{{ old('message') }}</textarea>
                        </div>
                        <button class="flex w-full items-center justify-center gap-3 bg-gradient-to-r from-primary to-primary-container py-5 font-headline text-xl font-extrabold uppercase tracking-tighter text-on-primary-container transition-all hover:opacity-90" type="submit">
                            Send Message
                            <span class="material-symbols-outlined font-black">arrow_forward</span>
                        </button>
                    </form>
                </div>
            </div>

            <section class="mt-40">
                <div class="mb-12">
                    <h2 class="font-headline text-4xl font-black uppercase italic tracking-tighter">Frequently <span class="text-secondary">Queried</span></h2>
                    <p class="mt-2 max-w-md font-body text-on-surface-variant">Immediate answers for the rapid-response collector.</p>
                </div>
                <div class="space-y-px bg-outline-variant/20" data-faq>
                    @foreach ([
                        ['title' => 'Shipping Times', 'body' => 'Domestic orders ship within 48 hours via Kinetic Priority. International delivery ranges from 5-9 business days depending on customs processing in your region. All orders include encrypted tracking.'],
                        ['title' => 'Drop Notifications', 'body' => 'Join our Discord "Registry" or follow our X feed for millisecond-accurate drop timing. Email subscribers receive access codes 10 minutes prior to public release.'],
                        ['title' => 'Return Policy', 'body' => 'Returns are accepted within 7 days of delivery for store credit only. Garments must be in original condition with all technical tags and holographic authenticity stickers intact.'],
                    ] as $item)
                        <div class="group bg-surface">
                            <button class="flex w-full items-center justify-between px-4 py-8 text-left transition-colors hover:bg-surface-container-low" data-faq-toggle type="button">
                                <span class="font-headline text-xl font-bold uppercase tracking-tight">{{ $item['title'] }}</span>
                                <span class="material-symbols-outlined text-primary-container transition-transform group-hover:rotate-45">add</span>
                            </button>
                            <div class="hidden max-w-3xl px-4 pb-8 font-body text-on-surface-variant" data-faq-panel>
                                {{ $item['body'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>

        <footer class="w-full border-t border-[#484847]/20 bg-[#131313] px-8 py-12">
            <div class="mx-auto flex max-w-[1200px] flex-col items-center justify-between gap-8 md:flex-row">
                <div class="font-black tracking-tighter text-[#d5fb00]">THREADLAB</div>
                <div class="flex gap-8 font-['Inter'] text-[10px] font-medium tracking-[0.2em]">
                    <a class="text-white transition-colors hover:text-[#7799ff]" href="#">PRIVACY</a>
                    <a class="text-white transition-colors hover:text-[#7799ff]" href="#">TERMS</a>
                    <a class="text-white transition-colors hover:text-[#7799ff]" href="#">SHIPPING</a>
                    <a class="text-white transition-colors hover:text-[#7799ff]" href="#">RETURNS</a>
                </div>
                <div class="font-['Inter'] text-[10px] font-medium tracking-[0.2em] text-white/40">
                    © 2024 THREADLAB KINETIC EDITORIAL. ALL RIGHTS RESERVED.
                </div>
            </div>
        </footer>

        <script>
            document.querySelectorAll('[data-faq]').forEach((faqRoot) => {
                faqRoot.querySelectorAll('[data-faq-toggle]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const panel = button.parentElement.querySelector('[data-faq-panel]');
                        const icon = button.querySelector('.material-symbols-outlined');
                        const isOpen = !panel.classList.contains('hidden');

                        faqRoot.querySelectorAll('[data-faq-panel]').forEach((item) => item.classList.add('hidden'));
                        faqRoot.querySelectorAll('.material-symbols-outlined').forEach((item) => item.classList.remove('rotate-45'));

                        if (!isOpen) {
                            panel.classList.remove('hidden');
                            icon.classList.add('rotate-45');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
