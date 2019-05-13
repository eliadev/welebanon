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
						@if (session('danger'))
							<div class="alert alert-danger">
							  {{ session('danger') }}
							</div>
							<br>
						@endif						
					</div>
				</div>
				<div class="clearfix"></div>
				@if($user->plan)
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h4>Your current plan</h4><hr/>
						<p>Plan Name: <b>{!! $user->plan->translate('name') !!}</b></p>
						<p>Plan Points: <b>{!! $user->plan->points !!}</b></p>
						<p>Used Points: <b>{!! $user->points !!}</b></p>
						<p>Remaining Points: <b>{!! $user->remaining_points !!}</b></p>
					</div>
				</div>
				@if(!$user_providers->count() && !$resetPlan)
					<a class="btn theme-btn" type="button" href="{{ route('front.services') }}">Add provider</a>
				@endif
				
				@if($user_providers->count())
				<br>
				<h4 style="margin-top: 20px;">Your current selection</h4>
				<hr/>
				<div class="row">
					<div class="col-md-12 col-sm-12">
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
											<span class="Price-amount amount">
												{!! $user_provider->pivot->to_date !!}
											</span>
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
											<form onsubmit="return confirm('Are you sure you want to remove?');" class="d-inline-block" method="post" action="{{route('front.remove', $user_provider->pivot->id)}}">
												@csrf
												<button type="submit " class="remove"><i class="fa fa-remove"></i></button>
											</form>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="7" align="right">
										<b>Total Points: {!! $pointSum!!}</b>
									</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
							</table>
							<div class="col-md-12">
								<div class="row">
									<div class="col-sm-6">
										<a class="btn theme-btn" type="button" href="{{ route('front.services') }}">Add more services</a>
										<form onsubmit="return confirm('Are you sure you want to proceed?');" class="d-inline-block" method="post" action="{{route('front.checkout')}}" style="display:inline">
											@csrf
											<input type="hidden" name="checkin" value="{!! $user_provider->pivot->from_date !!}" />
											<input type="hidden" name="checkout" value="{!! $user_provider->pivot->to_date !!}"/>
											<input type="hidden" name="adult" value="{!! $user_provider->pivot->nb_adults !!}"/>
											<input type="hidden" name="children" value="{!! $user_provider->pivot->nb_children !!}"/>
											<button type="submit " class="btn btn-success">CHECKOUT</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					@if($resetPlan)
					<h4>
						You have reached the maximum allowed points of your plan.
						Choose another plan to proceed.
					</h4>
					@endif
				</div>
				@endif
				@else
					You did not select any plan yet.
				@endif
			</div>
		</section>
@endsection