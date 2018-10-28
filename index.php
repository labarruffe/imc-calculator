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

	<!-- Start Page Loading -->
	<div id="loader-wrapper">
		<div id="loader"></div>        
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->

	  <!-- START HEADER -->
	  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper"> 
					<h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1">Calculadora de IMC</h1>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

	<div class="container">
		<div class="section">

			<p class="caption">Informe os dados</p>
			
			<!--Basic Form-->
			<div id="basic-form" class="section">
				<form action="index.php" method="post">
					<div class="row">
							<?php 
								for($i = 0, $j = 1; $i < 3; $i++, $j++) {

									print('<div class="col s12 m12 l4">
										<div class="card-panel">
											<h4 class="header2"> '.$j.'º Internauta</h4>
											<div class="row">
												<div class="row">
													<div class="input-field col s12">
														<label for="nome">Nome</label>
														<input name="nome['.$i.']" id="nome" type="text" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="data_nascimento">Data de Nascimento</label>
														<input class="datepicker" name="data_nascimento['.$i.']" id="data_nascimento" type="date" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<select name="sexo['.$i.']" id="sexo">
															<option value="" disabled selected>Escolha o sexo</option>
															<option value="feminino">Feminino</option>
															<option value="masculino">Masculino</option>
															<option value="sem gênero">Sem Gênero</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="peso">Peso</label>
														<input name="peso['.$i.']" id="peso" type="text" step="0.1" placeholder="Exemplo 75.5 ou 75" pattern="((\d{2}|\d{3}).(\d{1}))|(\d{2}|\d{3})" required>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<label for="altura">Altura</label>
														<input name="altura['.$i.']" id="altura" type="text" step="0.01" placeholder="Exemplo 1.85" pattern="(\d{1}).(\d{2})" required>
													</div>
												</div>
											</div>
										</div>
									</div>');
								} 
							?>
					</div>
					<div class="row submit-btn">
						<div class="input-field col s12">
							<button class="btn cyan waves-effect waves-light right" id="submit-btn" type="submit" name="acao" value="Cadastrar">Cadastrar
								<i class="mdi-content-send right"></i>
							</button>
						</div>
					</div>
				</form>
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

			
					print('<div class="row">');

						foreach($grupo->internautas as $internauta) {
							$internauta->calcularIMC($internauta->peso, $internauta->altura);
							print('<div class="col s12 m12 l4">
								<div class="card-panel">
									'.$internauta.'
								</div>
							</div>');
						}

						$grupo->calcularMedia();

						$categoriaIMCGrupo = Utils::categorizarIMC($grupo->mediaIMC);
						
						print('<div class="col s12 m12 l12">
							<div class="card-panel">
								'.$grupo.' , sendo classificado como <b>'.$categoriaIMCGrupo.'</b>.
							</div>							
						</div>
					</div>');
				}
			?>
		</div>
	</div>

	<!-- START FOOTER -->
	<footer class="page-footer">
		<div class="footer-copyright">
		<div class="container white-text">
			<span>Copyright © 2018</span>
			<span class="right"> Desenvolvido por Daniel Reali e Lucas Barruffe</span>
		</div>
		</div>
 	</footer>
    <!-- END FOOTER -->


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
