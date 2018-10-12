<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Web Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="{{asset('img/favicon-32x32.png')}}" type="image/png" rel="icon" sizes="32x32" >
	<link href="{{asset('adminwebskp/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('adminwebskp/build/css/util.css')}}" rel="stylesheet">
	<link href="{{asset('adminwebskp/build/css/main.css')}}" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

					@csrf

					<span class="login100-form-title p-b-70">
						Login To Web Admin
					</span>

					<span class="login100-form-avatar">
						<img src="{{asset('img/web-sumbawa4x.png')}}" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<label for="email"></label>
						<input type="text" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
						@if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<label for="pass"></label>
						<input type="password" name="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
						@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<input class="txt1 form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="txt2 form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
						</li>
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								{{ __('Forgot Your Password?') }}
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>


</body>
</html>