
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đổi mật khẩu | DEV</title>

    <link rel="icon" type="image/x-icon" href="https://res.cloudinary.com/practicaldev/image/fetch/s--E8ak4Hr1--/c_limit,f_auto,fl_progressive,q_auto,w_32/https://dev-to.s3.us-east-2.amazonaws.com/favicon.ico" />
	<!--STYLESHEET-->
	<!--=================================================-->

	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">


	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="{{ asset('backend/css/nifty.min.css') }}" rel="stylesheet">


	<!--Font Awesome [ OPTIONAL ]-->
	<link href="{{ asset('backend/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">


	<!--Demo [ DEMONSTRATION ]-->
	<link href="{{ asset('backend/css/demo/nifty-demo.min.css') }}" rel="stylesheet">




	<!--SCRIPT-->
	<!--=================================================-->

	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="{{ asset('backend/plugins/pace/pace.min.css') }}" rel="stylesheet">
	<script src="{{ asset('backend/plugins/pace/pace.min.js')}}"></script>



	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="cls-container">

		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img img-balloon"></div>


		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="{{url('admin')}}">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title">DEV <span class="text-thin">Admin</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->

		@include('layout.mesage')
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Xác nhận đổi mật khẩu</p>
					<form action="{{url('admin/confirm-forget-password')}}" method="POST">
                        @csrf
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
								<input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="text" name="password_new" class="form-control" placeholder="Password mới">
							</div>
						</div>
                        <div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="text" name="token"  value="{{old('token')}}"  class="form-control" placeholder="Token">
							</div>
						</div>
						<div class="mar-btm"><em>- - -</em></div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">
							Xác nhận
						</button>
					</form>
				</div>
			</div>
			<div class="pad-ver">
				<a href="{{url('admin/login')}}" class="btn-link">Trở về login?</a>
			</div>
		</div>
		<!--===================================================-->


		<!-- DEMO PURPOSE ONLY -->
		<!--===================================================-->
		<div class="demo-bg">
			<div id="demo-bg-list">
				<div class="demo-loading"><i class="fa fa-refresh"></i></div>
				<img class="demo-chg-bg bg-trans" src="{{ asset('backend/img/bg-img/thumbs/bg-trns.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-1.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg active" src="{{ asset('backend/img/bg-img/thumbs/bg-img-2.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-3.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-4.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-5.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-6.jpg')}}" alt="Background Image">
				<img class="demo-chg-bg" src="{{ asset('backend/img/bg-img/thumbs/bg-img-7.jpg')}}" alt="Background Image">
			</div>
		</div>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->



	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<script src="{{ asset('backend/js/jquery-2.1.1.min.js')}}"></script>


	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>


	<!--Fast Click [ OPTIONAL ]-->
	<script src="{{ asset('backend/plugins/fast-click/fastclick.min.js')}}"></script>


	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="{{ asset('backend/js/nifty.min.js')}}"></script>


	<!--Background Image [ DEMONSTRATION ]-->
	<script src="{{ asset('backend/js/demo/bg-images.js')}}"></script>


	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->


</body>
</html>
