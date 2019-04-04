@extends('layouts.header')
@section('content')
      <div class="page-title image-title" style="background-image:url({{asset('assets/img/destination.jpg')}});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>Register</h2>
               <p><a href="/" class="theme-cl">Home</a> |<span> Register</span></p>
            </div>
         </div>
      </div>
	  
	  <section class="gray-bg">
			<div class="container">
				<div class="row">
				<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 col-sm-8">
						<div class="form-box border-form">
							<form class="c-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-sm-12">
										<label for="first_name">{{ __('Image') }}</label>
										<input id="avatar" type="file" class="form-control" name="avatar"  placeholder="Avatar">
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<label for="first_name">{{ __('First Name') }}</label>
										<input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required>
										@if ($errors->has('first_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
									</div>
									
									<div class="col-sm-6">
										<label for="last_name">{{ __('Last Name') }}</label>
										<input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>
										@if ($errors->has('last_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('last_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<label for="email">{{ __('E-Mail Address') }}</label>
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
										@if ($errors->has('email'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
									<div class="col-sm-6">
										<label for="phone">{{ __('Phone Number') }}</label>
										<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
										@if ($errors->has('phone'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<label for="password">{{ __('Password') }}</label>
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
									<div class="col-sm-6">
										<label for="password-confirm">{{ __('Confirm Password') }}</label>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label for="country">{{ __('Country') }}</label>
										<input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>
										@if ($errors->has('country'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('country') }}</strong>
											</span>
										@endif
									</div>
									<div class="col-sm-6">
										<label for="date">{{ __('Date of Birth') }}</label>
										<input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date') }}" required>
										@if ($errors->has('date'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('date') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<button type="submit" class="btn theme-btn btn-arrow register-btn">{{ __('Register') }}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div>
			</div>
		</section>
@endsection