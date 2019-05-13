@extends('layouts.header')
@section('content')
<div class="page-title image-title" style="background-image:url({{ $service->getFirstMediaUrl('service') }});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>{{$service->translate('name')}}</h2>
               <p><a href="/" class="theme-cl">Home</a> | <a href="{{ route('front.services') }}" class="theme-cl">Services</a> | <span>{{$service->translate('name')}}</span></p>
            </div>
         </div>
      </div>
      <section class="profile-header-nav padd-0 bb-1">
         <div class="container">
            <div class="row"> 
               <div class="col-md-12 col-sm-12">
						<div class="serv-slider">
							<div class="loop owl-carousel owl-theme" id="tab-wrapper">
							@foreach($service->category as $category)
								<div class="item"><a href="#{{$category->id}}" role="tab" data-toggle="tab"><span class="{{$category->icon}} fontFlatSize"></span> {{$category->translate('name')}}</a></div>
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
      </section>
      <section class="tr-single-detail gray-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-sm-12 simple-features-list">
                  <div id="tab-body">	
				  @foreach($service->category as $category)
					<div id="{{$category->id}}">
					@if ($category->providers->count())
						@foreach ($category->providers as $provider)
					<div class="col-md-6 col-sm-6">
                        <div class="list-slide-box">
                            <article class="hotel-box style-1">
                                <div class="hotel-box-image">
                                 <figure>
									<a href="{{ route('front.providers.show', $provider->id) }}">
										<img src="{{$provider->getFirstMediaUrl('provider')}}" class="img-responsive listing-box-img" alt="{{$provider->name_en}}"/>
										<div class="list-overlay"></div>
									</a>
									<h4 class="hotel-place">
										<a href="{{ route('front.providers.show', $provider->id) }}">{{ $provider->translate('address') }}</a>
									</h4>
									<h4 class="points-place">
										<span>{{ $provider->points }}</span>
									</h4>
                                 </figure>
                                </div>
                                <div class="hotel-detail-box">
                                    <div class="hotel-ellipsis">
                                 <h4 class="hotel-name">
                                    <a href="{{ route('front.providers.show', $provider->id) }}">{{ $provider->translate('name') }}</a>
                                 </h4>
                                    <p>{!! $provider->ShortDescription !!}</p>
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
					@endif
					</div>
					@endforeach
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="tr-single-box">
				  <div class="tr-inner-single-box">
                           <div class="tr-single-header">
                              <h4>{{ $service->translate('name') }}</h4>
                           </div>
                           <div class="tr-single-body">
                              <p>{!! $service->translate('description') !!}</p>
                           </div>
                        </div>
                     <div class="tr-single-header">
                        <h4>Advanced Search</h4>
                        <span class="pull-right clickables" data-toggle="collapse" data-target="#filter"><i class="ti-align-left"></i></span>
                     </div>
                     <div id="filter" class="collapse in">
                        <div class="tr-single-body">
							<form action="{!! route('front.search.prov') !!}"> 
								<div class="sidebar-input">
									<input type="text" class="form-control" placeholder="Title" name="input_name">
								</div>
								<div class="sidebar-input">
									<input type="text" class="form-control" placeholder="Location" name="input_address">
								</div>
								<div class="row">
									<div class="col-xs-12 mrg-top-15">
										<button type="submit" class="btn btn-arrow theme-btn full-width" name="submit" value="Search">Search</button>		
									</div>
								</div>
							</form>
                        </div>
                        <div class="tr-inner-single-box">
                           <div class="tr-single-header">
                              <h4>Service</h4>
                           </div>
                           <div class="tr-single-body">
                              <ul class="side-list-check">
                              @foreach($services as $service)
                                 <li>
                                    <a href="{{ route('front.services.show', $service->id) }}">{{ $service->name_en }}</a>
                                    <span class="pull-right">36</span>
                                 </li>
                              @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <img src="assets/img/11.png" width="100%"/>
                  <br> <br> <br>
                  <img src="assets/img/22.png" width="100%"/>
               </div>
            </div>
         </div>
      </section>
@endsection