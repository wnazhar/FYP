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
                    <span >Upload</span>
                    <span class="text-yellow tracking-wide">Receipt</span>
                </h1> 
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('ads.updatereceipt', $ads->adsId) }}" enctype="multipart/form-data">
                        @csrf

                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                        @endif

                        <hr class="colorgraph">
                        <div class="row">
                            <label for="date" class="col-sm-3 col-md-2 col-5">{{ __('Date') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="date" value="{{ $ads->date}}" type="text" class="form-control @error('date') is-invalid @enderror" name="date" readonly>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <label for="timeslot" class="col-sm-3 col-md-2 col-5">{{ __('Timeslot') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="timeslot" value="{{ $ads->timeslot}}" type="text" class="form-control @error('timeslot') is-invalid @enderror" name="timeslot" readonly>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custFullName" class="col-sm-3 col-md-2 col-5">{{ __('Ads Title') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="adsTitle" value="{{ $ads->adsTitle}}" type="text" class="form-control @error('adsTitle') is-invalid @enderror" name="adsTitle" readonly>

                                @error('adsTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="adsStatus" class="col-sm-3 col-md-2 col-5">{{ __('Ads Status') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="adsStatus" value="{{ $ads->adsStatus}}"  class="form-control @error('adsStatus') is-invalid @enderror" type="text" name="adsStatus" readonly>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="adsStatus" class="col-sm-3 col-md-2 col-5">{{ __('Receipt') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="receipt"  class="form-control @error('receipt') is-invalid @enderror" type="file" name="receipt" autofocus>
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
