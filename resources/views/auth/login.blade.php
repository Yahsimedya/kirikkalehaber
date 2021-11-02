<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('backend/global_assets/js/main/jquery.min.js')}}   "></script>
	<script src="{{asset('backend/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('backend/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('backend/global_assets/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Hesabınıza Giriş Yapın</h5>
								{{-- <span class="d-block text-muted">Your credentials</span> --}}
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" id="email"  name="email" :value="old('email')" required autofocus placeholder="Kullanıcı Adı">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" id="password" value="{{ __('Password') }}" name="password"  placeholder="Parola" required autocomplete="current-password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<div class="form-check mb-0">
									<label class="form-check-label" id="remember_me">
										<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
										{{ __('Remember me') }}
									</label>
								</div>
                                @if (Route::has('password.request'))

								<a href="{{ route('password.request') }}" class="ml-auto">Parolamı Unuttum?</a>
                                @endif

							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Giriş Yap <i class="icon-circle-right2 ml-2"></i></button>
							</div>





							{{-- <div class="form-group">
								<a href="#" class="btn btn-light btn-block">Sign up</a>
							</div> --}}

							{{-- <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> --}}
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
