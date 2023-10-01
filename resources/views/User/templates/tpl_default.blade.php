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
    @include('User.includes.header')

    <section id="content">

        @yield('content')
    </section>

    @include('User.includes.footer')

    @yield('js')
</body>

</html>