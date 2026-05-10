<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="asset/img/Logo_satuan.png">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Home</title>
</head>

<body class="h-full">

    <div class="min-h-full">
        <x-navbar></x-navbar>

        <header class="bg-white shadow"
            style="background-image: url('{{ url('asset/img/Frame-1.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; z-index: -1;"
            class="h-[500px] sm:h-[400px] md:h-[450px] lg:h-[500px] xl:h-[600px]">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{-- <h1 class="text-center text-3xl font-bold tracking-tight text-black">{{ $title }}</h1> --}}

            </div>
        </header>
        <style>
            @media (max-width: 639px) {
                header {
                    background-size: contain;
                    /* Menyesuaikan gambar agar lebih kecil dan terlihat utuh */
                    height: 200px;
                    /* Mengurangi tinggi header untuk mobile */
                }
            }

            /* Media Queries untuk layar tablet */
            @media (min-width: 640px) and (max-width: 1023px) {
                header {
                    background-size: cover;
                    /* Menjaga gambar tetap penuh */
                    height: 400px;
                    /* Sesuaikan tinggi untuk tablet */
                }
            }

            /* Media Queries untuk layar desktop */
            @media (min-width: 1024px) {
                header {
                    background-size: cover;
                    /* Menjaga gambar tetap penuh pada layar lebih besar */
                    height: 500px;
                    /* Mengatur tinggi untuk desktop */
                }
            }
        </style>

        <main>
            <div>
                <div class="grid bg-white overflow-hidden p-4 sm:p-8">
                    <!-- Header Section -->
                    <div class="grid pt-4 mt-10">
                        <p class="text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">
                            TENTANG KAMI
                        </p>
                    </div>

                    <!-- Gambar Header -->

                    <!-- Content Section -->
                    <div
                        class="mx-auto mt-8 mb-12 grid max-w-7xl grid-cols-1 gap-6 md:grid-cols-2 px-4 sm:px-6 lg:px-8">
                        <!-- Gambar -->

                        <!-- Text Content -->
                        <div class="flex flex-col justify-center">
                            <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">VENDREDI SAINT</p>
                            <p class="mt-4 text-base leading-7 text-gray-600">
                                Vendredi Saint adalah brand fashion yang hadir untuk memenuhi kebutuhan gaya 
                                berpakaian modern yang elegan dan penuh percaya diri. Kami menghadirkan koleksi 
                                pakaian berkualitas tinggi yang dirancang untuk mencerminkan kepribadian dan gaya 
                                hidup pelanggan kami. Dengan identitas brand yang kuat, Vendredi Saint berkomitmen 
                                untuk memberikan pengalaman berbelanja yang menyenangkan dan memuaskan bagi 
                                setiap pelanggannya.
                            </p>

                            <dl class="mt-6 space-y-6 text-gray-600">
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="absolute left-1 top-1 h-5 w-5 size-16">
                                            <path fill-rule="evenodd"
                                                d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 0 1 1.925-3.546 3.75 3.75 0 0 1 3.255 3.718Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Stay Stylish, Stay Confident
                                    </dt>
                                    {{-- <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt.</dd> --}}
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg class="absolute left-1 top-1 h-5 w-5 text-black" fill="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />

                                        </svg>
                                        Discover Your Perfect Look
                                    </dt>
                                    {{-- <dd class="inline">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus.</dd> --}}
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="absolute left-1 top-1 h-5 w-5 size-16 text-black">
                                            <path
                                                d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                        </svg>
                                        Upgrade Your Style with VDST
                                    </dt>
                                    {{-- <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</dd> --}}
                                </div>
                            </dl>
                        </div>
                        <div class="flex justify-center">
                            <img src="asset/img/image1.png" alt="Product screenshot"
                                class="w-full max-w-sm rounded-xl shadow-xl ring-1 ring-gray-400/10 object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <p class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-12">PRODUK</p>
                    <div>
                        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                            <h2 class="sr-only">Products</h2>
                            <div
                                class=" grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                @foreach ($products as $product)
                                    <a href="{{ $product->link_produk }}" class="group" target="_blank">
                                        @if ($product->gambar_produk)
                                            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                                                alt="{{ $product->nama_produk }}"
                                                class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
                                        @else
                                            <img src="https://via.placeholder.com/300x300" alt="Placeholder image"
                                                class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
                                        @endif
                                        <h3 class="mt-4 font-medium text-gray-700">
                                            <strong>{{ $product->nama_produk }}</strong>
                                        </h3>
                                        <div class="flex">
                                            <p class="mt-1 text-lg font-medium text-gray-900">
                                                Rp{{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                                            <p class="text-sm text-black gap-2 my-2 ml-auto flex"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="yellow"
                                                    viewBox="0 0 24 24" fill="currentColor" class="size-6">
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
                    <div class="flex justify-center">
                        <a href="/items"
                            class="bg-[rgba(58,70,94,1)] text-white p-4 rounded-md bottom-0 font-bold hover:text-white hover:bg-[rgba(58,70,94,1)] hover:opacity-90">
                            LIHAT SEMUA PRODUK &rArr;
                        </a>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <p class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-8 mb-5">
                            Galeri
                            Industri</p>
                        <div
                            class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach ($galleries as $gallery)
                                @if ($gallery->is_featured)
                                    <div class="group">
                                        @if ($gallery->media_type == 'image')
                                            <img src="{{ asset('storage/' . $gallery->media_path) }}"
                                                alt="{{ $gallery->title }}"
                                                class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75">
                                        @else
                                            <video width="100%" controls>
                                                <source src="{{ asset('storage/' . $gallery->media_path) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                        <h3 class="mt-4 font-medium text-gray-700">{{ $gallery->title }}</h3>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex justify-center mt-5">
                            <a href="/industry"
                                class="bg-[rgba(58,70,94,1)] text-white p-4 rounded-md bottom-0 font-bold hover:text-white hover:bg-[rgba(58,70,94,1)] hover:opacity-90">
                                LIHAT INDUSTRI KAMI &rArr;
                            </a>
                        </div>
                    </div>
                </div>
        </main>
        <main class="flex-grow">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.6799998686934!2d112.61533295941942!3d-7.962247734368072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788281bdd08839%3A0xc915f268bffa831f!2sUniversitas%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1732594814067!5m2!1sid!2sid"
        class="w-screen h-[250px]"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>
</main>
        <x-footer></x-footer>
</body>

</html>
