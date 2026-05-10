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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Industry</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <main>
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-4 sm:px-12 sm:py-24 lg:max-w-7xl lg:px-8">

                    <div class="p-3 bg-white">

                        <h1 class="text-2xl font-extrabold text-gray-800 mb-6">
                            Galeri Industri
                        </h1>

                        {{-- Menampilkan galeri industri --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                            @foreach ($galleries as $gallery)

                                <div class="bg-white shadow rounded-lg overflow-hidden"
                                    x-data="{ open: false }">

                                    {{-- Cek apakah media adalah gambar atau video --}}
                                    @if ($gallery->media_type == 'image')

                                        <img src="{{ asset('storage/' . $gallery->media_path) }}"
                                            alt="{{ $gallery->title }}"
                                            class="w-full h-56 object-cover cursor-pointer"
                                            @click="open = true">

                                    @elseif ($gallery->media_type == 'video')

                                        <video controls
                                            class="w-full h-56 object-cover cursor-pointer"
                                            @click="open = true">

                                            <source src="{{ asset('storage/' . $gallery->media_path) }}"
                                                type="video/mp4">

                                            Your browser does not support the video tag.

                                        </video>

                                    @endif

                                    <div class="p-4">
                                        <h3 class="text-lg font-bold text-gray-800">
                                            {{ $gallery->title }}
                                        </h3>
                                    </div>

                                    {{-- Modal untuk zoom --}}
                                    <div x-cloak
                                        x-show="open"
                                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                        @click.outside="open = false"
                                        x-transition>

                                        <div class="bg-white p-4 rounded-lg max-w-4xl w-full">

                                            {{-- Jika media adalah gambar --}}
                                            @if ($gallery->media_type == 'image')

                                                <img src="{{ asset('storage/' . $gallery->media_path) }}"
                                                    alt="{{ $gallery->title }}"
                                                    class="w-full max-h-96 object-contain">

                                            @elseif ($gallery->media_type == 'video')

                                                <video controls
                                                    class="w-full max-h-96 object-contain">

                                                    <source src="{{ asset('storage/' . $gallery->media_path) }}"
                                                        type="video/mp4">

                                                    Your browser does not support the video tag.

                                                </video>

                                            @endif

                                            <div class="mt-4 text-center">

                                                <button @click="open = false"
                                                    class="px-6 py-2 bg-red-500 text-white rounded-full">

                                                    Close

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </main>

        <x-footer></x-footer>

    </div>
</body>

</html>