@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url(assets/img/bg1.jpg);">
         <div class="container">
         	
         </div>
    </div>
    <section class="profile-header-nav padd-0 bb-1">
         <div class="container">
            <div class="row"> 
               <div class="col-md-12 col-sm-12">
               		<h2>Your search results for <b>{!! $input !!}</b></h2>
               		@if($providers->count() )
               			<table>
               			@foreach($providers as $provider)
               				<tr>
               					<td>
               						<img width="120" src="{!! $provider->getFirstMediaUrl('provider') !!}" />
               					</td>
               					<td>
               						{!! $provider->translate('name') !!}<br/>
               						{!! $provider->translate('description') !!}<br/>

               						<a href="{!! route('front.services.show', $provider->category->service->id)!!}">
               							{!! $provider->category->service->translate('name') !!}
               						</a>
               					</td>
               				</tr>
               			@endforeach
               			</table>
               		@else
               			We did not found any provider matching your search criteria.
               		@endif
               </div>
           </div>
       </div>
   </section>
@endsection