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



    <title>@yield('title', 'Home') | Blog Appear</title>
</head>
<body>

<header>

</header>

       @yield('content')

    <footer>
        <hr>
        Todos los derechos reservados &copy {{date('Y')}}
        <div class="pull-right"> Sergio Appear</div>
    </footer>


<!-- Scripts -->
<!-- jQuery 2.1.4 -->
<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
{!! Html::script('assets/js/bootstrap.js') !!}


@yield('js')
</body>
</html>