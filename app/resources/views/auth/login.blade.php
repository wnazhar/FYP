@extends('layouts.app')

@section('content')
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="flex flex-col items-center justify-center h-screen select-none" style="background-image: url('/img/land4.png');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;"> 
    <div class="flex flex-col -mt-32 bg-white px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-xl shadow-2xl w-full max-w-md  border-l-4 border-yellow-400">
        <div class="font-medium self-center text-xl sm:text-2xl uppercase w-60 text-center bg-yellow-400 shadow-2xl p-6 rounded-full text-white">Sign In</div>
        <div class="mt-10">
            <form method="POST" action="{{ route('login') }}" autocomplete="">    
            @csrf            
                <div class="relative w-full mb-3">
                    <input type="email" name="email" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="transition: all 0.15s ease 0s;" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="relative w-full mb-3">
                    <input type="password" name="password" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="transition: all 0.15s ease 0s;" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="text-center mt-6">
                    <input type="submit" name="signin" id="signin" value="Sign In" class="p-3 rounded-lg bg-yellow-400 outline-none text-white shadow w-32 justify-center focus:bg-yellow-700 hover:bg-yellow-500">
                </div>  
                <div class="flex flex-wrap mt-6">
                    <div class="w-1/2 text-left">
                        <a href="#" class="text-blue-900 text-xl"><small>Forgot password?</small></a>
                    </div>
                    <div class="w-1/2 text-right">
                        <a href="{{ route('register') }}" class="text-blue-900 text-xl"><small>Register</small></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
