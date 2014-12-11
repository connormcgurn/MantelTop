@extends('layouts.default')

@section('content')

<style>
@import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
.carousel-indicators .active{ background: #31708f; } .content{ margin-top:20px; } .adjust1{ float:left; width:100%; margin-bottom:0; } .adjust2{ margin:0; } .carousel-indicators li{ border :1px solid #ccc; } .carousel-control{ color:#31708f; width:5%; } .carousel-control:hover, .carousel-control:focus{ color:#31708f; } .carousel-control.left, .carousel-control.right { background-image: none; } .media-object{ margin:auto; margin-top:15%; } @media screen and (max-width: 768px) { .media-object{ margin-top:0; } }
</style>
      
  <!-- The front two pictures or thumbnails-->
    <div class="row frontThumbs">
  <div class="col-xs-12 col-sm-6">
    <a href="/PortraitsandModeling" class="thumbnail">
      <img class="grow" src="/assets/images/Portraits_and_modeling_half.jpg" alt="Portraits and Modeling" >
    </a>
  </div>
        
    <div class="col-xs-12 col-sm-6">
    <a href="/browseRaces" class="thumbnail">
      <img class="grow" src="/assets/images/race_and_sports_banner_half.jpg" alt="Browse Races">
    </a>
  </div>
</div>

<!--The about MantelTop section-->
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="jumbotron">
          <h1>We are Mantel Top</h1>
          
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-8">
        <div class="jumbotron" style="padding-top: 66px;">
            <h2>Making Triumphant Memories Last</h2>
                <hr/>
            <p> Mantel Top Photography has been one of New Hampshire's leading race photographers since being established in 2012.
            Mantel Top Photography covers a wide variety of race events, including 5ks, 10ks, Marathons, Cross Country, and more. </p>
             <p>For more information on our Race and Sports photography visit our <a href="/racesandsports">Races and Sports page</a>.</p>
        </div>
    </div>
</div>
 
 
<div class="container content"> <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> <!-- Indicators --> <ol class="carousel-indicators"> <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> <li data-target="#carousel-example-generic" data-slide-to="1"></li> <li data-target="#carousel-example-generic" data-slide-to="2"></li> </ol> <!-- Wrapper for slides --> <div class="carousel-inner"> <div class="item active"> <div class="row"> <div class="col-xs-12"> <div class="thumbnail adjust1"> <div class="col-md-2 col-sm-2 col-xs-12"> <img class="media-object img-rounded img-responsive" src="assets/images/portraits_page.jpg"> </div> <div class="col-md-10 col-sm-10 col-xs-12"> <div class="caption"> <p class="text-info lead adjust2">Could not have been happier.</p> <p> The pictures came out crystal clear and were delivered in a timely manner.</p> <blockquote class="adjust2"> <p>Sarah Smith</p> <small><cite title="Source Title"> Portsmouth, NH</cite></small> </blockquote> </div> </div> </div> </div> </div> </div> <div class="item"> <div class="row"> <div class="col-xs-12"> <div class="thumbnail adjust1"> <div class="col-md-2 col-sm-2 col-xs-12"> <img class="media-object img-rounded img-responsive" src="assets/images/testimonial1.jpg"> </div> <div class="col-md-10 col-sm-10 col-xs-12"> <div class="caption"> <p class="text-info lead adjust2">Professional quality.</p> <p> Mantel Top gave me exceptional quality photos that I was able to hang on my wall.</p> <blockquote class="adjust2"> <p>Jane Doe</p> <small><cite title="Source Title"> Hudson, NH</cite></small> </blockquote> </div> </div> </div> </div> </div> </div> <div class="item"> <div class="row"> <div class="col-xs-12"> <div class="thumbnail adjust1"> <div class="col-md-2 col-sm-2 col-xs-12"> <img class="media-object img-rounded img-responsive" src="assets/images/testimonial2.jpg"> </div> <div class="col-md-10 col-sm-10 col-xs-12"> <div class="caption"> <p class="text-info lead adjust2">Professional quality at amateur cost</p> <p> I cannot imagine having another race without Mantel Top Photograpy. Their prices are a steal!</p> <blockquote class="adjust2"> <p>John Smith</p> <small><cite title="Source Title">Danville, NH</cite></small> </blockquote> </div> </div> </div> </div> </div> </div> </div> <!-- Controls --> <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div> </div>
 
    
      @if(Auth::check())
      <h2>Logged In</h2>
      @else
      <h2>Not Logged In</h2>
      @endif
@stop
