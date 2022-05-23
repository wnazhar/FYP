@extends('admins.homepage')

@section('content')
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style>
 @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        } @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }
img {
  border-radius: 8px;
}
</style>

<body> 
<div class="flex justify-center items-center">
<div class="w3-row-padding w3-center w3-margin-top">

  <div class="w3-third" style="width:500px;height:500px;">
    <div class="w3-card w3-container">
      <h2 class="font-semibold text-2xl mb-2">CUSTOMER LIST</h2><br>
      <a href="{{route('admins.custlist')}}"><img src="/img/cust2.png"   style="width:500px;height:400px;"></a><br><br>
    </div>
  </div>

  <div class="w3-third" style="width:500px;height:500px;">
    <div class="w3-card w3-container">
      <h2 class="font-semibold text-2xl mb-2">ADS LIST</h2><br>
      <a href="{{route('admins.adslist')}}" ><img src="/img/list2.jpg" style="width:500px;height:400px;"></a><br><br>
    </div>
  </div>
  

</body>
</html>
@endsection


