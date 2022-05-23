@extends('users.homepage')

@section('content')
<head>
    
<style> 
@import url('https://fonts.googleapis.com/css?family=Roboto:300');
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
    .font span{
    font-size: 80px; 
    font-family: 'Roboto', sans-serif;
}
</style>

</head>
<body>
<div class="text-center">
                <h1 class="font">
                    <span >{{ $user['custUserName']}} </span>
                    <span class="text-yellow tracking-wide">Profile</span>
                </h1> 
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update') }}">
                        @csrf

                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                        @endif

                        <hr class="colorgraph">
                        <div class="row">
                            <label for="custFullName" class="col-sm-3 col-md-2 col-5">{{ __('Full Name') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="custFullName" value="{{ $user['custFullName']}}" type="text" class="form-control @error('custFullName') is-invalid @enderror" name="custFullName" autofocus>

                                @error('custFullName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custUserName" class="col-sm-3 col-md-2 col-5">{{ __('User Name') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="custUserName" value="{{ $user['custUserName']}}" type="text" class="form-control @error('custUserName') is-invalid @enderror" name="custUserName" readonly>

                                @error('custUserName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custPhoneNo" class="col-sm-3 col-md-2 col-5">{{ __('Phone Number') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="custPhoneNo" value="{{ $user['custPhoneNo']}}" type="text" class="form-control @error('custPhoneNo') is-invalid @enderror" name="custPhoneNo">
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custAddress" class="col-sm-3 col-md-2 col-5">{{ __('Address') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="custAddress" value="{{ $user['custAddress']}}" type="text" class="form-control @error('custAddress') is-invalid @enderror" name="custAddress">
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="email" class="col-sm-3 col-md-2 col-5">{{ __('E-Mail') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="email" value="{{ $user['email']}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr />

                        <div class="row">
			                            	<div class="col-md-9"></div>
			                                <div class="col-md-3"><button type="submit"  class="btn btn-success btn-block btn-lg">Update</button></div>
			                            </div>
                                        <hr class="colorgraph">

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
