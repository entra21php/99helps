<?php
	# HEADER
	require_once("include/header.php");
?>
	<br>
	<br>
	<br>
	<h1>MENU QUANDO SESSÃO LOGADO = ATIVA</h1>
	<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
				<a class="navbar-brand" href="#">99helps</a>
			</div>
			<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active"><a class="nav-link" href="#">Explore eventos <span class="sr-only">(current)</span></a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">João de Paula</a>
							<div class="dropdown-menu" aria-labelledby="dropLink">
								<!-- <h6 class="dropdown-header">EXPLORE</h6> -->
								<a class="dropdown-item" href="#">Meu perfil</a>
								<a class="dropdown-item" href="#">Meu calendário</a>
								<a class="dropdown-item" href="#">Contribuições</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Gerenciar instituições</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<br>
	<br>
	<br>
	
<?php
	# FOOTER
	require_once("include/footer.php");
?>