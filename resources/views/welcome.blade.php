<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eXNITC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <style>
                @import url('https://fonts.googleapis.com/css?family=Bree+Serif');
            </style>
    </head>
    <body class="backk">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth('web')
                        <a class="i2" href="{{ url('/home') }}">Home</a>
                    @endauth
                    @auth('admin')   
                        <a class="i2" href="{{ url('/admin') }}">Home</a>
                    @endauth
                    @guest
                        
                        <a class="i2" href="{{ route('login') }}">Login</a>
                        <a class="i2" href="{{ route('register') }}">Register</a>
                        <a class="i2" href="{{ route('admin') }}">Admin</a>
                    @endguest    
                    
                </div>
            @endif

            <div class="content animated wobble">
                <div class="title m-b-md">
                     <img style="width:300px;" src="{{asset('img/exnitc.png')}}">
                </div>
            </div>
        </div>
    </body>
</html>
