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
	<form class="form-horizontal" action="{{route('plans.store')}}" method="POST" data-parsley-validate novalidate>
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
				  <div class="row translate-bg">
					<label class="col-sm-3 col-form-label tran-title bg-tran">Plan Title</label>
					<div class="col-md-9 bg-tran">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#titleEnPlan" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#titleArPlan" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="titleEnPlan">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="titleEn" class="col-sm-2 col-form-label">Title English</label>
										 <div class="col-sm-8">
											<input type="text" name="name_en" class="form-control" id="titleEn" placeholder="Title English">
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="titleArPlan">
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
								<a href="#descEnPlan" data-toggle="tab" aria-expanded="false" class="nav-link active">
									English
								</a>
							</li>
							<li class="nav-item">
								<a href="#descArPlan" data-toggle="tab" aria-expanded="true" class="nav-link">
									Arabic
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12">
						 <div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane show active" id="descEnPlan">
									<div class="form-group row">
										<div class="col-md-1"></div>
										 <label for="DescEn" class="col-sm-2 col-form-label">Description English</label>
										 <div class="col-sm-8">
											<textarea class="summernote-editor" id="DescEn" name="description_en"></textarea>
										 </div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="descArPlan">
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
					<label for="points" class="col-sm-2 col-form-label">Points</label>
					<div class="col-sm-8">
						<input type="text" name="points" class="form-control" id="points" placeholder="Points">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="price" class="col-sm-2 col-form-label">Price</label>
					<div class="col-sm-8">
						<input type="text" name="price" class="form-control" id="price" placeholder="Price">
					 </div>
				  </div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Action</h4>
				  <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">SAVE</button>
				  <a href="{{route('plans.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection