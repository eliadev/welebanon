@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url(assets/img/bg1.jpg);">
         <div class="container">
            <div class="page-title-wrap">
               <h2>My profile</h2>
              {{--  <p><a href="/" class="theme-cl">Home</a> | <span>Search Results</span></p> --}} 
            </div>
         </div>
      </div>
    <section class="tour-type">
         <div class="container">
            <div class="row"> 
               <div class="col-md-12 col-sm-12">	
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
                          Before confirm:
                          - Make sure points = full plan points
                          After Confirm:
                          - Add the points to the user
                          - reset the user plan
                          - send the notification
                        -->
                        <button type="submit">Confirm</button>
                    @endif
        					@else
        						You did not select any plan yet.
        					@endif

               </div>
           </div>
       </div>
   </section>
@endsection