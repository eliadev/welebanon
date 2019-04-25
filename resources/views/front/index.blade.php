@extends('layouts.header')
@section('content')
@foreach($sliders as $slider)
<div class="main-banner" style="background-image:url({{ $slider->getFirstMediaUrl('slider') }});">
	 <div class="container">
		<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
		   <div class="caption text-center cl-white">
			  <h2>{{ $slider->translate('name') }}</h2>
			  <div>{!! $slider->translate('description') !!}</div>
		   </div>
			<form class="wow-form" action="{!! route('front.search') !!}"> 
				<input type="text" placeholder="{!! __('messages.search') !!}..." name="search_input" required>
				<button type="submit" class="btn btn-wow theme-btn" name="submit" value="Search"> {!! __('messages.find') !!} </button>
			</form>
		</div>
	 </div>
	 <div>
		<div class="button-scroll" data-scrollTo="services"><span></span></div>
	 </div>
  </div>
@endforeach
  <div class="clearfix"></div>
  <section class="tour-type" id="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h1>{!! __('messages.service') !!}</h1>
					</div>
				</div>
			</div>
		<div class="row clearfix">     
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
		<br>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<img src="assets/img/33.png" width="100%"/>
		</div>
		<div class="col-md-2"></div>
		</div>
	</section>
  <section class="gray-bg">
	 <div class="container">
		<div class="row">
		   <div class="col-md-12">
			  <div class="heading">
				 <h1>{!! __('messages.featured') !!}</h1>
			  </div>
		   </div>
		</div>

		<div class="row">
		   <div class="award-slider">
			  <div class="owl-carousel owl-theme">
				 @foreach($providers as $provider)
				 <div class="item">
					<div class="list-slide-box">
					   <article class="hotel-box style-1">
						  <div class="hotel-box-image">
							 <figure>
								   <img src="{{$provider->getFirstMediaUrl('provider')}}" class="img-responsive listing-box-img" alt="{!! $provider->name_en !!}" />
								   <div class="list-overlay"></div>
								<h4 class="hotel-place">
								   <a>{!! $provider->translate('address') !!}</a>
								</h4>
							 </figure>
						  </div>
						  <div class="hotel-detail-box">
							 <div class="hotel-ellipsis">
								<h4 class="hotel-name">
								   <a href="{{ route('front.providers.show', $provider->id) }}">{!! $provider->translate('name') !!}</a>
								</h4>
								<p>{!! $provider->translate('description') !!}</p>
							 </div>
						  </div>
						  <div class="hotel-inner inner-box">
							 <div class="box-inner-ellipsis">
								<div class="view-box">
									  <a href="{{ route('front.providers.show', $provider->id) }}" class="read_more">read more</a>
								</div>
							 </div>
						  </div>
					   </article>
					</div>
				 </div>
				 @endforeach
			  </div>
		   </div>
		</div>
	 </div>
  </section>
  <section class="">
		<div class="container">
		<div class="row">
		   <div class="col-md-12">
			  <div class="heading">
				 <h1>{!! __('messages.packages') !!}</h1>
			  </div>
		   </div>
		</div>
		<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-12">
			<div class="pricing-2">
				<div class="title">Basic Plan</div>
				<div class="price-for-user">
					<div class="price"><sup>$</sup><span class="dolar">49</span><small class="month">per month</small></div>
				</div>
				<div class="content">
					<ul>
						<li>20 Projects</li>
						<li>32GB Storage</li>
						<li>50 Email Accounts</li>
						<li>12GB Bandwidth</li>
						<li>32GB Storage</li>
					</ul>
				</div>
				<div class="button"><a href="#" class="btn btn-border btn-sm">{!! __('messages.getstarted') !!}</a></div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-12 ">
			<div class="pricing-2">
				<div class="title">Professional</div>
				<div class="price-for-user">
					<div class="price"><sup>$</sup><span class="dolar">99</span><small class="month">per month</small></div>
				</div>
				<div class="content">
					<ul>
						<li>20 Projects</li>
						<li>32GB Storage</li>
						<li>50 Email Accounts</li>
						<li>12GB Bandwidth</li>
						<li>32GB Storage</li>
					</ul>
				</div>
				<div class="button"><a href="#" class="btn btn-sm btn-color">{!! __('messages.getstarted') !!}</a></div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-12">
			<div class="pricing-2">
				<div class="title">Exclusive</div>
				<div class="price-for-user">
					<div class="price"><sup>$</sup><span class="dolar">199</span><small class="month">per month</small></div>
				</div>
				<div class="content">
					<ul>
						<li>20 Projects</li>
						<li>32GB Storage</li>
						<li>50 Email Accounts</li>
						<li>12GB Bandwidth</li>
						<li>32GB Storage</li>
					</ul>
				</div>
				<div class="button"><a href="#" class="btn btn-border btn-sm">{!! __('messages.getstarted') !!}</a></div>
			</div>
		</div>
	</div>
		<br>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<img src="assets/img/33.png" width="100%"/>
		</div>
		<div class="col-md-2"></div>
		</div>
	</section>
@endsection