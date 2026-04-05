<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>VOLT_ADMIN | Inventory</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,700;0,800;1,800&amp;family=Inter:wght@400;700;900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "background": "#0e0e0e",
                            "surface": "#0e0e0e",
                            "surface-container-low": "#131313",
                            "surface-container-high": "#201f1f",
                            "surface-container-highest": "#262626",
                            "primary-container": "#d5fb00",
                            "on-primary-container": "#4e5d00",
                            "secondary": "#7799ff",
                            "on-surface": "#ffffff",
                            "on-surface-variant": "#adaaaa",
                            "outline-variant": "#484847",
                            "error": "#ff7351",
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

            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-background text-on-surface">
        <header class="fixed top-0 z-50 flex h-16 w-full items-center justify-between border-b border-[#484847]/20 bg-[#0e0e0e]/80 px-6 font-['Plus_Jakarta_Sans'] tracking-tight backdrop-blur-xl">
            <a class="text-2xl font-black uppercase italic text-[#d5fb00]" href="{{ route('admin.dashboard') }}">VOLT_ADMIN</a>
            <div class="hidden gap-8 md:flex">
                <a class="text-white/70 transition-colors duration-300 hover:text-[#d5fb00]" href="{{ route('admin.dashboard') }}">SYSTEM_STATUS</a>
                <span class="font-bold text-[#d5fb00]">INVENTORY</span>
            </div>
        </header>

        <aside class="fixed left-0 top-0 z-[60] hidden h-full w-64 flex-col bg-[#131313] pb-8 pt-20 shadow-[0px_24px_48px_rgba(0,0,0,0.4)] lg:flex">
            <div class="mb-10 px-6">
                <div class="flex items-center gap-3">
                    <div class="h-8 w-2 bg-primary-container"></div>
                    <div>
                        <div class="font-['Inter'] text-[12px] font-black uppercase tracking-widest text-[#d5fb00]">KINETIC_CORE</div>
                        <div class="text-[10px] font-bold text-white/30">V2.0.48_STABLE</div>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="mb-2 flex items-center gap-4 px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-white/40 transition-all hover:bg-[#201f1f] hover:text-white" href="{{ route('admin.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
                <a class="mb-2 flex items-center gap-4 border-l-4 border-[#d5fb00] bg-[#201f1f] px-6 py-4 font-['Inter'] text-[10px] font-bold uppercase tracking-widest text-[#d5fb00]" href="{{ route('admin.products.index') }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    Inventory
                </a>
            </nav>
        </aside>

        <main class="px-6 pb-12 pt-24 lg:ml-64">
            <div class="mx-auto max-w-[1200px]">
                @if (session('admin_product_success'))
                    <div class="mb-8 border border-primary-container/20 bg-primary-container/10 px-5 py-4 text-sm font-bold uppercase tracking-[0.2em] text-primary-container">
                        {{ session('admin_product_success') }}
                    </div>
                @endif

                <section class="mb-10 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                    <div>
                        <h1 class="font-headline text-6xl font-extrabold uppercase tracking-tighter italic md:text-7xl">
                            PRODUCT <span class="text-primary-container">INVENTORY</span>
                        </h1>
                        <p class="mt-4 max-w-2xl text-lg text-on-surface-variant">
                            Manage the full live catalog from one place. Add new products, update existing ones, or remove items from the storefront.
                        </p>
                    </div>
                    <a class="inline-flex items-center justify-center bg-primary-container px-8 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-on-primary-container transition-transform active:scale-95" href="{{ route('admin.products.create') }}">
                        Add Product
                    </a>
                </section>

                <section class="overflow-hidden rounded-lg bg-surface-container-low">
                    <div class="grid grid-cols-[1.4fr_0.8fr_0.7fr_0.7fr_0.9fr] gap-4 border-b border-outline-variant/20 px-6 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant">
                        <div>Product</div>
                        <div>Category</div>
                        <div>Price</div>
                        <div>Sizes</div>
                        <div class="text-right">Actions</div>
                    </div>

                    @forelse ($products as $product)
                        <div class="grid grid-cols-[1.4fr_0.8fr_0.7fr_0.7fr_0.9fr] gap-4 border-b border-outline-variant/10 px-6 py-5 transition-colors hover:bg-surface-container-high">
                            <div class="flex items-center gap-4">
                                <img alt="{{ $product['name'] }}" class="h-20 w-20 object-cover" src="{{ $product['image'] }}">
                                <div>
                                    <div class="font-headline text-xl font-black uppercase italic">{{ $product['name'] }}</div>
                                    <div class="mt-1 text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">{{ $product['sku'] }}</div>
                                </div>
                            </div>
                            <div class="self-center text-sm font-bold uppercase text-white">{{ ucfirst($product['shop_category']) }}</div>
                            <div class="self-center text-sm font-bold text-primary-container">{{ $product['price'] }}</div>
                            <div class="self-center text-sm font-bold uppercase text-white">{{ implode(', ', $product['sizes']) }}</div>
                            <div class="flex items-center justify-end gap-3">
                                <a class="border border-outline-variant/20 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-white transition-colors hover:border-primary-container hover:text-primary-container" href="{{ route('admin.products.edit', $product['slug']) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.delete', $product['slug']) }}" method="POST" onsubmit="return confirm('Remove this product from the storefront?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border border-error/20 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-error transition-colors hover:bg-error hover:text-black" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-16 text-center">
                            <div class="font-headline text-3xl font-black uppercase italic">No products yet</div>
                            <p class="mt-3 text-sm uppercase tracking-[0.2em] text-on-surface-variant">Start by uploading your first catalog item.</p>
                        </div>
                    @endforelse
                </section>
            </div>
        </main>
    </body>
</html>
