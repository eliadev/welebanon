@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-xl-8">
			<div class="bg-picture card-box">
				<div class="profile-info-name">
					<img src="{{$user->getFirstMediaUrl('avatars', 'thumb')}}" class="img-thumbnail" alt="">
						<div class="profile-info-detail">
							<h4 class="m-0"><b>{{$user->first_name}} {{$user->last_name}}</b></h4>
						</div>
					<div class="clearfix"></div>
				</div>
				<ul class="list-inline task-dates m-b-0 m-t-20">
					<li>
						<h5 class="font-600 m-b-5">Email</h5>
						<p>{{$user->email}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Phone</h5>
						<p>{{$user->phone}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Country</h5>
						<p>{{$user->country}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Date of Birth</h5>
						<p>{{$user->date_of_birth}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Created at</h5>
						<p>{{$user->created_at}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Updated at</h5>
						<p>{{$user->updated_at}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Points</h5>
						<p>{{$user->points}}</p>
					</li>
					<li>
						<h5 class="font-600 m-b-5">Plan</h5>
					@if($user->plan)
						<p>{{$user->plan->name_en}}</p>
					@else
						The user did not select any plan yet.
					@endif
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xl-4">
		   <div class="card-box">
			  <h4 class="header-title m-t-0 m-b-30">Action</h4>
			  <a href="{{route('clients.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
		   </div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="bg-picture card-box">
				<h4 class="m-t-0 header-title">User History</h4>
				<br>
				<table class="table table-striped tg-cartproductdetail">
					<thead>
					<tr>
						<th>#</th>
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
					@foreach($userProviders as $key => $userProvider)
						<?php $provider = \App\Provider::find($userProvider->provider_id) ?>
							<tr class="cart_item">
								<td>&nbsp;&nbsp;{!! $key + 1!!}</td>
								<td>
									<div class="tg-tourname">
										<figure>
											<a href="{{ route('front.providers.show', $provider->id) }}"><img src="{{$provider->getFirstMediaUrl('provider', 'thumb')}}" class="img-responsive" alt="{!! $provider->translate('name') !!}"></a>
										</figure>
										<div class="tg-populartourcontent">
											<div class="tg-populartourtitle">
												<h4>
													<a href="{{ route('front.providers.show', $provider->id) }}">{!! $provider->translate('name') !!}</a>
												</h4>
											</div>										
										</div>
									</div>
								</td>
								<td>
									<span class="Price-amount amount">{!! $userProvider->from_date !!}</span>
								</td>
								<td>
									<span class="Price-amount amount">
										{!! $userProvider->to_date !!}
									</span>
								</td>
								<td>
									<span class="Price-amount amount">{!! $userProvider->nb_adults !!}</span>
								</td>
								<td>
									<span class="Price-amount amount">{!! $userProvider->nb_children !!}</span>
								</td>
								<td>
									<span class="Price-amount amount">{!! $provider->points !!}</span>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection