@extends('layouts.header')
@section('content')
      <div class="page-title image-title" style="background-image:url({{asset('assets/img/destination.jpg')}});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>Login</h2>
               <p><a href="/" class="theme-cl">Home</a> |<span> Login</span></p>
            </div>
         </div>
      </div>
	  
	  <section class="gray-bg">
			<div class="container">
				<div class="row">
				<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 col-sm-8">
						<div class="form-box border-form">
							<form class="c-form" method="POST" action="{{ route('front.doLogin') }}">
								@csrf
								@if (session('status'))
									<div class="alert alert-error">
									  {{ session('status') }}
									</div>
								@endif  

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
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<button type="submit" class="btn theme-btn btn-arrow register-btn">{{ __('Login') }}</button>
										or <a href="{!! route('register') !!}">Sign up</a>
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