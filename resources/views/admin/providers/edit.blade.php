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
    <form class="form-horizontal" action="{{route('providers.update', $provider->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@method('put')
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label class="col-2 col-form-label">Categories</label>
						<div class="col-8">
							<select class="form-control" name="category_id">
							 <option disabled selected hidden>-- Select Categories --</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}"	
									@if($category->id == $provider->category_id)
									selected
									@endif
									>{{$category->name_en}}</option>
								@endforeach
							</select>
						</div>
				  </div>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Provider Title</label>
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
											<input type="text" name="name_en" value="{{$provider->name_en}}" class="form-control" id="titleEn" placeholder="Title English">
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="titleArCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="titleAr" class="col-sm-2 col-form-label">Title Arabic</label>
										 <div class="col-sm-8">
											<input type="text" name="name_ar" value="{{$provider->name_ar}}" class="form-control" id="titleAr" placeholder="Title Arabic">
										 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>	  
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image</label>
						<div class="col-md-3"><input type="file" name="image"></div>
						<div class="col-md-3">
							<img src="{{$provider->getFirstMediaUrl('provider', 'thumb')}}">
						</div>
						<div class="col-md-2">
							<input type="checkbox" name="delete_existing_image" value="1">
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
								<div role="tabpanel" class="tab-pane show active" id="descEnCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="DescEn" class="col-sm-2 col-form-label">Description English</label>
										 <div class="col-sm-8">
											<textarea class="summernote-editor" id="DescEn" name="description_en">{!!$provider->description_en!!}</textarea>
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="descArCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="DescAr" class="col-sm-2 col-form-label">Description Arabic</label>
										 <div class="col-sm-8">
											<textarea class="summernote-editor" id="DescAr" name="description_ar">{!!$provider->description_ar!!}</textarea>
										 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Address</label>
					<div class="col-md-9 bg-tran">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#addressEnCat" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#addressArCat" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="addressEnCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="addressEn" class="col-sm-2 col-form-label">Title English</label>
										 <div class="col-sm-8">
											<input type="text" name="address_en" value="{{$provider->address_en}}" class="form-control" id="addressEn" placeholder="Address English">
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="addressArCat">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="addressAr" class="col-sm-2 col-form-label">Title Arabic</label>
										 <div class="col-sm-8">
											<input type="text" name="address_ar" value="{{$provider->address_ar}}" class="form-control" id="addressAr" placeholder="Address Arabic">
										 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
					<div class="col-sm-8">
						<input type="text" name="longitude" value="{{$provider->longitude}}" class="form-control" id="longitude" placeholder="Longitude">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
					<div class="col-sm-8">
						<input type="text" name="latitude" value="{{$provider->latitude}}" class="form-control" id="latitude" placeholder="Latitude">
					 </div>
				  </div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="tags" class="col-sm-2 col-form-label">Tags</label>
						<div class="col-sm-8">
							<input type="text" name="tag_list" value="{{$provider->tag_list}}" data-role="tagsinput" placeholder="add tags"/>
						</div>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Action</h4>
					<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
					<button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">DELETE</button>
					<a href="{{route('providers.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>   
	</form>
@endsection