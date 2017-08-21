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
					<div class="form-group col-9">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" placeholder="" value="<?=$this->titulo?>">
						<small id="titulo" class="form-text text-muted"></small>
					</div>
					<div class="form-group col-3">
						<label for="data">Data</label>
						<input type="text" class="form-control" id="data" name="data" aria-describedby="data" placeholder="EX: 01/01/2017" value="<?=$this->data?>">
						<small id="data" class="form-text text-muted"></small>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-8">
						<label for="descricao">Descrição</label>
						<textarea type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="" rows="4" ><?=$this->descricao?></textarea>
						<small id="descricao" class="form-text text-muted">Escreva um breve texto sobre o evento</small>
					</div>	

					<div class="form-group col-4">
						<label for="foto_capa">Foto</label>
						<input type="file" class="form-control" id="foto_capa" name="foto_capa" aria-describedby="foto_capa" placeholder="" value="<?=$this->foto?>">
						<small id="foto_capa" class="form-text text-muted">Insira a foto de capa</small>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-8 ">
						<label for="logradouro">Logradouro</label>
						<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Ex: Rua General Osório" value="<?=$this->logradouro?>">
					</div>	

					<div class="row">
						<div class="form-group col-8 ">
							<label for="fk_instituicao">Instituição</label>
							<input type="text" class="form-control" id="fk_instituicao" name="fk_instituicao" placeholder="Ongs" value="<?=$this->fk_instituicao?>">
						</div>	

						<div class="form-group col-4">
							<label for="numero">Número</label>
							<input type="text" class="form-control" pattern="[0-9]+$" id="numero" name="numero" placeholder="Ex: 1568" value="<?=$this->numero?>">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="estado">Estado</label>
							<select class="custom-select form-control" name="estado" value="<?=$this->estado?>">
								<option selected>Selecione o estado</option>
								<?php
								foreach ($estado as $id => $nome) {
									if ($nome==$this->estado) {
										echo '<option value="'.$nome.'" selected>'.$nome.'</option>';
									} else {
										echo '<option value="'.$nome.'">'.$nome.'</option>';
									}
								}
								?>
							</select>
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="cidade">Cidade</label>
							<select class="custom-select form-control" name="cidade" value="<?=$this->cidade?>">
								<option selected>Selecione a cidade</option>
								<?php
								$sqlCity = "SELECT * FROM cidades";	
								$consultaCity = mysql_query($sqlCity);
								while ($rsCity = mysql_fetch_array($consultaCity)) {
									if ($rsCity['id']==$this->cidade) {
										echo '<option value="'.$rsCity['id'].'" selected>'.$rsCity['cidadenome'].'</option>';
									} else {
										echo '<option value="'.$rsCity['id'].'">'.$rsCity['cidadenome'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-7">
						<input type="submit" class="btn btn-primary" name="cadastra" value="Cadastrar">
					</div>
				</form>
			</div>
		</div>
	</section>

	<br>
	<?php

	require_once("include/footer.php");
	?>

