@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url(assets/img/bg1.jpg);">
         <div class="container">
            <div class="page-title-wrap">
				<h2>My profile</h2>
				<p><a href="/" class="theme-cl">Home</a> | <span>My Profile</span></p> 
            </div>
         </div>
      </div>
		<!--<section class="tour-type">
         <div class="container">
            <div class="row"> 
               <div class="col-md-12 col-sm-12">	
					@if (session('status'))
						<div class="alert alert-success">
						  {{ session('status') }}
						</div>
					@endif  
					<br>
               		@if($user->plan)			
						<ul>
							<li>Plan: {!! $user->plan->translate('name') !!}</li>
							<li>Used points: {!! $user->points !!} </li>
							<li>Remaining points: {!! $user->remaining_points !!}</li> 
						</ul>

                    @if($user->providers)
                      <table>
                        <tr>
                          <td>#</td>
                          <td>Provider</td>
                          <td>Adults</td>
                          <td>Children</td>
                          <td>From</td>
                          <td>To</td>
                          <td>Points</td>
                        </tr>
                          @foreach($user_providers as $key => $user_provider)
                          <?php $provider = \App\Provider::find($user_provider->pivot->provider_id) ?>
                            <tr>
                              <td>{!! $key + 1!!}</td>
                              <td>{!! $provider->translate('name') !!}</td>
                              <td>{!! $user_provider->pivot->nb_adults !!}</td>
                              <td>{!! $user_provider->pivot->nb_children !!}</td>
                              <td>{!! $user_provider->pivot->from_date !!}</td>
                              <td>{!! $user_provider->pivot->to_date !!}</td>
                              <td>{!! $provider->points !!}</td>
                            </tr>
                          @endforeach
                        </table>

                        <!-- 
                          Add the points to the user
                          make sure points = full plan points
                          reset the user plan
                          send the notification
                        
                       <button type="submit">Confirm</button>
                    @endif
					@else
						You did not select any plan yet.
					@endif
               </div>
           </div>
       </div>
   </section>-->
		<section class="cart gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if (session('status'))
							<div class="alert alert-success">
							  {{ session('status') }}
							</div>
							<br>
						@endif  
					</div>
				</div>
				<div class="clearfix"></div>
				@if($user->plan)
				<div class="col-md-4 col-sm-4">
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4>Total Points<span class="fl-right">{!! $pointSum !!}</span></h4>
							</div>
							<div class="tr-single-body">
								<div class="booking-price-detail side-list no-border">
									<ul>
										<li>Plan Name<b class="pull-right">{!! $user->plan->translate('name') !!}</b></li>
										<li>Plan Points<b class="pull-right">{!! $user->plan->points !!}</b></li>
										<li>Used Points<b class="pull-right">{!! $user->points !!}</b></li>
										<li>Remaining Points<b class="pull-right">{!! $user->remaining_points !!}</b></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				@if($user_providers->count())
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="tg-cartproductdetail table-responsive">
							<table class="table" cellspacing="0">
								<thead>
									<tr>
										<th>&nbsp;&nbsp;#</th>
										<th>Provider</th>
										<th>From</th>
										<th>To</th>
										<th>Adults</th>
										<th>Children</th>
										<th>Points</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
							<tbody>
							
								@foreach($user_providers as $key => $user_provider)
								<?php $provider = \App\Provider::find($user_provider->pivot->provider_id) ?>
									<tr class="cart_item">
										<td>&nbsp;&nbsp;{!! $key + 1!!}</td>
										<td>
											<div class="tg-tourname">
												<figure>
													<a href="{{ route('front.providers.show', $provider->id) }}"><img src="{{$provider->getFirstMediaUrl('provider', 'thumb')}}" class="img-responsive" alt="{!! $provider->translate('name') !!}"></a>
												</figure>
												<div class="tg-populartourcontent">
													<div class="tg-populartourtitle">
														<h3>
															<a href="{{ route('front.providers.show', $provider->id) }}">{!! $provider->translate('name') !!}</a>
														</h3>
													</div>										
												</div>
											</div>
										</td>
										<td>
											<span class="Price-amount amount">{!! $user_provider->pivot->from_date !!}</span>
										</td>
										<td>
											<span class="Price-amount amount">{!! $user_provider->pivot->to_date !!}</span>
										</td>
										<td>
											<span class="Price-amount amount">{!! $user_provider->pivot->nb_adults !!}</span>
										</td>
										<td>
											<span class="Price-amount amount">{!! $user_provider->pivot->nb_children !!}</span>
										</td>
										<td>
											<span class="Price-amount amount">{!! $provider->points !!}</span>
										</td>
										<td class="product-remove">
											<a href="#" class="remove"><i class="fa fa-remove"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
							</table>
							<div class="col-md-12">
								<div class="row">
									<div class="col-sm-6">
										<a class="btn theme-btn" type="button" href="{{ route('front.services') }}">Update Cart</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4>Total Points<span class="fl-right">{!! $pointSum !!}</span></h4>
							</div>
							<div class="tr-single-body">
								<div class="booking-price-detail side-list no-border">
									<ul>
										<li>Plan Name<b class="pull-right">{!! $user->plan->translate('name') !!}</b></li>
										<li>Plan Points<b class="pull-right">{!! $user->plan->points !!}</b></li>
										<li>Used Points<b class="pull-right">{!! $user->points !!}</b></li>
										<li>Remaining Points<b class="pull-right">{!! $user->remaining_points !!}</b></li>
									</ul>
									<br>
									<a href="#" class="btn btn-success full-width">PROCEED NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				@else
					You did not select any plan yet.
				@endif
			</div>
		</section>
@endsection