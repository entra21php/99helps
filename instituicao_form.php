<?php
	#  NESTA PAGINA FICARA O HTML DO FORM
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	if (isset($_GET['edt'])) {
		$btn_name = "Salvar";
		$page_title = "Alteração do cadastro de " . $rs['nome_fantasia'];
		$breadcrumb_title = "Alteração de cadastro de " . $rs['nome_fantasia'];
	} else {
		$btn_name = "Cadastrar";
		$page_title = "Cadastro de nova instituição";
		$breadcrumb_title = "Nova Instituição";
	}

	$estado = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");				
?>
		<div class="container">
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
								<label for="razaoSocial">Razão Social</label>
								<input type="text" class="form-control" id="razaoSocial" name="razaoSocial"aria-describedby="razaoSocialHelp" placeholder="Ex: Instituição Amiguinho Feliz" value="<?=$razaoSocial?>">
								<small id="razaoSocialHelp" class="form-text text-muted">Digite conforme no seu cartão CNPJ</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="nomeFantasia">Nome Fantasia</label>
								<input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" aria-describedby="nomeFantasialHelp" placeholder="Ex: Amiguinho Feliz" value="<?=$nomeFantasia?>">
								<small id="razaoSocialHelp" class="form-text text-muted">Você será chamado pelo Nome Fantasia dentro de nosso sistema</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-8">
								<label for="logadrouro">Logradouro</label>
								<input type="text" class="form-control" id="logadrouro" name="logadrouro" placeholder="Ex: Rua General Osório" value="<?=$logadrouro?>">
							</div>	
							<div class="form-group col-12 col-md-4">
								<label for="numero">Número</label>
								<input type="text" class="form-control" id="numero" name="numero" placeholder="Ex: 1568" value="<?=$numero?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="estado">Estado</label>
								<select class="custom-select form-control" name="estado">
									<option selected>Selecione o estado</option>
										<?php
											foreach ($estado as $id => $nome) {
												if ($nome==$rs['estado']) {
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
								<select class="custom-select form-control" name="cidade" value="<?=$cidade?>">
									<option selected>Selecione a cidade</option>
									<?php
										$sqlCity = "SELECT * FROM cidades";	
										$consultaCity = mysql_query($sqlCity);
										while ($rsCity = mysql_fetch_array($consultaCity)) {
									?>
										<option value="<?=$rsCity['id']?>"><?=$rsCity['cidadenome']?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="causa-defendida">Causa defendida</label>
								<!-- AQUI VAI O FOR DAS CAUSAS DO BANCO -->
								<select class="custom-select form-control" name="causa_defendida" value="<?=$causa_defendida?>">
									<option selected>Selecione a causa defendida</option>
									<option value="1">Causa animal</option>
									<option value="2">Pessoas em situação de rua</option>
									<option value="3">Educação</option>
								</select>
								<small id="causa-defendidaHelp" class="form-text text-muted">Sua instituição pode defender no máximo 1 causa</small>
							</div>	
						</div>
						<div class="row">
							<div class="form-group col-12">
								<input type="submit" type="button" class="btn btn-success" name="enviar" value="<?=$btn_name?>">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><br>
