<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="asset/img/logo.png">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" type="x-icon" href="asset/img/Logo_satuan.png">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Items</title>
</head>

<body class="h-full">

    <div class="min-h-full">
        <x-navbar></x-navbar>

        <main>
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-4 sm:px-12 sm:py-24 lg:max-w-7xl lg:px-8">
                    <div class="grid pt-4">
                        <p class="text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">
                            PRODUK KAMI
                        </p>
                    </div>

                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Semua Produk</h2>

                    <!-- Form Pencarian -->
                    <form action="{{ url('/items') }}" method="GET" class="ml-auto w-64 grid mb-4">
                        <input type="text" name="search" placeholder="Search clothes..."
                            class="border p-2 rounded w-full" value="{{ request('search') }}">
                        <button type="submit"
                            class="mt-2 p-2 bg-[rgba(128,113,79,1)] text-white rounded w-full hover:bg-[rgba(108,93,59,1)]">
                            Cari
                        </button>
                    </form>

                    <div
                        class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($products as $product)
                            <a href="{{ $product->link_produk ?? '#' }}" class="group" target="_blank">
                                <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                                    alt="{{ $product->nama_produk }}"
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
                                <h3 class="mt-4 font-medium text-sm text-gray-700">{{ $product->nama_produk }}</h3>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                                <div class="flex">
                                    <p class="mt-1 text-lg font-medium text-gray-900">
                                        Rp{{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                                    <p class="text-sm text-black gap-2 my-2 ml-auto flex"> <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                clip-rule="evenodd" />
                                        </svg>{{ $product->rating }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>

        <x-footer></x-footer>
    </div>
</body>

</html>
