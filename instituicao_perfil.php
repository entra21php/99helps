	<?php
		#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA
		// Exibir a página html do perfil da instituição, com paragrafo h1, tudo bonito...
		// Será usando o php aqui somente para indexar os resultados e exibições
		// mas somente de maneira resumida, ex:
		// <?=$res['resultado_mysql']?_>

		// As verificações em php serão feitas na metódo da classe que chama este arquivo

	require_once("include/header.php");

		
		$nome_fantasia 		= $_POST['nome_fantasia'];	
		$id 				= $_GET['id'];		
		$causa_defendida 	= $_POST['causa_defendida'];
		$razao_social 		= $_POST['razao_social'];
		
		?>

		<div class="container-fluid">
			<div class="col-md-12 col-lg-12 text-center destaque1">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center fotinha">
				    <h3><?=$rs['$nome_fantasia']?></h3>
				    <a href="instituicao_perfil.php" class="thumbnail">
				      <p>
				      <img src="images/123.png" alt="">
					  </p>		    
				    </a>
				   <!--  <br>
				    <input type="submit" name="enviar" value="Editar Foto" class="btn btn-info button">  --> 
				</div>
				<br>
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  			<!-- <div class="btn-group" role="group">
		    			<button type="button" class="btn btn-justified">Admin Perfil</button>
		  			</div> -->
		  			<div class="btn-group" role="group">
		   			 	<button type="button" class="btn btn-outline-primary">Integrantes</button>
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
	if ($_GET['id'] != $id) {
		echo "$razao_social";
		?> 
		
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jumbotron">
	  <h1>
	 	Descrição da ONG(<?=$rs['causa_defendida']?>)
	  </h1>
	  
	  <p>
	  	<?=$rs['razao_social']?>
	  </p>
	
	  <p>
	  	<a class="btn btn-primary btn-lg" href="#" role="button">Participe</a>
	  </p>
	</div>
		
	<?php

	} else {
		
		?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
		<input type="submit" action="instituicao.php?acao=edit" value="Editar Perfil" name="editar" class="btn btn-primary">

		<input type="submit" action="instituicao.php?acao=delete" value="Excluir Perfil" name="excluir" class="btn btn-danger">
	</div>
	<?php echo "$razao_social";
	 }
		
	?>



		<?php
		require_once("include/footer.php")
		?>
