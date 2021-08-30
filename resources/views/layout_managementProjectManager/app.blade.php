<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{url('/')}}/">
    <title>نمذجة</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/fontawsome.css" >
    <link rel="stylesheet" href="assets/js/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="assets/js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/login3.css" >

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <title>نمذجة</title>
</head>
<body>


@include('layout_managementProjectManager.header')

@yield('content')

@include('layout_managementProjectManager.footer')



<!-- <script src="assets/js/hover.js"></script> -->

</body>
</html>