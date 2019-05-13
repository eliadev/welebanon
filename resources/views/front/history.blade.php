@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url(assets/img/bg1.jpg);">
         <div class="container">
            <div class="page-title-wrap">
				<h2>User History</h2>
				<p><a href="/" class="theme-cl">Home</a> | <span>User History</span></p> 
            </div>
         </div>
      </div>
		
		<section class="cart gray-bg">
			<div class="container">
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
									</tr>
								</thead>
							<tbody>
							@if($userProviders->count())
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
														<h3>
															<a href="{{ route('front.providers.show', $provider->id) }}">{!! $provider->translate('name') !!}</a>
														</h3>
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
								@else
									<tr>
										<td class="text-center" colspan="8">No Data History Available in Table</td>
									</tr>	
								@endif
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection