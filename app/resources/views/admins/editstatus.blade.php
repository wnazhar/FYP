@extends('admins.homepage')

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
<style>
    div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
 
}

div.gallery img {
  width: 100%;
  height: auto;
}
</style>


</head>
<body>
<div class="text-center">
                <h1 class="font">
                    <span >Update</span>
                    <span class="text-yellow tracking-wide">Status</span>
                </h1> 
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('admins.updatestatus', $ads->adsId) }}" enctype="multipart/form-data">
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
                                <input id="date" value="{{ $ads->date}}" type="text" class="form-control"  name="date" readonly>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <label for="timeslot" class="col-sm-3 col-md-2 col-5">{{ __('Timeslot') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="timeslot" value="{{ $ads->timeslot}}" type="text" class="form-control"  name="timeslot" readonly>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custFullName" class="col-sm-3 col-md-2 col-5">{{ __('Ads Title') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="adsTitle" value="{{ $ads->adsTitle}}" type="text" class="form-control"  name="adsTitle" readonly>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="custUserName" class="col-sm-3 col-md-2 col-5">{{ __('Company') }}</label>

                            <div class="col-md-8 col-6">
                                <input id="adsCompany" value="{{ $ads->adsCompany}}" type="text" class="form-control"  name="adsCompany" readonly>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="adsCaption" class="col-sm-3 col-md-2 col-5">{{ __('Ads Caption') }}</label>

                            <div class="col-md-8 col-6">
                                <textarea id="adsCaption"  type="text" class="form-control" name="adsCaption" readonly >{{ $ads->adsCaption}} "</textarea>
                            
                                @error('adsCaption')
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
                                <select name="adsStatus" id="status">
                                        <option >{{ $ads->adsStatus}}</option>
                                        <option value="approved">Approved</option>
                                        <option value="published">Published</option>
                                </select>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="receipt" class="col-sm-3 col-md-2 col-5">{{ __('    Receipt') }}</label>

                            <div class="col-md-8 col-6">
                            @if ($ads->receipt== 'pending' )
                                <input id="receipt" value="{{ $ads->receipt}}" type="text" class="form-control"  name="receipt" readonly>
                            @else
                                <!--<input id="receipt" value="Uploaded" type="text" class="form-control"  name="receipt" readonly>-->
                                <img src="{{asset('/files/'.$ads->receipt)}}" style="width:200px;height:200px;"  class="img-responsive"/>
                            @endif
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <label for="media" class="col-sm-3 col-md-2 col-5">{{ __('Media') }}</label>

                            <div class="col-md-10 col-6">

                                            <?php 
                                                $images=$media->media;
                                                $img=explode(",",$images);   
                                            ?>

                                            @foreach($img as $i)
                                            <div class="responsive">
                                                <div class="gallery">
                                                    <?php $i=str_replace('"', '', $i) ?>
                                                    <?php $i=str_replace('[', '', $i) ?>
                                                    <?php $i=str_replace(']', '', $i) ?>
                                                    <img src="{{asset('/files/'.$i)}}" style="width:200px;height:200px;"  class="img-responsive"/>
                                                    </div>
                                            </div>
                                             @endforeach
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
