<!DOCTYPE html>
<html>
<head>
	<title>Trab prático 2</title>
</head>
<body>

	<form action="index.php" method="post">

		<?php 
		
		for($i = 0, $j = 1; $i < 3; $i++, $j++) {

			print('Internauta '.$j.' 
			
			<br>
			
			<br><label for="nome">Nome:</label>	
			<br><input name="nome['.$i.']" id="nome" type="text" required>
			
			<br>

			<br><label for="data_nascimento">Data de Nascimento:</label>
			<br><input name="data_nascimento['.$i.']" id="data_nascimento" type="date" required>

			<br>

			<br><label for="sexo">Sexo:</label>
			<br><select name="sexo['.$i.']" id="sexo">
				<option value="">Escolha...</option>
				<option value="feminino">Feminino</option>
				<option value="masculino">Masculino</option>
				<option value="sem gênero">Sem Gênero</option>
			</select>

			<br>

			<br><label for="peso">Peso:</label>
			<br><input name="peso['.$i.']" id="peso" type="number" step="0.1" required>
			
			<br>
	
			<br><label for="altura">Altura:</label>
			<br><input name="altura['.$i.']" id="altura" type="number" step="0.01" required>
				
			<br><br>');
			
		} 
		
		?>

		<input name="acao" type="submit" value="Cadastrar">

	</form>

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
</body>
</html>
