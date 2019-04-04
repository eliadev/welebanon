@extends('layouts.header')
@section('content')
      <div class="page-title image-title" style="background-image:url({{asset('assets/img/destination.jpg')}});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>Contact Us</h2>
               <p><a href="/" class="theme-cl">Home</a> |<span> Contact Us</span></p>
            </div>
         </div>
      </div>
	  <section class="gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 bg-white border-form">
					<div class="form-box">
							<i class="c-icon ti-map-alt theme-cl"></i>
							<div class="c-detail">
								<strong>Address:</strong>
								<p>Achrafieh,Gouraud Street, Azirian Bldg, 1st Floor</p>
							</div>
						</div>
						
						<div class="form-box">
							<i class="c-icon ti-email theme-cl"></i>
							<div class="c-detail">
								<strong>Email:</strong>
								<p>info@welebanon.com</p>
							</div>
						</div>
						
						<div class="form-box">
							<i class="c-icon ti-headphone-alt theme-cl"></i>
							<div class="c-detail">
								<strong>Call Us:</strong>
								<p>+961 70 111 222</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-7 col-sm-7">
						<div class="form-box border-form">
							<form class="c-form">
							
								<div class="row">
									<div class="col-sm-6">
										<label>Full Name</label>
										<input type="text" class="form-control" name="name" required>
									</div>
									<div class="col-sm-6">
										<label>Email</label>
										<input type="email" class="form-control" name="email" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<label>Phone</label>
										<input type="text" class="form-control" name="phone" required>
									</div>
									<div class="col-sm-6">
										<label>Subject</label>
										<input type="text" class="form-control" name="subject" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<label>Message</label>
										<textarea class="form-control height-150" name="message"></textarea>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<button type="button" class="btn theme-btn btn-arrow">Send</button>
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	  <div id="map"></div>
@endsection
@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOZmjVskSQgV7V6oXgCX1_C5TUuwkUKjY"></script>
<script>
   $(document).ready(function() {
		   var myCenter = new google.maps.LatLng("33.893791", "35.501778");
   
		   function initialize() {
			   var mapProp = {
				   center: myCenter,
				   zoom: 14,
				   scrollwheel: false,
				   mapTypeId: google.maps.MapTypeId.ROADMAP
			   };
			   var map = new google.maps.Map(document.getElementById("map"), mapProp);
			   var icon = {
				   url: 'assets/img/marker.png'
			   };
			   var marker = new google.maps.Marker({
				   position: myCenter,
				   map: map,
				   icon: icon,
				   /*animation: google.maps.Animation.BOUNCE*/
			   });
			   marker.setMap(map);
			   var infowindow = new google.maps.InfoWindow({
				   content: '<h3 class="title-map">We Lebanon</h3><br><p>+961 70 111 222</p>'
			   });
   
			   google.maps.event.addListener(marker, 'click', function() {
	 infowindow.open(map,marker);
   });
   
	infowindow.open(map,marker);
	}
	   google.maps.event.addDomListener(window, 'load', initialize);
   });
</script>
@endsection