@extends('layouts.default')

@section('content')

      
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
            <p> Hey I'm like, super cool.</p>
                <hr/>
            <p> I should probably change this at some point</p>
            <p> Maybe a picture will go somewhere?</p>
        </div>
    </div>
</div>
    
        @if(Auth::check())
      <h2>Logged In</h2>
      @else
      <h2>Not Logged In</h2>
      @endif
@stop
