<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>VOLT_ADMIN | {{ $pageTitle }}</title>
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
    </head>
    <body class="bg-background text-on-surface">
        <header class="fixed top-0 z-50 flex h-16 w-full items-center justify-between border-b border-[#484847]/20 bg-[#0e0e0e]/80 px-6 font-['Plus_Jakarta_Sans'] tracking-tight backdrop-blur-xl">
            <a class="text-2xl font-black uppercase italic text-[#d5fb00]" href="{{ route('admin.dashboard') }}">VOLT_ADMIN</a>
            <a class="text-sm font-bold uppercase tracking-[0.2em] text-white transition-colors hover:text-[#d5fb00]" href="{{ route('admin.products.index') }}">Back to Inventory</a>
        </header>

        <main class="px-6 pb-12 pt-24">
            <div class="mx-auto max-w-[960px]">
                @if ($errors->any())
                    <div class="mb-8 border border-error/20 bg-error/10 px-5 py-4 text-sm font-bold uppercase tracking-[0.2em] text-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <section class="mb-10">
                    <h1 class="font-headline text-6xl font-extrabold uppercase tracking-tighter italic md:text-7xl">
                        {{ $formTitle }} <span class="text-primary-container">PRODUCT</span>
                    </h1>
                    <p class="mt-4 max-w-2xl text-lg text-on-surface-variant">
                        Upload a new product or refine an existing one without cluttering the dashboard.
                    </p>
                </section>

                <section class="rounded-lg bg-surface-container-low p-8">
                    <form action="{{ $formAction }}" class="grid grid-cols-1 gap-6 md:grid-cols-2" data-admin-product-form enctype="multipart/form-data" method="POST">
                        @csrf

                        <label class="block">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Title</span>
                            <input class="w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white focus:border-primary-container focus:outline-none focus:ring-0" name="title" required type="text" value="{{ old('title', $product['name']) }}">
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Price (PHP)</span>
                            <input class="w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white focus:border-primary-container focus:outline-none focus:ring-0" min="1" name="price" required step="1" type="number" value="{{ old('price', $product['price_value']) }}">
                        </label>

                        <label class="block md:col-span-2">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Description</span>
                            <textarea class="min-h-[140px] w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white focus:border-primary-container focus:outline-none focus:ring-0" name="description" required>{{ old('description', $product['description'][0] ?? '') }}</textarea>
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Category</span>
                            <select class="w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white focus:border-primary-container focus:outline-none focus:ring-0" name="category" required>
                                <option @selected(old('category', $product['shop_category']) === 'basic') value="basic">Basic</option>
                                <option @selected(old('category', $product['shop_category']) === 'oversized') value="oversized">Oversized</option>
                                <option @selected(old('category', $product['shop_category']) === 'minimal') value="minimal">Minimal</option>
                            </select>
                        </label>

                        <div class="block">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Sizes</span>
                            <div class="grid grid-cols-4 gap-3">
                                @foreach (['S', 'M', 'L', 'XL'] as $size)
                                    <label class="flex items-center justify-center border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm font-bold uppercase tracking-widest text-white">
                                        <input {{ in_array($size, old('sizes', $product['sizes']), true) ? 'checked' : '' }} class="mr-2 h-4 w-4 accent-[#d5fb00]" name="sizes[]" type="checkbox" value="{{ $size }}">
                                        {{ $size }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <label class="block">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Featured Image</span>
                            <input accept="image/*" class="w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white file:mr-4 file:border-0 file:bg-primary-container file:px-4 file:py-2 file:text-xs file:font-black file:uppercase file:tracking-[0.2em] file:text-on-primary-container focus:border-primary-container focus:outline-none focus:ring-0" name="featured_image" {{ $isEditing ? '' : 'required' }} type="file">
                            @if ($product['image'])
                                <img alt="{{ $product['name'] }}" class="mt-4 h-28 w-28 object-cover" src="{{ $product['image'] }}">
                            @endif
                        </label>

                        <div class="block md:col-span-2">
                            <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Gallery Images (up to 4)</span>
                            <p class="mb-4 text-xs uppercase tracking-[0.2em] text-on-surface-variant/70">Upload up to four gallery images using the slots below.</p>
                            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                @for ($slot = 0; $slot < 4; $slot++)
                                    <label class="block">
                                        <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Image {{ $slot + 1 }}</span>
                                        <input accept="image/*" class="w-full border border-outline-variant/20 bg-surface-container-highest px-4 py-4 text-sm text-white file:mr-4 file:border-0 file:bg-surface-container-high file:px-4 file:py-2 file:text-xs file:font-black file:uppercase file:tracking-[0.2em] file:text-white focus:border-primary-container focus:outline-none focus:ring-0" name="gallery_images[]" type="file">
                                    </label>
                                @endfor
                            </div>
                            @if (! empty($product['gallery']))
                                <div class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-4">
                                    @foreach (array_slice($product['gallery'], 0, 4) as $galleryImage)
                                        <div class="group relative" data-existing-gallery-item data-image="{{ $galleryImage }}">
                                            <img alt="Gallery preview" class="aspect-square w-full object-cover transition duration-150" src="{{ $galleryImage }}">
                                            <button class="absolute right-2 top-2 flex h-8 w-8 items-center justify-center rounded-full bg-black/75 text-sm font-black text-white transition hover:bg-error hover:text-black" data-remove-gallery-button type="button">
                                                x
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-2 flex flex-wrap gap-4">
                            <button class="bg-primary-container px-8 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-on-primary-container transition-transform active:scale-95" type="submit">
                                {{ $submitLabel }}
                            </button>
                            <a class="border border-outline-variant/20 px-8 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-white transition-colors hover:border-primary-container hover:text-primary-container" href="{{ route('admin.products.index') }}">
                                Cancel
                            </a>
                        </div>
                    </form>
                </section>
            </div>
        </main>
        <script>
            (() => {
                const form = document.querySelector('[data-admin-product-form]');

                if (!form) {
                    return;
                }

                form.querySelectorAll('[data-remove-gallery-button]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const item = button.closest('[data-existing-gallery-item]');

                        if (!item) {
                            return;
                        }

                        const image = item.dataset.image;

                        if (image) {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'remove_gallery[]';
                            input.value = image;
                            form.appendChild(input);
                        }

                        item.style.transition = 'opacity 140ms ease, transform 140ms ease';
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.92)';

                        window.setTimeout(() => item.remove(), 140);
                    });
                });
            })();
        </script>
    </body>
</html>
