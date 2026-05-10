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
    <title>{{ $title }}</title>
</head>

<body class="h-full">

    <div class="min-h-full">
        <x-navbar></x-navbar>

        <main>
            <x-about-us></x-about-us>

        </main>

        <x-footer></x-footer>
    </div>
</body>

</html>
