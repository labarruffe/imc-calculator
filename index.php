<!DOCTYPE html>
<html>
<head>
	<title>Trab prático 2</title>
</head>
<body>

	<form action="index.php" method="post">

		<?php 
		
		for($i = 0; $i < 3; $i++) {

			print('Usuário '.$i.' 
			
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
			<br><input name="altura['.$i.']" id="altura" type="number" required>
				
			<br><br>');
			
		} 
		
		?>

		<input name="acao" type="submit" value="Cadastrar-se">

	</form>

	<?php

if($_POST) {
	include "Internauta.class.php";
	include "Grupo.class.php";

	
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
	
	// foreach($grupo->internautas as $internauta) {
	// 	$i = 1;
	// 	$internauta->calcularIMC($_POST["peso"][$i], $_POST["altura"][$i]);
	// 	print("<br><br>" .$internauta);
	// 	$i = $i + 1;
	// }

	for($i = 0; $i < 3; $i++) {
		
		$grupo->internautas[$i]->calcularIMC($_POST["peso"][$i], $_POST["altura"][$i]);
		print("<br><br>" .$grupo->internautas[$i]);
		
	}

	print("<br><br>total: ".$grupo->internautas->count());


	// for($i = 1; $i <= 3; $i++) {
	// 	echo ("<br>" .$grupo->get()[$i]->{'nome'});
	// }
	// echo "<br><br>";
}

?>
</body>
</html>


<!-- <label for="data_nascimento">Data de Nascimento:</label>
		<input name="data_nascimento" id="data_nascimento" type="date" required>
		<br><br>

		<label for="sexo">Sexo:</label>
		<select name="sexo" id="sexo">
			<option value="">Escolha...</option>
			<option value="feminino">Feminino</option>
			<option value="masculino">Masculino</option>
			<option value="sem_genero">Sem Gênero</option>
		</select>
		<br><br>

		<label for="peso">Peso:</label>
		<input name="peso" id="peso" type="number" step="0.1" required>
		<br><br>

		<label for="altura">Altura:</label>
		<input name="altura" id="altura" type="number" required>
		<br><br>

		<input name="acao" type="submit" value="Cadastrar-se">
		<br><br><br> -->