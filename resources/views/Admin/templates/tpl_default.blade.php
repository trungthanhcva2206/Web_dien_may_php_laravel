<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @yield('css')
</head>

<body id="{{$pageId}}">
    @include('Admin.includes.sidebar')

    <section id="content">

        @include('Admin.includes.navbar')

        @yield('content')
    </section>

    @yield('js')

</body>

</html>