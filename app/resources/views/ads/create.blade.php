@extends('users.homepage')

@section('content')
<?php
  if(isset($_GET['ts'])){
    $ts = $_GET['ts'];
  }
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
</head>
<style>
#datep {
    display: none;
    width:100%;
    height:330px;
}

.ui-datepicker-calendar tbody td > a.hover-calendar-cell {
    border: 5px solid #074e91;
    background: #5bacf7 50% 50% repeat-x;
    font-weight: normal;
    color: #1a1a1a;
   
}
}
#addon{background-color:#999; width:100%}
</style>
<div class="text-center font-semibold">
                <h1 class="text-5xl">
                    <span>Book for Date: </span>
                    <span class="text-blue tracking-wide"><?php echo ts(($ts)); ?></span>
                </h1> 
    </div>

<body class="max-w-3xl mx-auto bg-black" style="font-family:'Lato',sans-serif;">
    <div class="text-center my-10">
    </div>
            <form method="POST" action="#" enctype="multipart/form-data" > 
            @csrf
            @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
            @endif

                <div class="mt-3">
                    <label for="">Time Slot</label>
                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                </div>

                <div class="mt-3">
                    <input id="adsTitle" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " name="adsTitle" required autocomplete="adsTitle" placeholder="Ads Title">
                </div>
                @error('adsTitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror

                <div class="mt-3">
                    <input id="adsCompany" type="text" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " name="adsCompany" required autocomplete="adsCompany" placeholder="Company Name">
                </div>
                @error('adsCompany')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror

                <div class="mt-3">
                    <textarea id="adsCaption" type="" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " name="adsCaption" required autocomplete="adsCaption" placeholder="Ads Caption"></textarea>       
                </div>
                @error('adsCaption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                     
                 <div class="mt-3">
                    <input  id="dropzone" type="file" class="dropzone" multiple required>
                </div>

                <div class="mt-5">
                    <input type="submit" value="SUBMIT" class="py-3 bg-yellow-400 text-white w-full rounded hover:bg-yellow-600">
                </div>
            </form> 
        </div>
    
</body>
</html>
<style>
.popover {
    left: 30% !important;
}
.btn {
    margin: 1%;
}
</style>
<script>
$(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script>

<!--<script>
var $datePicker = $("div#datepicker");

$datePicker.datepicker({
    changeMonth: true,
    changeYear: true,
    inline: true,
    altField: "#datep",
 }).change(function(e){
    setTimeout(function(){   
       $datePicker
         .find('.ui-datepicker-current-day').parent().after('<tr class="text-center"><td colspan="8"><div><button>8:00 am – 9:00 am</button></div><button>9:00 am – 10:00 am</button></div><button>10:00 am – 11:00 am</button></div></td></tr>')
          
    });
});
</script>-->
@endsection