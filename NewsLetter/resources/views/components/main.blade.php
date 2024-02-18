


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
     <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NEWSLETTER') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="antialiased">
@extends('layouts.app')
@section('content')
    {{ $slot }}
@endsection

</body>

</html>