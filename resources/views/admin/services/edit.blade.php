@extends('layouts.cmslayout')
	@section('content')
	@if(session()->has('message'))
		<div class="alert alert-success">
			{{session()->get('message')}}
		</div>
	@endif
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>			
			@endforeach
			</ul>
		</div>
	@endif
    <form class="form-horizontal" action="{{route('services.update', $service->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@method('put')
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Service Title</label>
					<div class="col-md-9 bg-tran">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#titleEnServ" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#titleArServ" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="titleEnServ">
									<div class="form-group row">
										<div class="col-md-1"></div>
										<label for="titleEn" class="col-sm-2 col-form-label">Title English</label>
										<div class="col-sm-8">
											<input type="text" name="name_en" value="{{$service->name_en}}" class="form-control" id="titleEn" placeholder="Title English">
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="titleArServ">
									<div class="form-group row">
										<div class="col-md-1"></div>
										<label for="titleAr" class="col-sm-2 col-form-label">Title Arabic</label>
										<div class="col-sm-8">
											<input type="text" name="name_ar" value="{{$service->name_ar}}" class="form-control" id="titleAr" placeholder="Title Arabic">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="icon" class="col-sm-2 col-form-label">Icon</label>
					<div class="col-sm-8">
						<input type="text" name="icon" value="{{$service->icon}}" class="form-control" id="icon" placeholder="Icon">
					</div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="order" class="col-sm-2 col-form-label">Order</label>
					<div class="col-sm-8">
						<input type="number" name="order" value="{{$service->order}}" class="form-control" id="order" placeholder="Order">
					</div>
				  </div>
				  
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<form onsubmit="confirm('Are you sure you want to delete?')" class="d-inline-block" method="post" action="{{route('services.destroy', $service->id)}}">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">DELETE</button>
				</form>
				<a href="{{route('services.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection