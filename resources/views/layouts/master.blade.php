<!doctype html>
<html>

<head>
    <title>@yield('title', env('APP_NAME'))</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>

</head>

<div>


    @include('layouts.includes.navigation')


    <div class="container mx-auto">
        @yield('breadcrumb')
        @yield('content')
    </div>


    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</div>
</body>

</html>
