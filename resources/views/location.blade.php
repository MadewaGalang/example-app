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

<body class="h-full flex flex-col ">
    <div class="min-h-screen flex flex-col">
        <x-navbar></x-navbar>

    <main class="flex-grow">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.6799998686934!2d112.61533295941942!3d-7.962247734368072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788281bdd08839%3A0xc915f268bffa831f!2sUniversitas%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1732594814067!5m2!1sid!2sid"
        class="w-screen h-full"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>
</main>
        <x-footer></x-footer>
    </div>
</body>

</html>
