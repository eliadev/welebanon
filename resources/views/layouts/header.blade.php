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
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}"/>
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
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}"/>
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
								@auth
									<li><a href="{!! route('front.profile') !!}">{!! __('messages.profile') !!}</a></li> 
								@endauth    
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
								  <a class="lang-ar" href="{!! route('change-language', 'ar')!!}">AR</a>
								  <span class="lang-ar"> | </span>
								  <a class="lang-ar" href="{!! route('change-language', 'en')!!}">EN</a>
							    </div>
								</li>
							</ul>
                        </div>
					</nav>		
				</div>
			</div>
		</div>
	</header>
		@yield('content')
	<section class="before-footer bt-1 bb-1">
         <div class="container-fluid padd-0 full-width">
            <div class=" col-md-2 col-sm-2 br-1 mbb-1">
               <div class="data-flex">
                  <h4>{!! __('messages.touch') !!}</h4>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 br-1 mbb-1">
               <div class="data-flex text-center">
                 {!! __('messages.address') !!}
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
		@yield('scripts')
		<script>
			$(document).ready(function() {
				$('.award-slider .owl-carousel').owlCarousel({
					loop:true,
					margin:20,
					nav:false,
					pagination:true,	
					{!! __('messages.slider') !!}
					{!! __('messages.sliderposition') !!}			
					autoplay:true,
					responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  },
					  1000:{
						  items:3
					  }
					}
				});
			});
		</script>
		<script>
         var owl = $('.serv-slider .owl-carousel');
         owl.owlCarousel({
         loop:true,
         nav:true,
         dots: false,
		 {!! __('messages.slider') !!}
		 {!! __('messages.sliderposition') !!}
         margin:10,
         navText: ["<img src='https://www.banincharity.org/img/prev1.png' width='25'>","<img src='https://www.banincharity.org/img/next1.png' width='25'>"],
         navClass:['owl-prev', 'owl-next'],
         responsive:{
         	0:{
         		items:2
         	},
         	600:{
         		items:3
         	},            
         	960:{
         		items:4
         	},
         	1200:{
         		items:5
         	}
         }
         });
      </script>
   </body>
</html>