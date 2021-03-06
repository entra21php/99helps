<?php
$sql = "SELECT * ,cidades.cidadenome FROM evento LEFT JOIN cidades ON cidades.id=evento.fk_cidade WHERE evento.id=" . $id;

$consulta = mysql_query($sql);	
$rs = mysql_fetch_array($consulta);
?>
<section class="row destaque">
	<div class="container">
		<div class="row">
			<div style="background:url('uploads/<?=$rs['foto_capa']?>');background-size: 100% auto; background-position: center; height: 410px;" class="col-12 img-perfil-evento" >
				<!-- <img src="images/images.jpg" class="img-perfil-evento"> -->&nbsp;
				<div class="titulo_evento">
					<h3><?=$rs['titulo']?></h3>
				</div>
			</div>
			<div class="col-12 perfil_evento">
			</div>
		</div>
	</div>
</section>

<section class="row bg-primary">
	<div class="container">
		<div class="row" style="padding: 10px 0 0 0;">
			<ul class="nav nav-tabs col-5" style="margin-bottom: -1px; line-height: 35px;">
				<li class="nav-item" style="padding-left: 5px;">
					<a class="nav-link <?=($_GET['acao']=='informacoes')?"active":"text-white"?>" href="evento.php?ver=<?=$id?>&acao=informacoes">Informações</a>
				</li>
				<li class="nav-item" style="padding-left: 5px;">
					<a class="nav-link <?=($_GET['acao']=='voluntarios')?"active":"text-white"?>" href="evento.php?ver=<?=$id?>&acao=voluntarios">Volutários participantes</a>
				</li>
			</ul>
			<div class="dropdown-confirmar col-2">
				  <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Participar
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="?confirmacao=confirmado&id_evento=<?=$_GET['ver']?>">Confirmar</a></li>
				    <li><a href="?confirmacao=interessado&id_evento=<?=$_GET['ver']?>">Interessado</a></li>
				    <li><a href="?confirmacao=nao&id_evento=<?=$_GET['ver']?>">Não participar</a></li>
				  </ul>
			</div>
			<div class="col-5 text-right">
				<a href="evento.php?edt=<?=$id?>"><button type="button" class="btn btn-secundary">Editar evento</button></a>&nbsp;
				<a href="evento.php?del=<?=$id?>&titulo=<?=$rs['titulo']?>"><button type="button" class="btn btn-danger">Excluir evento</button></a>
			</div>
		</div>	
	</div>	
</section>		
<?php
	# Exibir a página de infomações
if ((isset($_GET['acao'])) && (($_GET['acao'])=="informacoes")) {
	?>
	<!-- PÁGINA DE INFORMAÇÕES -->
	<section class="row">
		<div class="container">
			<div class="col-12 perfil_instituicao">
				<div class="row">
					<div class="col-12 col-md-4" style="margin-top: 15px;">
						<div class="card">
							<div class="card-block">
								<h5 class="card-title" style="margin-bottom: 8px !important;">Data do evento</h5>
								<h4 class="card-text text-primary text-center">
									<?=ParseDate($rs['data'],'d/m/Y H:i');?>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4" style="margin-top: 15px;">
						<div class="card">
							<div class="card-block">
								<h5 class="card-title" style="margin-bottom: 8px !important;">Voluntários confirmados</h5>
								<h4 class="card-text text-success text-center">
									<?php
									$res = mysql_fetch_array(mysql_query("SELECT count(*) FROM evento_usuarios WHERE  confirmacao='Confirmado'"));
									echo $res[0];
									?>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4" style="margin-top: 15px;">
						<div class="card">
							<div class="card-block">
								<h5 class="card-title" style="margin-bottom: 8px !important;">Voluntários interessados</h5>
								<h4 class="card-text text-warning text-center">
									<?php
									$res = mysql_fetch_array(mysql_query("SELECT count(*) FROM evento_usuarios WHERE confirmacao='Interessado'"));
									echo $res[0];
									?>
								</h3>
							</div>
						</div>
					</div>	
				</div>

				<h3 style="margin-top: 30px;">Descrição do evento</h3>
				<p><?=$rs['descricao']?></p>

				<h3 style="margin-top: 30px;">Localização</h3>
				<p><?=$rs['logradouro']?>, <?=$rs['numero']?> - <?=$rs['cidadenome']?>/<?=$rs['estado']?></p>
				<p>
					<div id="map"></div>
					<script>
						function initMap() {
							var uluru = {lat: -26.9187, lng: -49.066};
							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 18,
								center: uluru
							});
							var marker = new google.maps.Marker({
								position: uluru,
								map: map
							});
						}
					</script>
					<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw642B70Ciimv6sw7wFiUHALYa3gOFjJA&callback=initMap">
				</script></p>
			</div>
		</div>		
	</section>		
	<?php 
}

if ((isset($_GET['acao'])) && (($_GET['acao'])=="voluntarios")) {
	?>
	<!-- PÁGINA VOLUNTÁRIOS PARTICIPANTES-->
	<section class="row">
		<div class="container">
			<div class="row">
				<?php 
					// SELECT QUE PUXA SOMENTE OS USUARIOS DA ONG QUE ESTA ACESSANDO
				$sql = "SELECT usuarios_fisico.id,usuarios_fisico.nome,confirmacao FROM evento_usuarios LEFT JOIN usuarios_fisico ON usuarios_fisico.id=evento_usuarios.fk_usuario WHERE fk_evento=".$id ." ORDER BY 3";
				$consulta = mysql_query($sql);
				while ($rs = mysql_fetch_array($consulta)) {
					?>
					<div class="col-12 col-md-3" style="margin-top: 30px;">
						<div class="card">
							<img class="card-img-top img-fluid" src="images/evento1.jpg">
							<div class="card-block text-center">
								<h4 class="card-title" style="margin-bottom: 8px !important;"><?=$rs['nome']?></h4>
								<p class="card-text">
									<?php 
									if ($rs['confirmacao']=="Confirmado") {
										echo '<span class="badge badge-success">Confirmado</span>';
									} elseif ($rs['confirmacao']=="Interessado") {
										echo '<span class="badge badge-warning">Interessado</span>';
									} else {
										echo '<span class="badge badge-danger">Não comparecerá</span>';
									}
									?>
								</p>
								<!-- PASSAR PARAMETRO PARA IR PARA O PERFIL DO EVENTO -->
								<a href="usuario_perfil.php" class="btn btn-sm btn-primary top8">Ver perfil <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<br>		
		</div>
	</section>
	<?php 
}
?>
