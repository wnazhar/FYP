<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cempedak Cheese</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffff33;
                color: #000;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: #000;

            }
        </style>
    </head>
    
    <body>
    <div style="background-image: url('/img/land4.png');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;"> 
        <div class="flex-center position-ref full-height">
        

            <div class="content">
                <div class="title m-b-md">
                    CEMPEDAK CHEESE
                    <div class="title m-b-md">
                    @if (Route::has('login'))
                    @auth
                        <a class="btn btn-primary" href="{{  route('users.index') }}">Home</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">WELCOME</a>

                        @if (Route::has('register'))
                            <a href="#"></a>
                        @endif
                    @endauth
                    </div>
                </div>
                     @endif
               
            </div>
            </div>
        </div>
    </body>
</html>
