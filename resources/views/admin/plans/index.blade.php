@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Services</h4>
				<br>
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
				@endif
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Title</th>
						<th>Points</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($plans as $plan)
					<tr>
						<td>{{$plan->name_en}}</td>
						<td>{{$plan->points}}</td>
						<td>{{$plan->price}}</td>
						<td><a href="{{route('plans.edit', $plan->id)}}" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('plans.destroy', $plan->id)}}">
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
				<a href="{{route('plans.create')}}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  @endsection