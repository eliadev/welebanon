@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Services Categories</h4>
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
				@endif
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Title</th>
						<th>Categories</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($providers as $provider)
					<tr>
						<td>{{$provider->name_en}}</td>
						<td>{{$provider->category->name_en}}</td>
						<td>{!!$provider->address_en!!}</td>
						<td><a href="{{route('providers.edit', $provider->id)}}" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="confirm('Are you sure you want to delete?')" class="d-inline-block" method="post" action="{{route('providers.destroy', $provider->id)}}">
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
				<a href="{{route('providers.create')}}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  @endsection