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
				<div class="col-md-4">&nbsp;</div>
					<div class="col-md-4 col-sm-4">
						@if (session('status'))
							<div class="alert alert-danger">
							  {{ session('status') }}
							</div>
						@endif  
						<br>
						<div class="form-box border-form">
							<form class="c-form" method="POST" action="{{ route('front.doLogin') }}">
								@csrf
								<div class="row">
									<div class="col-sm-12">
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
									<div class="col-sm-12">
										<label for="password">{{ __('Password') }}</label>
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<input type="hidden" name="plan_id" value="{{ session('plan_id') }}" />

								<div class="row">
									<div class="col-sm-12">
										<button type="submit" class="btn theme-btn btn-arrow register-btn">{{ __('Login') }}</button>
										<a href="{!! route('register') !!}?plan_id={!! session('plan_id') !!}" class="text-center">&nbsp; Register a new membership</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4">&nbsp;</div>
				</div>
			</div>
		</section>
@endsection