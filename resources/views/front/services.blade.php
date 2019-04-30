@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url({{asset('assets/img/bg1.jpg')}});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>{!! __('messages.service') !!}</h2>
               <p><a href="/" class="theme-cl">Home</a> | <span>Services</span></p> 
            </div>
         </div>
      </div>
	  <br>
      <section class="tour-type" id="services">
		<div class="container">
			<div class="row">     
			@foreach($services as $service)
				<div class="featured-block col-md-3 col-sm-6 col-xs-12">
					<div class="inner-box">
					<a href="{{ route('front.services.show', $service->id) }}">
						<div class="icon-box">
							<span class="{{ $service->icon }}"></span>
						</div>
						<h3>{{ $service->translate('name') }}</h3>
						<div class="text">{!! $service->ShortDescription !!}</div>
						</a>
					</div>
				</div>
			@endforeach
			</div>		
		</div>
	</section>
@endsection