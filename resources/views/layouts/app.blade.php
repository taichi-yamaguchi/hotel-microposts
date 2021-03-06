<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>HotelTrip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/microposts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('css/micropostshow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/followbtn.css') }}">
        <link rel="stylesheet" href="{{ asset('css/usershow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/searchform.css') }}">
         
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    <body>
    @include('commons.navbar')
    
    <div class="container">
        @yield('content')
    </div>

    
    　　<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
         @include('layouts.footer')
    </body>
   
</html>