<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body class="">

    <header>
        @include('navbar.navmenu')
    </header>

    <main class="flex justify-center ">
        <div class="mt-10 mb-10 w-1200">
        @yield('container')

        </div>
    </main>

    <footer>
        @include('navbar.footer2')
    </footer>


</body>
</html>
