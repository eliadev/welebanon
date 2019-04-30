<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>We Lebanon | Home</title>
	  @if(App::getLocale() == 'ar')
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/menu-rtl.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/style-rtl.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
	  @else
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
	  @endif	  	
	</head>
<body @if(App::getLocale() == 'ar') dir="rtl" @endif>
	<header class="main-header sticky-header header-with-top" id="main-header-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar bg-change navbar-fixed-top">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              </button>
                  <a class="navbar-brand logo navbar-brand" href="{!! route('front.home') !!}">
							<img src="{{asset('assets/img/logo-black.png')}}" alt="We Lebanon">
						</a>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav mainmenu pull-right">   
								<li><a href="/">{!! __('messages.home') !!}</a></li>							  
								<li><a href="about.html">{!! __('messages.about') !!}</a></li> 
								<li><a href="{!! route('front.services') !!}">{!! __('messages.services') !!}</a></li> 								
								<li><a href="{!! route('front.contact') !!}">{!! __('messages.contact') !!}</a></li>        
								@guest
									<li class="br-right">
										<a class="getstarted" href="{!! route('front.login') !!}">
											<i class="fa fa-user"></i> {!! __('messages.getstarted') !!}
										</a>
									</li>
								@endguest
								@auth
									<li class="br-right">
										<a class="getstarted" href="/logout">
											<i class="fa fa-user"></i> {!! __('messages.logout') !!}
										</a>
									</li>
								@endauth							
								<li class="br-right">
								<div class="language">
									<a class="lang-ar" href="{!! route('change-language', 'en')!!}">EN</a>
										<span class="lang-ar"> | </span>
									<a class="lang-ar" href="{!! route('change-language', 'ar')!!}">AR</a>
							    </div>
								</li>
							</ul>
                        </div>
					</nav>		
				</div>
			</div>
		</div>
	</header>
	    <div class="page-title image-title" style="background-image:url({{ $provider->getFirstMediaUrl('provider') }});">
			<div class="container">
				<div class="page-title-wrap">
				   <h2>{{ $provider->translate('name') }}</h2>
				   <p><a href="/" class="theme-cl">Home</a> | <a href="#" class="theme-cl">Getaways</a> | <span>{{ $provider->translate('name') }}</span></p>
				</div>
			</div>
		</div>  
      <section class="tr-single-detail gray-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-sm-12">
                  <div class="tab-content tabs">
                     <div>
                        <div class="row">
                           <div class="tr-single-box">
                              <div class="tr-single-header">
                                 <h4><i class="ti-files"></i>Description</h4>
                              </div>
                              <div class="tr-single-body">
                                 <p>{!! $provider->translate('description') !!}</p>
                              </div>
                           </div>
                        </div> 
                        @if($provider->tags->count())
                        <div class="row">
                           <div class="tr-single-box">
                              <div class="tr-single-header">
                                 <h4><i class="ti-crown"></i>More Info</h4>
                              </div>
                              <div class="tr-single-body">
                                 <ul class="amenities third"> 
                                 @foreach($provider->tags as $tag)
                                    <li>{{ $tag->name }}</li>
                                 @endforeach          
                                 </ul>
                              </div>
                           </div>
                        </div>
                        @endif
                        @if( $provider->getMedia('gallery')->count() )
                           <div class="row">
                              <div class="tr-single-box">
                                 <div class="tr-single-header">
                                    <h4><i class="ti-gallery"></i>Photo Gallery</h4>
                                 </div>
                                 <div class="tr-single-body">
                                    <ul class="gallery-list">
                                       @foreach($provider->getMedia('gallery') as $media )
                                       <li>
											<a class="example-image-link" href=" {!! url($media->getUrl()) !!}" data-lightbox="example-set" data-title="">
												<img class="example-image" src=" {!! url($media->getUrl('thumb-medium')) !!}" width="100%" alt=""/>
											</a>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        @endif
                        <div class="row">
                           <div class="tr-single-box">
                              <div class="tr-single-header">
                                 <h4><i class="ti-map-alt"></i>Location</h4>
                              </div>
                              <div class="tr-single-body">
                                 <div id="map-details"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="tr-single-box">
                     <div class="tr-single-header bg-details">
                        <div class="entry-meta">
                           <div class="meta-item meta-author">
                              <div class="hotel-review entry-location">
                                 <h4>Book Now</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tr-single-body">
                        <form class="book-form" id="form" name="form" action="{!! route('front.providers.book', $provider->id) !!}" method="POST">
                            @csrf
                           <div class="row">
                              <div class="col-xs-12">
                                 <div class="form-group">
                                    <label for="checkin">From</label>
                                    <input type="text" name="checkin" id="checkin" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-xs-12">
                                 <div class="form-group">
                                    <label for="checkout">To</label>
                                    <input type="text" name="checkout" id="checkout" class="form-control" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xs-6">
                                 <div class="form-group">
                                    <label>Adult</label>
                                    <input type="number" name="adult" value="1" class="form-control">
                                 </div>
                              </div>
                              <div class="col-xs-6">
                                 <div class="form-group">
                                    <label>Children</label>
                                    <input type="number" name="children" value="0" class="form-control">
                                 </div>
                              </div>
                           </div>
							<div class="row">
								<div class="col-xs-12 mrg-top-15">
								@auth
									@if(!auth()->user()->plan)
										<a href="/">You must have a plan first.</a>
									@else
										<button type="submit" class="btn btn-arrow theme-btn full-width">Submit</button>
									@endif
								@endauth
								@guest
									<button type="submit" class="btn btn-arrow theme-btn full-width">Submit</button>
								@endguest		
								</div>
							</div>
							@if (session('status'))
								<br>
								<div class="alert alert-success">
								  {{ session('status') }}
								</div>
							@endif  
                        </form>
                     </div>
                  </div>
                  <div class="tr-single-box">
                     <div class="tr-single-header">
                        <h4>Share this</h4>
                     </div>
                     <div class="tr-single-body">
                        Social Media Icon
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="before-footer bt-1 bb-1">
         <div class="container-fluid padd-0 full-width">
            <div class=" col-md-2 col-sm-2 br-1 mbb-1">
               <div class="data-flex">
                  <h4>Get in Touch!</h4>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 br-1 mbb-1">
               <div class="data-flex text-center">
                  Achrafieh,Gouraud Street, Azirian Bldg, 1st Floor
               </div>
            </div>
            <div class="col-md-3 col-sm-3 br-1 mbb-1">
               <div class="data-flex text-center">
                  <span class="d-block mrg-bot-0">+961 70 123 456</span>
                  <a href="#" class="theme-cl"><b>info@welebanon.com</b></a>
               </div>
            </div>
            <div class="col-md-4 col-sm-4 padd-0">
               <div class="data-flex padd-0">
                  <ul class="social-share">
                     <li><a href="#"><i class="fa fa-facebook theme-cl"></i></a></li>
                     <li><a href="#"><i class="fa fa-google-plus theme-cl"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter theme-cl"></i></a></li>
                     <li><a href="#"><i class="fa fa-linkedin theme-cl"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <footer class="footer dark-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="copyright text-center">
                     <p>&copy; Copyright 2019 We Lebanon</p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script> 
	<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery-ui.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/lightbox-plus-jquery.min.js')}}"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOZmjVskSQgV7V6oXgCX1_C5TUuwkUKjY"></script>
	<script>
   var bindDateRangeValidation = function (f, s, e) {
    if(!(f instanceof jQuery)){
			console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        checkinId = s,
        checkoutId = e;
  
    var checkDateRange = function (checkin, checkout) {
        var isValid = (checkin != "" && checkout != "") ? checkin <= checkout : true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            checkin: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'Start Date must less than or equal to End Date.',
                        callback: function (checkin, validator, $field) {
                            return checkDateRange(checkin, $('#' + checkoutId).val())
                        }
                    }
                }
            },
            checkout: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'End Date must greater than or equal to Start Date.',
                        callback: function (checkout, validator, $field) {
                            return checkDateRange($('#' + checkinId).val(), checkout);
                        }
                    }
                }
            },
          	customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', checkinId, validateFields.checkin);
        jqForm.bootstrapValidator('addField', checkoutId, validateFields.checkout);
      
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + checkinId).on("dp.change dp.update blur", function (e) {
            $('#' + checkoutId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, checkoutId);
        });

        $('#' + checkoutId).on("dp.change dp.update blur", function (e) {
            $('#' + checkinId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, checkinId);
        });
    }

    bindValidator();
    hookValidatorEvt();
};


$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#checkin').datetimepicker({ 
      pickTime: false, 
      format: "DD/MM/YYYY", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#checkout').datetimepicker({ 
      pickTime: false, 
      format: "DD/MM/YYYY", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#form"), 'checkin', 'checkout');
});
   </script>
   <script type="text/javascript">
		   $(document).ready(function() {
		           var myCenter = new google.maps.LatLng("{{ $provider->latitude }}", "{{ $provider->longitude }}");
		   
		           function initialize() {
		               var mapProp = {
		                   center: myCenter,
		                   zoom: 14,
		                   scrollwheel: false,
		                   mapTypeId: google.maps.MapTypeId.ROADMAP
		               };
		               var map = new google.maps.Map(document.getElementById("map-details"), mapProp);
		               var icon = {
		                   url: '{{asset('assets/img/marker.png')}}'
		               };
		               var marker = new google.maps.Marker({
		                   position: myCenter,
		                   map: map,
		                   icon: icon,
		                   /*animation: google.maps.Animation.BOUNCE*/
		               });
		               marker.setMap(map);
		               var infowindow = new google.maps.InfoWindow({
		                   content: '<h3 class="title-map">{{ $provider->translate('name') }}</p>'
		               });
		   
		               google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map,marker);
                     });
		   
		   infowindow.open(map,marker);
		    }
		           google.maps.event.addDomListener(window, 'load', initialize);
		       });		   
		</script>	

   </body>
</html>