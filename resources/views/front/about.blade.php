@extends('layouts.header')
@section('content')
	<div class="page-title image-title" style="background-image:url({{ $staticPage->getFirstMediaUrl('staticPage') }});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>{!! __('messages.about') !!}</h2>
               <p><a href="/" class="theme-cl">Home</a> | <span>{!! __('messages.about') !!}</span></p> 
            </div>
         </div>
      </div>
      <section class="tour-type" id="services">
		<div class="container">
			<div class="row">   
				<div class="col-md-12">			
					<p>{!! $staticPage->translate('description') !!}</p>
				</div>	
			</div>			
		</div>
	</section>
@endsection