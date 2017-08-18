<?php
	#  NESTA PAGINA FICARA O HTML DO FORM
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	// 
	
?>
<div class="container">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
		<li class="breadcrumb-item active">Novo Helper</li>
	</ol>

	<div class="card">
		<h6 class="card-header">Cadastro de novo Helper</h6>
		<div class="card-block">
			<form method="POST" enctype="multipart/form-data" name="form">
				<div class="row">
					<div class="form-group col-12">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Ex: Amiguinho Feliz" value="<?=$this->nome?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">
						<label for="sobrenome">Sobrenome</label>
						<input type="text" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="sobrenomel" placeholder="Ex: Amiguinho Feliz" value="<?=$this->sobrenome?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2">
						<label for="sexo">Sexo</label>
						<select class="form-control" id="sexo" name="sexo">
							<option>Masculino</option>
							<option>Feminino</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="nascimento">Nascimento</label>
						<input type="date" class="form-control" id="nascimento" name="datanascimento" aria-describedby="emailHelp" value="<?=$this->datanascimento?>">
					</div>
					<div class="form-group col-md-4">
						<label for="imagem_perfil">Foto do perfil:</label>
						<input type="file" class="form-control-file" id="imagem_perfil" name="fileToUpload" aria-describedby="fileHelp" value="imagem_perfil">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-12 col-md-6">
						<label for="estado">Estado</label>
						<select class="custom-select form-control" name="estado" value="<?=$this->estado?>">
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
						<select class="custom-select form-control" name="fk_cidades" value="<?=$this->fk_cidades?>">
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
						<label for="interesses">Interesses</label>
						<!-- AQUI VAI O FOR DAS CAUSAS DO BANCO -->
						<select class="custom-select form-control" name="interesses" value="<?=$this->interesses?>">
							<option selected>Selecione seus interesses</option>
							<option value="1">Causa animal</option>
							<option value="2">Pessoas em situação de rua</option>
							<option value="3">Educação</option>
						</select>
						<small id="causa-defendidaHelp" class="form-text text-muted">Você pode escolher quantos interesses quiser</small>
					</div>	
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Coloque seu email aqui!!!" value="<?=$this->email?>">
					<small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
				</div>
				<div class="form-group">
					<label for="confirmeemail">Confirme seu Email</label>
					<input type="email" class="form-control" id="confirmeemail" name="email_confere" aria-describedby="emailHelp" placeholder="Confirme seu email!!!" value="<?=$this->email_confere?>">
					<small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
				</div>
				<div class="row">
				<div class="form-group col-12 col-md-6">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
					</div>
					<div class="form-group col-12 col-md-6">
						<label for="confirmesenha">Confirme sua senha</label>
						<input type="password" class="form-control" id="confirmesenha" name="senha_confere" placeholder="Confirme sua senha">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleTextarea">Rápida descrição sobre você!!!!</label>
					<textarea class="form-control" id="exampleTextarea" rows="3" name="descricao" value="<?=$this->descricao?>"></textarea>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input">
						Concordo com os termos do site!!
					</label>
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
