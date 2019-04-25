@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Users</h4>
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
				@endif
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Image</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
					<tr>
						<td><img class="img-circle" src="{{$user->getFirstMediaUrl('avatars', 'thumb')}}"></td>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->phone}}</td>
						<td> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('clients.destroy', $user->id)}}">
						@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger btn-xs webtn">Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
  @endsection