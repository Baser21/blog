<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Styles -->
	<link href="/css/app.css" rel="stylesheet">
	{!! Html::style('assets/css/bootstrap.css') !!}
	{!! Html::style('assets/plugins/chosen/chosen.css') !!}
	{!! Html::style('assets/plugins/trumbowyg/ui/trumbowyg.css') !!}


	<title>@yield('title', 'Default')</title>
</head>
<body>

	@include('admin.template.partials.nav')

	<section>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					@include('flash::message')
					@include('admin.template.partials.errors')
					@yield('content')
				</div>
			</div>
		</div>
	</section>	
	

	


	<!-- Scripts -->
	<!-- jQuery 2.1.4 -->
	<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
	{!! Html::script('assets/js/bootstrap.js') !!}
	<!-- CHOSEN -->
	{!! Html::script('assets/plugins/chosen/chosen.jquery.js') !!}
	{!! Html::script('assets/plugins/trumbowyg/trumbowyg.js') !!}


	@yield('js')
</body>
</html>