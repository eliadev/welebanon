@extends('layouts.cmslayout')
	@section('content')
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>			
			@endforeach
			</ul> 
		</div>
	@endif
	<form class="form-horizontal" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content <a class="back btn btn-secondary btn-rounded w-md waves-effect m-b-5" href="{{route('service.index')}}">Back</a></h4>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label class="col-2 col-form-label">Services</label>
						<div class="col-8">
							<select class="form-control" name="service_id">
							 <option disabled selected hidden>-- Select Services --</option>
								@foreach($services as $service)
									<option value="{{$service->id}}">{{$service->name_en}}</option>
								@endforeach
							</select>
						</div>
				  </div>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Category Title</label>
					<div class="col-md-9 bg-tran">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#titleEnCat" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#titleArCat" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="titleEnCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="titleEn" class="col-sm-2 col-form-label">Title English</label>
										 <div class="col-sm-8">
											<input type="text" name="name_en" class="form-control" id="titleEn" placeholder="Title English">
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="titleArCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="titleAr" class="col-sm-2 col-form-label">Title Arabic</label>
										 <div class="col-sm-8">
											<input type="text" name="name_ar" class="form-control" id="titleAr" placeholder="Title Arabic">
										 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Description</label>
					<div class="col-md-9 bg-tran">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#descEnCat" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#descArCat" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="descEnCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="DescEn" class="col-sm-2 col-form-label">Description English</label>
										 <div class="col-sm-8">
											<textarea class="summernote-editor" id="DescEn" name="description_en"></textarea>
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="descArCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="DescAr" class="col-sm-2 col-form-label">Description Arabic</label>
										 <div class="col-sm-8">
											<textarea class="summernote-editor" id="DescAr" name="description_ar"></textarea>
										 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="order" class="col-sm-2 col-form-label">Order</label>
					<div class="col-sm-8">
						<input type="number" name="order" class="form-control" id="order" placeholder="Order">
					 </div>
				  </div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Action</h4>
				  <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD</button>
				  <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">DELETE</button>
				  <button type="button" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</button>
			   </div>
			</div>
		</div>
	</form>
@endsection