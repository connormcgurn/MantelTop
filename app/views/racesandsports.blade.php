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
 
 <h1>Races and Sports</h1>
 
 <p>We know how hard you trained for that race, let us make it a memory! When you see Mantel Top Photography at a race or sporting event, you can expect complete coverage from start to finish. Other companies seem to have cluttered websites, difficult photo viewing systems, and very high prices, all for mediocre pictures. With Mantel Top Photography, 
 you can always expect ease of use, reliability and quality images, all at very competitive prices.</p>
 <p>What sets us apart from other photography companies is that we recognize the growing influence and ease of use of technology today. That's why we're focusing on a completely digital age. When you purchase pictures through our website, you're buying high quality digital image files to use any way you would like. Post them to Facebook, make prints at your preferred photo printer, share with your family! We'll make it easy. And while other sites discourage the sales of digital images and charge prices 
 such as $30, $40, and even $50 a picture, Mantel Top Photography offers professional digital purchases for just $10 a picture.</p>

 <a href="#" class="btn btn-lg btn-primary">Browse Races</a>

 <div class="container">
  <div class="row">
	<img src="assets/images/sport1.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport2.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport3.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport4.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport5.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport6.jpg" width="140px" height="140" alt="..." class="img-rounded">
  <img src="assets/images/sport7.jpg" width="140px" height="140" alt="..." class="img-rounded">
  </div>
</div>

@stop