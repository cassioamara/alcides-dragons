<?php

require_once "init.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Criar personagem</title>	
	<link rel="stylesheet" href="css/lista.css">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

		<div class="header">
            <a href="list.php"><img class="logo" src="images/logonew.png"></a>
        </div>  		
	
    <br>
	<h2 style="text-align: center; font-size: 25px">Crie seu personagem</h2>
	
	<form class="forms" action="create.php" method="post">

		Nome:			
		<input type="text" name="nome" id="nome">
		<br><br>
		Servidor:
		<br>
		<input type="radio" name="servidor" id="westeros" value="Westeros">
			<label for="norte">Westeros </label>
		<input type="radio" name="servidor" id="velenlab01" value="Velenlab 01">
			<label for="sul">Velenlab 01 </label>
		<input type="radio" name="servidor" id="middleearth" value="Middle-Earth">
			<label for="centro">Middle-Earth </label>
		<br>
		Raça:
		<br>
		<input type="radio" name="raca" id="humano" value="Humano">
			<label for="humano">Humano </label>
		<input type="radio" name="raca" id="elfo" value="Elfo">
			<label for="elfo">Elfo </label>
		<input type="radio" name="raca" id="halfelf" value="Half-elf">
			<label for="half-elf">Half-elf </label>
		<input type="radio" name="raca" id="anao" value="Anão">
			<label for="anao">Anão </label>
		<input type="radio" name="raca" id="orc" value="Orc">
			<label for="anao">Orc </label>
		<input type="radio" name="raca" id="anao" value="Khajiit">
			<label for="anao">Khajiit </label>
		<br>
		Classe:
		<br>
		<input type="radio" name="classe" id="guerreiro" value="Guerreiro">
			<label for="guerreiro">Guerreiro </label>
		<input type="radio" name="classe" id="barbaro" value="Bárbaro">
			<label for="guerreiro">Bárbaro </label>
		<input type="radio" name="classe" id="ranger" value="Ranger">
			<label for="ranger">Ranger </label>
		<input type="radio" name="classe" id="mago" value="Mago">
			<label for="bruxo">Mago </label>
		<input type="radio" name="classe" id="necro" value="Necromante">
			<label for="bruxo">Necromante </label>
		<input type="radio" name="classe" id="clerigo" value="Clérigo">
			<label for="bruxo">Clérigo </label>
		<input type="radio" name="classe" id="ladrao" value="Ladrão">
			<label for="ladrao">Ladrão </label>
		<input type="radio" name="classe" id="bardo" value="Bardo">
			<label for="ladrao">Bardo </label>
		<br>
		Gênero:
		<br>
		<input type="radio" name="genero" id="genero_m" value="m">
			<label for="genero_m">Masculino </label>
		<input type="radio" name="genero" id="genero_f" value="f">
			<label for="genero_f">Feminino </label>
		<input type="radio" name="genero" id="genero_nb" value="nb">
			<label for="genero_f">Não-binário </label>
		<br><br>
		<input type="submit" value="Criar personagem">
		
	</form>
	<br>
	
</body>
</html>

