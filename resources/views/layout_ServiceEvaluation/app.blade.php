<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{url('/')}}/">
    <title>نمذجة</title>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('assets/css/fontawsome.css')}}" >
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login2.css')}}">
</head>
<body>
    
@include('layout_ServiceEvaluation.header')

@yield('content')

@include('layout_ServiceEvaluation.footer')
