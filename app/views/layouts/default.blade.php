<!DOCTYPE html>
<html lang="@yield('lang', 'es-MX')" id="extr-page">
	<head>
		
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title> @yield('title')</title>
		<meta name="description" content="@yield('description')"/>
		<meta name="author" content="@yield('author', 'Cristian Jaramillo')"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}"/>
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}"/>

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}"/>
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}"/>
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}"/>

		<!-- SmartAdmin RTL Support is under construction-->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-rtl.min.css') }}"/>

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/demo.min.css') }}"/>

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"/>

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="{{ asset('img/splash/sptouch-icon-iphone.png') }}"/>
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/splash/touch-icon-ipad.png') }}"/>
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/splash/touch-icon-iphone-retina.png') }}"/>
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/splash/touch-icon-ipad-retina.png') }}"/>

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)"/>
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)"/>
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)"/>

	</head>
	<body>
		
		@section('header')
		<header id="header">

			<div id="logo-group">
				<span id="logo"> <img src="{{ asset('img/logo.png') }}" alt="SmartAdmin"> </span>
			</div>
			<span id="extr-page-header-space">
			@if(Auth::guest())
				<a href="{{ route('login') }}" class="btn btn-primary">Login</a>
				<a href="{{ route('sign-up') }}" class="btn btn-danger">Create account</a>
			@else
				<a href="{{-- route('dashboard') --}}" class="btn btn-primary">Dashboard</a>
				<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
			@endif
			</span>
		</header>
		@show

		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<!-- MAIN CONTENT -->
			<div id="content" class="container">
				<!-- APP -->
				@yield('app')
				<!-- END APP -->
			</div>
		</div>
		<!-- END MAIN PANEL -->

		@section('footer')
			<!-- FOOTER PANEL -->
			<!-- END FOOTER PANEL -->
		@show

		<!--================================================== -->	

		@section('script')
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{ asset('js/libs/jquery-2.1.1.min.js') }}"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ asset('js/app.config.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

		<!--[if IE 8]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('js/app.min.js') }}"></script>

		@show

	</body>
</html>