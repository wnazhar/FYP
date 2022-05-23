@extends('users.homepage')

@section('content')
<?php

if(isset($_GET['date'])){
  $date = $_GET['date'];
}


/*if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $timeslot = $_POST['timeslot'];
  $stmt = $mysqli->prepare("select * from bookings where date = ?");
  $stmt->bind_param('s', $date);
  if($stmt->execute()){
      $result = $stmt->get_result();
      if($result->num_rows>0){
          $msg = "<div class='alert alert-danger'>Already Booked</div>";
      }else{
          $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, email, date) VALUES (?,?,?,?)");
          $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
          $stmt->execute();
          $msg = "<div class='alert alert-success'>Booking Successfull</div>";
          $stmt->close();
          $mysqli->close();
      }
  }
}*/
$duration = 120;
$cleanup = 60;
$start = "08:00";
$end = "22:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}
function getbookings($date){

  $result = DB::table('ads')
      ->where('date', '=', $date)
      ->get();
  $bookings = array();
  foreach($result as $r){
     
      $bookings[]=$r->timeslot;
      
  } 
  return $bookings;
}



?>
<!doctype html>

<html lang="en">

<head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300');
  
  .font span{
  font-size: 60px; 
  font-family: 'Roboto', sans-serif;
}
.button {
  border: none;
  color: white;
  padding: 30px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #1e6df8;
}
.button2 {
  background-color: #ff3333; 
  color: white; 
}


.button1:hover {
  background-color: #1e6df8;
  color: white;
}
</style>
<style>
  div.rounded {
    width: 100%;
    border-style: solid;
    border-width: 1px;
    border-radius: 5px;
}
label {
    display: block;
}
input {
    display: block;
}
#previewTable {
    width: 100%;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta property="og:url" content="https://tailwindcomponents.com/component/pricing-sections/landing" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css">

  </head>

  <body>
  

    <div class="text-center">
                <h1 class="font">
                    <span>Book for Date: </span>
                    <span class="text-blue tracking-wide"><?php echo date('m/d/Y', strtotime($date)); ?></span>
                </h1> 
    </div>
 
  
    <div class="pt-20 flex flex-row">
    <div class="container">
           <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 

           foreach($timeslots as $ts){ ?>
            <div class="flex justify-center items-center">
              <div class="form-group">
              <?php if(in_array($ts, getbookings($date))){ ?>
            <button class="button button2"><?php echo $ts; ?></button>
            <?php }else{ ?>
                 <button class="button button1 book" data-timeslot="<?php echo $ts ?>" data-date="<?php echo $date; ?>" ><?php echo $ts; ?></button>
                 <?php }  ?>
            </div>
            </div>
            <?php } ?>
       </div>
    </div>
  </div>   


  <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                      
                            <form method="POST" action="{{route('ads.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <label for="">Date</label>
                                    <input readonly type="text" class="form-control" id="date" name="date">
                                </div>
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Ads Title</label>
                                    <input required type="text" class="form-control" name="adsTitle">
                                </div>
                                <div class="form-group">
                                    <label for="">Company Name</label>
                                    <input required type="text" class="form-control" name="adsCompany">
                                </div>
                                <div class="form-group">
                                    <label for="">Ads Caption</label>
                                    <textarea required type="text" class="form-control" name="adsCaption"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="chooseFiles">Add Images</label>
                                  <input type="file" name="media[]" id="chooseFiles" class="form-control"  multiple="multiple" autofocus />
                                    <table id="previewTable">
                                      <thead id="columns"></thead>
                                      <tbody id="previews"></tbody>
                                    </table>
                                </div>

                                <div class="form-group pull-right">
                                
                                    <button type="submit" value="SUBMIT" class="btn btn-primary">Submit</button>
                               
                                </div>
                            
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
  <script>
  $(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
  });
  $(".book").click(function(){
    var date = $(this).attr('data-date');
    $("#date").html(date);
    $("#date").val(date);
    $("#myModal").modal("show");
  });
</script>
<script>
(function (global) {
    var imagesPerRow = 5,
        chooseFiles,
        columns,
        previews;

    function PreviewImages() {
        var row;

        Array.prototype.forEach.call(chooseFiles.files, function (file, index) {
            var cindex = index % imagesPerRow,
                oFReader = new FileReader(),
                cell,
                image;

            if (cindex === 0) {
                row = previews.insertRow(Math.ceil(index / imagesPerRow));
            }

            image = document.createElement("img");
            image.id = "img_" + index;
            image.style.width = "100%";
            image.style.height = "auto";
            cell = row.insertCell(cindex);
            cell.appendChild(image);

            oFReader.addEventListener("load", function assignImageSrc(evt) {
                image.src = evt.target.result;
                this.removeEventListener("load", assignImageSrc);
            }, false);

            oFReader.readAsDataURL(file);
        });
    }

    global.addEventListener("load", function windowLoadHandler() {
        global.removeEventListener("load", windowLoadHandler);
        chooseFiles = document.getElementById("chooseFiles");
        columns = document.getElementById("columns");
        previews = document.getElementById("previews");

        var row = columns.insertRow(-1),
            header,
            i;

        for (i = 0; i < imagesPerRow; i += 1) {
            header = row.insertCell(-1);
            header.style.width = (100 / imagesPerRow) + "%";
        }

        chooseFiles.addEventListener("change", PreviewImages, false);
    }, false);
}(window));
</script>
  </body>

</html>
@endsection