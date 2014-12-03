@extends('layouts.default')

@section('content')

      

    <div class="row frontThumbs">
  <div class="col-xs-12 col-sm-6">
    <a href="/PortraitsandModeling" class="thumbnail">
      <img class="grow" src="/assets/images/Portraits_and_modeling_half.jpg" alt="Portraits and Modeling" >
    </a>
  </div>
        
    <div class="col-xs-12 col-sm-6">
    <a href="/browseRacesCont" class="thumbnail">
      <img class="grow" src="/assets/images/race_and_sports_banner_half.jpg" alt="Browse Races">
    </a>
  </div>
</div>
    
        @if(Auth::check())
      <h2>Logged In</h2>
      @else
      <h2>Not Logged In</h2>
      @endif
@stop
