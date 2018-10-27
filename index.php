<!DOCTYPE html>
<html>
<head>
	<title>Trab prático 2</title>

	 <!-- CORE CSS-->
  
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">


	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>
<body>

	<div class="container">
		<div class="section">

			<p class="caption">Calcule o IMC</p>

			<div class="divider"></div>
			
			<!--Basic Form-->
			<div id="basic-form" class="section">
				<div class="row">
					<form action="index.php" method="post">
						<?php 
							for($i = 0, $j = 1; $i < 3; $i++, $j++) {

								print('<div class="col s12 m12 l4">
									<div class="card-panel">
										<h4 class="header2"> '.$j.'º Internauta</h4>
										<div class="row">
											<form class="col s12">
												<div class="row">
													<div class="input-field col s12">
														<label for="nome">Name</label>
														<input name="nome['.$i.']" id="nome" type="text" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="data_nascimento">Data de Nascimento:</label>
														<input name="data_nascimento['.$i.']" id="data_nascimento" type="date" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="sexo">Sexo:</label>
														<select name="sexo['.$i.']" id="sexo">
															<option value="">Escolha...</option>
															<option value="feminino">Feminino</option>
															<option value="masculino">Masculino</option>
															<option value="sem gênero">Sem Gênero</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="peso">Peso:</label>
														<input name="peso['.$i.']" id="peso" type="number" step="0.1" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="altura">Altura:</label>
														<input name="altura['.$i.']" id="altura" type="number" step="0.01" required>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>');
							} 
						?>
		<input name="acao" type="submit" value="Cadastrar">

					</form>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button class="btn cyan waves-effect waves-light right" id="submit-btn" type="submit" name="acao" value="Cadastrar">Cadastrar
						<i class="mdi-content-send right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

	<?php

		if($_POST) {
			include "Internauta.class.php";
			include "Grupo.class.php";
			include "Utils.class.php";
			
			$grupo = new Grupo();

			for($i = 0; $i < count($_POST["nome"]); $i++) {
				$internauta = new Internauta(
											$_POST["nome"][$i],
											$_POST["data_nascimento"][$i],
											$_POST["sexo"][$i],
											$_POST["peso"][$i],
											$_POST["altura"][$i]);
				$grupo->addInternauta($internauta);
			}

			foreach($grupo->internautas as $internauta) {
				$internauta->calcularIMC($internauta->peso, $internauta->altura);
				print("<br><br>" .$internauta);
			}

			$grupo->calcularMedia();

			$categoriaIMCGrupo = Utils::categorizarIMC($grupo->mediaIMC);

			print("<br><br>" .$grupo. ", sendo classificado como " .$categoriaIMCGrupo. ".");
		}

	?>

 	<!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
	<script type="text/javascript" src="js/plugins.js"></script>
	
</body>
</html>
