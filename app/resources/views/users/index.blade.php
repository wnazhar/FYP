@extends('users.homepage')

@section('content')
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/0399915676.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300');
  body{
  margin: 0;
  padding: 0;
 font-family: 'Roboto', sans-serif !important;
}
section{
  width: 100%;
  height: 100vh;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
          padding: 60px 0;
}
.card{
  position: relative;
  max-width: 300px;
  height: auto;
  background: linear-gradient(-45deg,#fe0847,#feae3f);
  border-radius: 15px;
  margin: 0 auto;
  padding: 40px 20px;
  -webkit-box-shadow: 0 10px 15px rgba(0,0,0,.1) ;
          box-shadow: 0 10px 15px rgba(0,0,0,.1) ;
-webkit-transition: .5s;
transition: .5s;
}
.card:hover{
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.col-sm-4:nth-child(1) .card ,
.col-sm-4:nth-child(1) .card .title .fa{
  background: linear-gradient(-45deg,#f403d1,#64b5f6);

}
.col-sm-4:nth-child(2) .card,
.col-sm-4:nth-child(2) .card .title .fa{
  background: linear-gradient(-45deg,#ffec61,#f321d7);

}
.col-sm-4:nth-child(3) .card,
.col-sm-4:nth-child(3) .card .title .fa{
  background: linear-gradient(-45deg,#24ff72,#9a4eff);

}
.card::before{
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: rgba(255, 255, 255, .1);
z-index: 1;
-webkit-transform: skewY(-5deg) scale(1.5);
        transform: skewY(-5deg) scale(1.5);
}
.title .fa{
  color:#fff;
  font-size: 60px;
  width: 100px;
  height: 100px;
  border-radius:  50%;
  text-align: center;
  line-height: 100px;
  -webkit-box-shadow: 0 10px 10px rgba(0,0,0,.1) ;
          box-shadow: 0 10px 10px rgba(0,0,0,.1) ;

}
.title h2 {
  position: relative;
  margin: 20px  0 0;
  padding: 0;
  color: #fff;
  font-size: 28px;
 z-index: 2;
}
.price,.option{
  position: relative;
  z-index: 2;
}
.price h4 {
margin: 0;
padding: 20px 0 ;
color: #fff;
font-size: 60px;
}
.option ul {
  margin: 0;
  padding: 0;

}
.option ul li {
margin: 0 0 10px;
padding: 0;
list-style: none;
color: #fff;
font-size: 16px;
}
.card a {
  position: relative;
  z-index: 2;
  background: #fff;
  color : black;
  width: 150px;
  height: 40px;
  line-height: 40px;
  border-radius: 40px;
  display: block;
  text-align: center;
  margin: 20px auto 0 ;
  font-size: 16px;
  cursor: pointer;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
          box-shadow: 0 5px 10px rgba(0, 0, 0, .1);

}
.card a:hover{
    text-decoration: none;
}

.font span{
    font-size: 80px; 
    font-family: 'Roboto', sans-serif !important;
}
</style>
</head>
<body >
<div class="text-center">
                <h1 class="font">
                    <span >Choose Your </span>
                    <span class="text-yellow tracking-wide">Category</span>
                </h1> 
</div>

<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
      @foreach($categories as $category) 
      @if ($category->categoryId== 1 )
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>
              <h2>{{$category->categoryName}}</h2>
            </div>
            <div class="option">
              
              <a href="{{route('categories.event')}}" class="">
                            <p>
                                <span class="font-medium">
                                    Choose Plan
                                </span>
                                
                            </p>
                        </a>
            </div> 
          </div>
        </div>
        <!-- END Col one -->
      @endif
      @if ($category->categoryId== 4 )
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
            <i class="fa fa-utensils" aria-hidden="true"></i>
              <h2>{{$category->categoryName}}</h2>
            </div>
            <div class="option">
             
              <a href="{{route('categories.food')}}" class="">
                            <p>
                                <span class="font-medium">
                                    Choose Plan
                                </span>
                                
                            </p>
                        </a>
            </div>
          </div>
        </div>
        <!-- END Col two -->
      @endif
      @if ($category->categoryId== 7 )
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
            <i class="fa fa-store" aria-hidden="true"></i>
              <h2>{{$category->categoryName}}</h2>
            </div>
            <div class="option">
            
              <a href="{{route('categories.product')}}" class="">
                            <p>
                                <span class="font-medium">
                                    Choose Plan
                                </span>
                                
                            </p>
                        </a>
                    
            </div>
          </div>
        </div>
        <!-- END Col three -->
      @endif
      @endforeach
      </div>
    </div>
  </div>
</section>
</body>
</html>
@endsection