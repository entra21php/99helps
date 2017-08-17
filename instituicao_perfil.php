	<?php
		#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA
		// Exibir a página html do perfil da instituição, com paragrafo h1, tudo bonito...
		// Será usando o php aqui somente para indexar os resultados e exibições
		// mas somente de maneira resumida, ex:
		// <?=$res['resultado_mysql']?_>

		// As verificações em php serão feitas na metódo da classe que chama este arquivo

	require_once("include/header.php");
		// $id 				= $_GET['id'];		
		// $nome_fantasia 		= $_POST['nome_fantasia'];	
		// $causa_defendida 	= $_POST['causa_defendida'];
		// $razao_social 		= $_POST['razao_social'];
		
	$sql = "SELECT nome_fantasia, razao_social, foto FROM instituicao WHERE id = " . $id ;
	$consulta = mysql_query($sql);	
		?>

		<div class="container-fluid">
			<div class="col-md-12 col-lg-12 text-center destaque1">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center fotinha">
				    <?php if ($_GET['id'] == $id) {
				    	?>
				    <h3><!-- <?=$rs['$nome_fantasia']?> -->Aqui!</h3>
				    <p>
				      <img src="images/123.png" alt="" class="textinho">
					</p>
				    	
				    <?php
				    }else{
				    ?>
				    	<a href="instituicao_form.php"><h3><!-- <?=$rs['$nome_fantasia']?> -->Aqui!</h3></a>	
				    <p>
				      <a href="instituicao_form.php"><img src="images/123.png" alt="" class="textinho"></a>
					</p>
				    				    			    
				    <?php
					}
					?>
					
				    <!--  <br>
				    <input type="submit" name="enviar" value="Editar Foto" class="btn btn-info button">  --> 
				</div>
				<br>
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  			<!-- <div class="btn-group" role="group">
		    			<button type="button" class="btn btn-justified">Admin Perfil</button>
		  			</div> -->
		  			<div class="btn-group" role="group">
		   			 	<button type="button" class="btn btn-justified">Ver Integrantes</button>
		  			</div>
		  			<!-- <a href="#"><button type="button" class="btn btn-outline-primary">Saiba mais</button></a> -->
		  			<!-- <div class="btn-group" role="group">
		    			<button type="button" class="btn btn-justified">Eventos</button>
				  	</div> -->
				</div>
			</div>		
		</div>

	<?php

		// Descrição da ong com php
	if ($_GET['id'] == $id) {
		?> 
		
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jumbotron text-center">
	  <h1>
	 	Descrição da ONG(<?=$rs['causa_defendida']?>)
	  </h1>
	  <p>
	  	<?=$rs['razao_social']?>
	  </p>
	  <p>
	  	<a class="btn btn-outline-primary btn-lg" href="#" role="button">Participe</a>
	  </p>
	</div>
		
	<?php

	} else {
		
		?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<form method="POST" action="instituicao_form.php" name="editar">
			<input type="hidden" name="id" value="<?=$rs['id']?>">
			<button type="submit" class="btn btn-outline-primary" name="editar"> 
					<span aria-hidden="true">Editar Perfil</span>
			</button>
<!-- 
		<input type="submit" action="instituicao.php?acao=delete" value="Excluir Perfil" name="excluir" class="btn btn-outline-danger">
	 -->
	
		<form method="POST" action="#" name="excluir">
			<input type="hidden" name="id" value="<?=$rs['id']?>">
			<button type="submit" class="btn btn-outline-danger" name="excluir"> 
					<span aria-hidden="true">Excluir Perfil</span>
			</button>
		</form>
		</form>

	</div>
	<?php echo "$razao_social";
	 }
		
	?>

		<?php
		require_once("include/footer.php")
		?>
