<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	# Verifica login
	if (isset($_POST['btn-entrar'])) {
		if (!(empty($_POST['email'])) && !(empty($_POST['senha']))) {
			// Receber dados
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$senha_crypt = hash('sha512',$senha);

			// Verifica no banco o login
			$sqlConfere = "SELECT * FROM usuarios_fisico WHERE email='$email' AND senha='$senha_crypt'";
			$consultaConfere = mysql_query($sqlConfere);
			$rsConfere = mysql_fetch_array($consultaConfere);

			// Pessoa existe e senha confere
			if (mysql_num_rows($consultaConfere)>0) {
				// Cria sessão de logado
				$_SESSION["logado"] = "sim";
				$_SESSION["id_usuario"] = $rsConfere['id'];
				$_SESSION["nome_usuario"] = $rsConfere['nome'];
				$_SESSION["img_perfil"] = $rsConfere['imagem_perfil'];
			} else {
				// Não autenticar
				session_start();
				session_destroy();
			}
		}
	}


	# Verifica logout
	if (isset($_GET['sair'])) {
		session_destroy();
		session_start();
		header("Location: index.php");
		die();
	}

	# Pega a página atual
	$pagina_atual = $_SERVER['PHP_SELF'];
	$pagina_atual = explode('/', $pagina_atual);
	$pagina_atual = end($pagina_atual);
	
?>
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
	<?php
		if ((isset($_SESSION["logado"])) && ($_SESSION["logado"]=="sim"))  {
	?>
	<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-primary">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 logotipo_99">
				<ul class="navbar-nav menu">
					<li class="nav-item">
						<a class="nav-link" href="index.php"><img src="images/logo.png"></a>
					</li>
					<form class="form-inline my-2 col-5">
						<div class="col-lg-12">
							<div class="input-group">
								<input type="text" class="form-control menu_busca" placeholder="Buscar por...">
								<span class="input-group-btn">
									<button class="btn btn-secundary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
								</span>
							</div>
						</div>
					</form>
				</ul>		
			</div>
			<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<button type="button" class="btn btn-primary dropdown-toggle foto_menu" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?=(file_exists("uploads/".$_SESSION["img_perfil"])) ? '<img src="uploads/'.$_SESSION["img_perfil"].'" class="rounded">&nbsp;&nbsp;' : '<img src="images/foto_padrao.png" class="rounded">&nbsp;&nbsp;';?>
							</button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropLink">
								<h6 class="dropdown-header">OLÁ <?=mb_convert_case($_SESSION["nome_usuario"], MB_CASE_UPPER, 'UTF-8');?></h6>
								<a class="dropdown-login" href="usuario.php?ver=<?=$_SESSION["id_usuario"]?>&acao=informacoes">Meu perfil</a>
								<a class="dropdown-login" href="evento.php">Meus eventos</a>
								<a class="dropdown-login" href="instituicao.php">Instituições</a>
								<div class="dropdown-divider"></div>
								<div class="dropdown-login">
									<a href="?sair"><button type="submit" class="btn btn-sm btn-danger" id="btn-entrar" name="btn-entrar">Sair</button></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav><br><br><br>
	<?php
		} else {
	?>	
	<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-primary">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 logotipo_99">
				<a class="nav-link" href="index.php"><img src="images/logo.png"></a>
			</div>
			<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<button type="button" class="btn btn-success dropdown-toggle" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrar</button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropLink">
								<form name="logar" method="POST" action="#">
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
											<input type="password" name="senha" placeholder="********" class="form-control" id="senha">
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<div class="dropdown-login">
										<input type="submit" class="btn btn-success" id="btn-entrar" name="btn-entrar" value="Entrar">
										<a href="usuario.php?add"><button type="button" class="btn btn-secundary" id="btn-cadastrar">Cadastre-se</button></a>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav><br><br><br>
	<?php
		// Pagina atual + ?add
		$pagina_atual = $pagina_atual . '?add';

		// die() se pagina != usuario.php?add
		if ($pagina_atual!="usuario.php?add") {
			include("institucional.php");
			die();
		}
		}
	?>
