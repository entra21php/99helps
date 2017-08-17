<?php
require_once("include/header.php");

?>
<br><br><br><br><br><br>


	<section class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
				<li class="breadcrumb-item active"><?=$breadcrumb_title?></li>
			</ol>

			<div class="card">
				<h6 class="card-header"><?=$page_title?></h6>
				<div class="card-block">
					<form method="POST" name="form">
						<div class="row">
							<div class="form-group col-12">
								<label for="titulo">Título</label>
								<input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" placeholder="" value="<?=$this->titulo?>">
								<small id="titulo" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="descricao">Descrição</label>
								<input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="" value="<?=$this->descricao?>">
								<small id="descricao" class="form-text text-muted">Escreva um breve texto sobre o evento</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-4">
								<label for="data">Data</label>
								<input type="date" class="form-control" id="data" name="data" aria-describedby="data" placeholder="" value="<?=$this->data?>">
								<small id="data" class="form-text text-muted"></small>
							</div>
						
						
							<div class="form-group col-8">
								<label for="foto_capa">Foto</label>
								<input type="file" class="form-control" id="foto_capa" name="foto_capa" aria-describedby="foto_capa" placeholder="" value="<?=$this->foto_capa?>">
								<small id="foto_capa" class="form-text text-muted">Insira a foto de capa</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="fk_instituicao">Instituição</label>
								<input type="text" class="form-control" id="fk_instituicao" name="fk_instituicao" aria-describedby="fk_instituicao" placeholder="Ex: Amiguinho Feliz" value="<?=$this->fk_instituicao?>">
								<small id="fk_instituicao" class="form-text text-muted"></small>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-12">
								<label for="fk_instituicao">Instituição</label>
								<input type="text" class="form-control" id="fk_instituicao" name="fk_instituicao" aria-describedby="fk_instituicao" placeholder="Ex: Amiguinho Feliz" value="<?=$this->fk_instituicao?>">
								<small id="fk_instituicao" class="form-text text-muted"></small>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-6">
								<label for="lng">Lat</label>
								<input type="text" class="form-control" id="lng" name="lng" aria-describedby="lng" placeholder="" value="<?=$this->lng?>">
								<small id="lng" class="form-text text-muted"></small>
							</div>
						
					
							<div class="form-group col-6">
								<label for="lng">Lng</label>
								<input type="text" class="form-control" id="lng" name="lng" aria-describedby="lng" placeholder="" value="<?=$this->lng?>">
								<small id="lng" class="form-text text-muted"></small>
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
		</section>
	
	
	<?php

require_once("include/footer.php");
?>
