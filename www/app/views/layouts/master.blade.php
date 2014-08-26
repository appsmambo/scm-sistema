<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SCM PERÚ</title>
		<link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
		<!-- http://iconifier.net/ -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="{{ url() }}/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="57x57" href="{{ url() }}/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ url() }}/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ url() }}/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ url() }}/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ url() }}/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ url() }}/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ url() }}/apple-touch-icon-152x152.png">
		<!-- Bootstrap -->
		<link href="{{ url() }}/css/bootstrap.min.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistema de Control</a>
			</div>
			{{-- @if (Session::has('userAuth')) --}}
			<div class="navbar-collapse collapse navbar-inverse-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ url() }}/empresa">Empresas</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url() }}/alumno">Listar</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Tablas</li>
							<li><a href="{{ url() }}/tipo-conductor">Tipo de conductor</a></li>
							<li><a href="{{ url() }}/operacion">Operación</a></li>
						</ul>
					</li>
					<li><a href="{{ url() }}/cursos">Cursos</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Hola, {{-- Auth::user()->name --}}</a></li>
					<li><a href="{{ url() }}/logout">Salir</a></li>
				</ul>
				{{-- @endif --}}
			</div>
		</div>
		<div class="container">
			@yield('content')
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{ url() }}/js/bootstrap.min.js"></script>
		<script src="{{ url() }}/js/matriz.js"></script>
	</body>
</html>