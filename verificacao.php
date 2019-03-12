<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Play Chest</title>
    <style>
        p {
            font-family: Arial;
            font-size: 18px;
            border-bottom: 1px solid black;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php    
        require('db.php');
        $conection = new db();
        $link = $conection->conect_mysql();
        if($_SERVER["REQUEST_METHOD"] == "GET"){
        $questao = $_POST["questao"];
        $letra_a = $_POST["A"];        
        $letra_b = $_POST["B"];        
        $letra_c = $_POST["C"];        
        $letra_d = $_POST["D"];        
        $letra_e = $_POST["E"];
        $resposta= $_POST["resposta"]; 
        // verifica se foi enviado um arquivo 
        if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
            echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
            echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
            echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
            echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
            $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
            $nome = $_FILES['arquivo']['name'];
            // Pega a extensao
            $extensao = strrchr($nome, '.');
            // Converte a extensao para mimusculo
            $extensao = strtolower($extensao);
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfilero as extesões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                $novoNome = md5(microtime()) . '.' . $extensao;                
                // Concatena a pasta com o nome
                $destino = 'imagens/' . $novoNome; 
                // tenta mover o arquivo para o destino
                if( @move_uploaded_file( $arquivo_tmp, $destino  ))
                {
                    echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
                    // echo "<img src=\"" . $destino . "\" />";
                }
                else
                    echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
            }
            else
                echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
        }
        else
        {
            echo "Você não enviou nenhum arquivo!";
        }
        $sql_query = "INSERT INTO created_questions(questao,letra_a,letra_b,letra_c,letra_d,letra_e,resposta) VALUES('$questao','$letra_a','$letra_b','$letra_c','$letra_d','$letra_e','$resposta');";     
        if(mysqli_query($link,$sql_query)){
            echo "Deu certo";
        }else{
            echo "Deu errado".mysqli_error($link);
        }       
        }
    ?>
<<<<<<< HEAD
    <p>Questão: <?php echo $questao?></p><br>
    <p>Imagem: <?php echo $arquivo;?> </p><br>
    <p>Letra A: <?php echo $letra_a?></p><br>
    <p>Letra B: <?php echo $letra_b?></p><br>
    <p>Letra C: <?php echo $letra_c?></p><br>
    <p>Letra D: <?php echo $letra_d?></p><br>
    <p>Letra E: <?php echo $letra_e?></p><br>
    <p>Resposta: <?php echo $resposta?></p><br>
=======
    <p>Questão:
        <?php echo $questao?>
    </p><br>
    <p>Imagem:
        <img src=<?php echo $destino; ?> alt="">
    </p><br>
    <p>Letra A:
        <?php echo $letra_a?>
    </p><br>
    <p>Letra B:
        <?php echo $letra_b?>
    </p><br>
    <p>Letra C:
        <?php echo $letra_c?>
    </p><br>
    <p>Letra D:
        <?php echo $letra_d?>
    </p><br>
    <p>Letra E:
        <?php echo $letra_e?>
    </p><br>
    <p>Resposta:
        <?php echo $resposta?>
    </p><br>
>>>>>>> 18fea57292596e2d6eb3e1cee39ec098f25f3f3e

</body>

</html>