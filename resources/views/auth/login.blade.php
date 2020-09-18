<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pramuka Mojokerto</title>
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{!! asset('images/icons/favicon.ico') !!}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('fonts/iconic/css/material-design-iconic-font.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animate/animate.css') !!}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/css-hamburgers/hamburgers.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animsition/css/animsition.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/select2/select2.min.css') !!}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/daterangepicker/daterangepicker.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/util.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/main.css') !!}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-kwarcab.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="{{ url('/login') }}">
                {!! csrf_field() !!}
					<span class="login100-form-title p-b-49">
						Pramuka Mojokerto
                    </span>

					<div class="wrap-input100 validate-input m-b-23 has-feedback {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Silahkan Masukkan Email">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input has-feedback{{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Silahkan Masukkan Password">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
					</div>
					
					<div class="text-right p-t-8 p-b-21">

					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
                    </div>

					<div class="flex-col-c p-t-25">
						<span class="txt1 p-b-15">
							Belum mempunyai akun?
						</span>

						<a href="{!! url('/register') !!}" class="txt2">
							Daftar Disini
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{!! asset('vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('vendor/bootstrap/js/popper.js') !!}"></script>
	<script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('vendor/select2/select2.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script>
	<script src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('vendor/countdowntime/countdowntime.js') !!}"></script>
<!--===============================================================================================-->
    <script src="{!! asset('js/main.js') !!}"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

</body>
</html>