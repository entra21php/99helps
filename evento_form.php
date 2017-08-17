<?php
	#  NESTA PAGINA FICARA O HTML DO FORM
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	
require_once("include/header.php");

?>
<br><br><br><br><br><br>


	<section class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
				<li class="breadcrumb-item"><a href="evento_form.php">Novo Evento</a></li>
				<li class="breadcrumb-item active"><!-- <?=$breadcrumb_title?> --></li>
			</ol>

			<div class="card">
				<h6 class="card-header"><!-- <?=$page_title?> --></h6>
				<div class="card-block">
					<form method="POST" name="form">
						<div class="row">
							<div class="form-group col-12">
								<label for="titulo">Título</label>
								<input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" placeholder="" value="">
								<small id="titulo" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="descricao">Descrição</label>
								<input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="" value="">
								<small id="descricao" class="form-text text-muted">Escreva um breve texto sobre o evento</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-4">
								<label for="data">Data</label>
								<input type="date" class="form-control" id="data" name="data" aria-describedby="data" placeholder="" value="">
								<small id="data" class="form-text text-muted"></small>
							</div>
						
						
							<div class="form-group col-8">
								<label for="foto_capa">Foto</label>
								<input type="file" class="form-control" id="foto_capa" name="foto_capa" aria-describedby="foto_capa" placeholder="" value="">
								<small id="foto_capa" class="form-text text-muted">Insira a foto de capa</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="instituicao">Instituição</label>
								<input type="text" class="form-control" id="instituicao" name="instituicao" aria-describedby="instituicao" placeholder="Ex: Amiguinho Feliz" value="">
								<small id="instituicao" class="form-text text-muted"></small>
							</div>
						</div>

							<div class="row">
								
						</div>
					
						<div class="col-xs-7">
							<input type="submit" class="btn btn-primary" name="cadastra" value="Cadastrar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</form>

	<?php

require_once("include/footer.php");
?>
