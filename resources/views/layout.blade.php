<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0"
    >
    <meta name="author" content="Reace Ian Roeloffze">
    <meta name="description" content="Workopia is a Laravel-built job-listing and management web application    ">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{$title ?? 'Workopia | Find and List Jobs'}}
    </title>
    {{-- Enable font-awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"/>
    {{-- Enable Tailwind CSS --}}
    @vite(
        [
            'resources/css/app.css',
            'resources/js/app.js'
        ]
    )
</head>
<body class="bg-gray-100">
<x-header/>
<main class="container mx-auto p-4 mt-4">
    {{$slot}}
</main>
</body>
</html>
