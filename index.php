<?php
	# CLASSE PRINCIPAL
	require_once("classes/site.class.php");
	$site = new Site($hef=true);
	
	if (!isset($_SESSION["logado"])) {
		include("institucional.php");
	} else {
		?>
		<section class="row">
			<div class="container">
				<div class="col-12 perfil_usuario">
					<div class="row">
						<?php
					// MELHORAR ESSE SELECT DE ACORDO COM O INSERT DA IMG E DESCRIÇÃO
					// O WHERE DESSE SELECT SERÁ REFERENTE AO ID DA SESSAO LOGADA NA PLATAFORMA
			$sql = "SELECT fk_evento FROM evento_usuarios WHERE fk_usuario =" .$_SESSION["id_usuario"];
			$consulta = mysql_query($sql);
			while ($res = mysql_fetch_array($consulta)) {
				$sqlEvento = "SELECT * FROM evento WHERE id =" . $res['fk_evento'];
				$consultaEvento = mysql_query($sqlEvento);
				$rs = mysql_fetch_array($consultaEvento);

				?>
				<div class="card">
					<div class="card-block">
						<div class="row">
							<div class="col-12 col-md-4">
								<img src="images/<?=$rs['foto_capa']?>" class="img-fluid img-thumbnail">
							</div>
							<div class="col-12 col-md-8">
								<p>
									<h4 class="card-title top8"><?=$rs['titulo']?></h4>
									<?php 
									print(limitarTexto($rs['descricao'], $limite = 25));
									?>
								</p>
								<a href="evento.php?ver=<?=$rs['id']?>&acao=informacoes" class="btn btn-primary top8">Detalhes <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
							</div>
						</div>
					</div>
				</div><br>
				<?php 
			}
			if (mysql_num_rows($consulta)==0) {
				?>
				<div class="card">
					<div class="card-block text-center">
						<h4 class="card-title">Você não participa de nenhum evento =(</h4>
						<p class="card-text">Parece que você não tem muita intimidade com nossa plataforma ainda. Procure por eventos e solicite para participar dos eventos, ou então veja como criar um evento abaixo.</p>
						<a href="?add" class="btn btn-secondary top8">Procurar eventos <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
					</div>
				</div><br>
				<?php 
			}
			?>
					</div>
				</div>
			</div>		
		</section>
<?php
	$site->__destruct();
}
?>
