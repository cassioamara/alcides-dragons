<?php 

require_once "init.php";

$nome = isset($_POST['nome']) ? $_POST['nome']: null;
$servidor = isset($_POST['servidor']) ? $_POST['servidor']: null;
$raca = isset($_POST['raca']) ? $_POST['raca']: null;
$classe = isset($_POST['classe']) ? $_POST['classe']: null;
$genero = isset($_POST['genero']) ? $_POST['genero']: null;

if(empty($nome) || empty($servidor) || empty($raca) || empty($classe) || empty($genero))
{
	echo "Preencha todos os campos!!";
	exit;
}

$PDO = db_connect();
$sql = "INSERT INTO personagem(servidor,classe,raca,genero,nome) VALUES (:servidor,:classe,:raca,:genero,:nome);";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':servidor', $servidor);
$stmt->bindParam(':raca', $raca);
$stmt->bindParam(':classe', $classe);
$stmt->bindParam(':genero', $genero);
	
if($stmt->execute())
{
	header('Location: list.php');
}
else
{
	echo "ERRO";
	print_r($stmt->errorInfo());
}
	
?>