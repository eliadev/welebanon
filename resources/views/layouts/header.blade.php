<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>We Lebanon | Home</title>
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}"/>
      <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}"/>
   </head>
   <body>
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
								<li><a href="index.html">Home</a></li>							  
								<li><a href="about.html">About Us</a></li>      
								<li><a href="contacts.html">Contact</a></li>        
								<li class="br-right"><a style="margin-top:23px; margin-right:20px; background:#729849; padding:15px 15px; border-radius:7px; color:#fff;" href="#"><i class="fa fa-user"></i> Get Started</a></li>								
								<li class="br-right">
									<div class="language"><a class="lang-ar" href="##" >AR</a><span class="lang-ar"> | </span><a class="lang-ar" href="#">EN</a></div>
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
                  <a href="#" class="theme-cl"><strong>info@welebanon.com</strong></a>
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
		<script>
			$(document).ready(function() {
				$('.award-slider .owl-carousel').owlCarousel({
					loop:true,
					margin:20,
					nav:false,
					pagination:true,		    
					autoplay:false,
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