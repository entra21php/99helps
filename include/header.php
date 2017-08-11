<!DOCTYPE html>
<html lang="<?=IDIOMA?>">
	<head>
	<meta charset="<?=CODIFICACAO?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=TITULO?></title>

	<!-- Bootstrap 4 alpha 6 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<!-- Bootstrap 4 Oficial-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
	<!-- Font Awesome -->
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Estilos -->
	<link href="css/estilos.css" rel="stylesheet">
	<link href="css/media.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-primary">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
				<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11">
					<a class="navbar-brand" href="#">99helps</a>
				</div>
				<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<button type="button" class="btn btn-success dropdown-toggle" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrar</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropLink">
									<h6 class="dropdown-header">SEUS DADOS</h6>
									<a class="dropdown-login" href="#">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">
											<div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
											<input id="email" name="email" type="email" placeholder="joao@net.br" class="form-control">
										</div>
									</a>
									<a class="dropdown-login">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">
											<div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true">&nbsp;</i></div>
											<input type="password" placeholder="********" class="form-control" id="senha">
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-login">
										<button type="button" href="#" class="btn btn-success" id="btn-entrar">Entrar</button>
										<button type="button" href="#" class="btn btn-secundary" id="btn-entrar">Cadastre-se</button>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>