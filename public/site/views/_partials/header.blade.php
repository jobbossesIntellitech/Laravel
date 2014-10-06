<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tennis Hub Sport</title>
        <link rel="stylesheet" href="{{ asset('site/assets/css/main.css') }}">
        @include('site::_partials.assets')
    </head>
    <body>

        <div class="header_container">
            <div class="header clearfix">
                <div class="header_left">
                    <a href="{{ URL::route('home') }}" title="GYMBASE">
                        <img src="{{ asset('site/assets/images/header_logo.png') }}" alt="logo" />
                        <span class="logo_left">GYM</span>
                        <span class="logo_right">BASE</span>
                    </a>
                </div>
                @include('site::_partials.navigation')
            </div>
        </div>