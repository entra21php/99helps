<?php
	#  NESTA PAGINA FICARA O HTML DO FORM
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
?>
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
				<li class="breadcrumb-item active">Nova Instituição</li>
			</ol>

			<div class="card">
				<h6 class="card-header">Cadastro de nova instituição</h6>
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
								<select class="custom-select form-control" name="estado" value="<?=$estado?>">
									<option selected>Selecione o estado</option>
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AP">AP</option>
									<option value="AM">AM</option>
									<option value="BA">BA</option>
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MT">MT</option>
									<option value="MS">MS</option>
									<option value="MG">MG</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PR">PR</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RS">RS</option>
									<option value="RO">RO</option>
									<option value="RR">RR</option>
									<option value="SC">SC</option>
									<option value="SP">SP</option>
									<option value="SE">SE</option>
									<option value="TO">TO</option>
								</select>
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="cidade">Cidade</label>
								<!-- AQUI VAI O FOR DAS CIDADES DO BANCO -->
								<select class="custom-select form-control" name="cidade" value="<?=$cidade?>">
									<option selected>Selecione a cidade</option>
									<option value="1">São Paulo</option>
									<option value="2">Blumenau</option>
									<option value="3">Porto Alegre</option>
									<option value="3">Florianópolis</option>
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
								<input type="submit" type="button" class="btn btn-success" name="enviar" value="Cadastrar">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><br>
