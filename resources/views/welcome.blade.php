<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WeBook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            body:before{
              background-image: url("../images/welcome.jpg");

              filter: blur(8px);
              -webkit-filter: blur(8px);
              opacity: 0.8;

              position: absolute;
              height: 100vh;
              width: 100%;
              content: "";
            }
            html, body {
                color: black;
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
                font-size: 95px;
            }

            .subtittle{
              color: black;
              padding: 0 25px;
              font-size: 18px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-transform: uppercase;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Welcome to Webook
                </div>

                <p class="subtittle">Make your own book of memories</p>

                <div class="links">
                    <a href="{{ route('register') }}">Join us now!</a>
                </div>

            </div>
        </div>
    </body>
</html>
