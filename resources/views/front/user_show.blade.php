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
					@else
						You did not select any plan yet.
					@endif

               </div>
           </div>
       </div>
   </section>
@endsection