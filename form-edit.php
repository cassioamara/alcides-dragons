<?php

require "init.php";
 
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
$PDO = db_connect();
$sql = "SELECT servidor,classe,raca,genero,nome FROM personagem WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$personagem = $stmt->fetch(PDO::FETCH_ASSOC);
 
if (!is_array($personagem))
{
    echo "Nenhum personagem encontrado";
    exit;
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Alcides & Dragons</title>
        <link rel="stylesheet" href="css/lista.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head> 
    <body>
 
        <div class="header">
            <a href="list.php"><img class="logo" src="images/logonew.png"></a>
        </div>    
        <br>
        <h2 style="text-align: center; font-size: 25px">Edite seu personagem</h2>
         
        <form class="forms" action="edit.php" method="post">

            <label for="nome">Nome: </label>
            <br>
            <input type="text" name="nome" id="nome" value="<?php echo $personagem['nome'] ?>">

            <label for="raca"><?php echo " (".$personagem['raca'].")" ?> </label>          
            <br><br>
            Servidor:
            <br>
            <input type="radio" name="servidor" id="westeros" value="Westeros" <?php if ($personagem['servidor'] == 'Westeros'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Westeros </label>
            <input type="radio" name="servidor" id="velenlab01" value="Velenlab 01" <?php if ($personagem['servidor'] == 'Velenlab 01'): ?> checked="checked" <?php endif; ?>>
            <label for="sul">Velenlab 01 </label>
            <input type="radio" name="servidor" id="middleearth" value="Middle-Earth" <?php if ($personagem['servidor'] == 'Middle-Earth'): ?> checked="checked" <?php endif; ?>>
            <label for="centro">Middle-Earth </label>           
            <br>       
            Classe:
            <br>
            <input type="radio" name="classe" id="guerreiro" value="Guerreiro" <?php if ($personagem['classe'] == 'Guerreiro'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Guerreiro </label>
            <input type="radio" name="classe" id="barbaro" value="Bárbaro" <?php if ($personagem['classe'] == 'Bárbaro'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Bárbaro </label>
            <input type="radio" name="classe" id="ranger" value="Ranger" <?php if ($personagem['classe'] == 'Ranger'): ?> checked="checked" <?php endif; ?>>
            <label for="sul">Ranger </label>
            <input type="radio" name="classe" id="mago" value="Mago" <?php if ($personagem['classe'] == 'Mago'): ?> checked="checked" <?php endif; ?>>
            <label for="centro">Mago </label> 
            <input type="radio" name="classe" id="necro" value="Necromante" <?php if ($personagem['classe'] == 'Necromante'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Necromante </label>
            <input type="radio" name="classe" id="clerigo" value="Clérigo" <?php if ($personagem['classe'] == 'Clérigo'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Clérigo </label>
            <input type="radio" name="classe" id="ladrao" value="Ladrão" <?php if ($personagem['classe'] == 'Ladrão'): ?> checked="checked" <?php endif; ?>>
            <label for="centro">Ladrão </label> 
            <input type="radio" name="classe" id="bardo" value="Bardo" <?php if ($personagem['classe'] == 'Bardo'): ?> checked="checked" <?php endif; ?>>
            <label for="norte">Bardo </label>
            <br>
            Gênero:
            <br>
            <input type="radio" name="genero" id="genero_m" value="m" <?php if ($personagem['genero'] == 'm'): ?> checked="checked" <?php endif; ?>>
            <label for="gener_m">Masculino </label>
            <input type="radio" name="genero" id="genero_f" value="f" <?php if ($personagem['genero'] == 'f'): ?> checked="checked" <?php endif; ?>>
            <label for="gener_f">Feminino </label>
            <input type="radio" name="genero" id="genero_nb" value="nb" <?php if ($personagem['genero'] == 'nb'): ?> checked="checked" <?php endif; ?>>
            <label for="gener_m">Não-binário </label> 
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>"> 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>