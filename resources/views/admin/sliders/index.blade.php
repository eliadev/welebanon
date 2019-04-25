@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Home Slider</h4>
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
				@endif
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Order</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($sliders as $slider)
					<tr>
						<td><img class="img-circle" src="{{$slider->getFirstMediaUrl('slider', 'thumb')}}"></td>
						<td>{{$slider->name_en}}</td>
						<td>{{$slider->order}}</td>
						<td><a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('sliders.destroy', $slider->id)}}">
						@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger btn-xs webtn">Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
				<hr>
				<a href="{{route('sliders.create')}}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  @endsection