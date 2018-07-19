<?php

require_once "init.php"; // requer uma 'consulta' no arquivo init.php
$PDO = db_connect(); // estabelecer conexão com o banco de dados  

$sql_count = "SELECT COUNT(*) AS total FROM personagem ORDER BY nome ASC";
$sql = "SELECT id, servidor, classe, raca, genero, nome FROM personagem ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count); // prepara contagem dos campos da tabela
$stmt_count->execute(); //executa a contagem
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql); // prepara a tabela
$stmt->execute(); // inicia/executa a tabela

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Alcides & Dragons</title> 
        <link href="css/lista.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">        
    </head> 
    <body>
         
        <div class="header">
            <img class="logo" src="images/logonew.png">
        </div>      
         <br>
        <p style="text-align: center; font-size: 24px";><a href="form-create.php">Criar novo personagem</a></p>
        <h4 style="text-align: center";>Personagens disponíveis: <?php echo $total ?> </h4>    
        <br>

        <?php if ($total > 0): ?>

        <table class="table" width="50%" border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Servidor</th>
                    <th>Raça</th>
                    <th>Classe</th>
                    <th>Gênero</th>
                    <th>Ao editar, sua raça não pode ser alterada!</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while ($personagem = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo ($personagem['nome']) ?></td> 
                    <td><?php echo ($personagem['servidor']) ?></td>                    
                    <td><?php echo ($personagem['raca']) ?></td>  
                    <td><?php echo ($personagem['classe']) ?></td>                                        
                    <td>
                        <?php 
                        if ($personagem['genero'] == 'm') 
                            { 
                                echo 'Masculino'; 
                            } 
                        elseif ($personagem['genero'] == 'f') 
                            { 
                                echo 'Feminino'; 
                            } 
                            else 
                            { 
                                echo 'Não-Binário';
                            }
                        ?>                            
                    </td>
                    <td>
                        <a class="edit" href="form-edit.php?id=<?php echo $personagem['id'] ?>">Editar</a>    
                        <a  href="delete.php?id=<?php echo $personagem['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

        <?php else: ?>
 
        <h3><p style="text-align: center;">Nenhum personagem registrado!</p><h3>
 
        <?php endif; ?>

    </body>
</html>