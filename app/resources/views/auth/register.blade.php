@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="https://tailwindcomponents.com/component/sign-up-form-with-at-sonalarya/landing" />
    <meta name="twitter:image" content="https://tailwindcomponents.com/storage/3222/conversions/temp43713-ogimage.jpg?v=2021-05-19 22:19:50" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css">
</head>
<body class="bg-white">
    <!-- url('/img/hero-pattern.svg') -->
    <div class="flex min-h-screen">

        <div class="w-1/2 bg-cover md:block hidden" style="background-image:  url(https://images.unsplash.com/photo-1520243947988-b7b79f7873e9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDd8fGJsYWNrJTIwZm9yZXN0fGVufDB8fDB8eWVsbG93&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60)"></div>
        <!-- <div class="bg-no-repeat bg-right bg-cover max-w-max max-h-8 h-12 overflow-hidden">
            <img src="log_in.webp" alt="hey">
        </div> -->

        <div class="md:w-1/2 max-w-lg mx-auto my-24 px-4 py-5 shadow-none">

            <div class="text-left p-0 font-sans">
                
                <h1 class=" text-gray-800 text-3xl font-medium">Create an account for free</h1>
                <h3 class="p-1 text-gray-700">Free forever. No payment needed.</h3>
            </div>
            <form method="POST" action="{{ route('register') }}">
            @csrf

                <div class="mt-3">
                    <input  id="custFullName" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('custFullName') is-invalid @enderror" name="custFullName" value="{{ old('custFullName') }}" required autocomplete="custFullName" placeholder="Full Name">
                    @error('custFullName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="custUserName" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('custUserName') is-invalid @enderror" name="custUserName" value="{{ old('custUserName') }}" required autocomplete="custUserName" placeholder="User Name">
                    @error('custUserName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="custPhoneNo" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('custPhoneNo') is-invalid @enderror" name="custPhoneNo" value="{{ old('custPhoneNo') }}" required autocomplete="custPhoneNo" placeholder="Phone Number">
                    @error('custPhoneNo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="custAddress" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('custAddress') is-invalid @enderror" name="custAddress" value="{{ old('custAddress') }}" required autocomplete="custAddress" placeholder="Address">
                    @error('custAddress')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="email" type="email" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="password" type="password" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="mt-3">
                    <input  id="password-confirm" type="password" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="mt-5">
                    <input type="submit" value="Sign up with email" class="py-3 bg-yellow-400 text-white w-full rounded hover:bg-yellow-600">
                </div>
            </form>
            <a class="" href="{{ route('login') }}" data-test="Link"><span class="block  p-3 text-center text-gray-800  text-xl ">Already have an account?Login Here</span></a>
        </div>


    </div>
</body>

@endsection