@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url(assets/img/bg1.jpg);">
         <div class="container">
            <div class="page-title-wrap">
               <h2>Search Results for "{!! $input_name !!}"</h2>
               <p><a href="/" class="theme-cl">Home</a> | <span>Search Results</span></p> 
            </div>
         </div>
      </div>
    <section class="tour-type">
         <div class="container">
            <div class="row"> 
               <div class="col-md-12 col-sm-12">				
				@if($providers->count())
					<div>
						@foreach($providers as $provider)						
						<div class="col-md-4 col-sm-4">
							<div class="list-slide-box">
								<article class="hotel-box style-1">
									<div class="hotel-box-image">
									 <figure>
											<a href="{{ route('front.providers.show', $provider->id) }}">
												<img src="{!! $provider->getFirstMediaUrl('provider') !!}" class="img-responsive listing-box-img" alt="{{$provider->name_en}}"/>
												<div class="list-overlay"></div>
											</a>
											<h4 class="hotel-place">
												<a href="{{ route('front.providers.show', $provider->id) }}">{{ $provider->translate('address') }}</a>
											</h4>
									 </figure>
									</div>
									<div class="hotel-detail-box">
										<div class="hotel-ellipsis">
									 <h4 class="hotel-name">
										<a href="{{ route('front.providers.show', $provider->id) }}">{{ $provider->translate('name') }}</a>
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
						<a href="{!! route('front.services.show', $provider->category->service->id)!!}">
							{!! $provider->category->service->translate('name') !!}
						</a>
						@endforeach
					</div>
				@else
					We did not found any provider matching your search criteria.
				@endif
               </div>
           </div>
       </div>
   </section>
@endsection