@extends('layouts.default')

@section('content')
<style>
.row {
    margin: 80px 0px 80px 0px;
    }

img {
    margin: 10px 10px 10px 10px;
    -webkit-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    transform: scale(1, 1);
    transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s; /* Safari */
    }

img:hover {
	cursor: pointer;
	-webkit-transform: scale(2, 2);
    -ms-transform: scale(2, 2);
    transform: scale(2, 2);
    transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s; /* Safari */
    box-shadow: 10px 10px 5px #888888;
    z-index: 1;
    }
 </style>
	<h1> Portraits and Modeling</h1>
  <img style="float:right;box-shadow: 0 0 15px black" src="assets/images/portraits_page.jpg" width="320px" height="232" Hspace="10" Vspace="5">
     <p>
        Mantel Top Photography will accomodate any of your photographic needs. Here are a few services we offer and occasions we'll shoot. 

    </p>
    <ul style="text-align:left">
        <li>Family Portraits</li>
        <li>Engagements</li>
        <li>Senior Portraits</li>
        <li>Modeling</li>
        <li>Maternity</li>
        <li>Family and Corporate Events</li>
        <li>...And Anything Else You May Need</li>
    </ul>

    <div class="container">
  <div class="row">
	<img src="assets/images/portrait1.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait2.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait3.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait4.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait5.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait6.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/portrait7.jpg" width="140px" height="140" alt="..." class="img-rounded">
  </div>
</div>

@stop