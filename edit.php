<?php
 
require_once "init.php";
 
$nome = isset($_POST['nome']) ? $_POST['nome']: null;
$servidor = isset($_POST['servidor']) ? $_POST['servidor']: null;
$classe = isset($_POST['classe']) ? $_POST['classe']: null;
$genero = isset($_POST['genero']) ? $_POST['genero']: null;
$id = isset($_POST['id']) ? $_POST['id']: null;
 
if(empty($nome) || empty($servidor) || empty($classe) || empty($genero) || empty($id))
	{
		echo "Preencha todos os campos!!";
		exit;
	}
 
$PDO = db_connect();
$sql = "UPDATE personagem SET servidor = :servidor, classe = :classe, genero = :genero, nome = :nome WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':servidor', $servidor);
$stmt->bindParam(':classe', $classe);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: list.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}

?>