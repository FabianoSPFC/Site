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
        require('db_conncetion.php');
        $conection = new db();
        $link = $conection->conect_mysql();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $questao = $_POST["questao"];
        $letra_a = $_POST["A"];
        $letra_b = $_POST["B"];
        $letra_c = $_POST["C"];
        $letra_d = $_POST["D"];
        $letra_e = $_POST["E"];
        $dificuldade = $_POST["dificuldade"];
        $resposta = $_POST["resposta"];
        $arr_questoes = [];
        $novoNome = [];
        //faz operações com os arquivos enviados
        // for ($i = 0; $i < 5; $i++) {
        //     // verifica se foi enviado um arquivo 
        //     if (isset($_FILES['arquivo']['name'][$i]) && $_FILES["arquivo"]["error"][$i] == 0) {
        //         // echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'][$i] . "</strong><br />";
        //         // echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'][$i] . "</strong><br />";
        //         // echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'][$i] . "</strong><br />";
        //         // echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'][$i] . "</strong> Bytes<br /><br />";
        //         $arquivo_tmp = $_FILES['arquivo']['tmp_name'][$i];
        //         $nome = $_FILES['arquivo']['name'][$i];
        //         // Pega a extensao
        //         $extensao = strrchr($nome, '.');
        //         // Converte a extensao para mimusculo
        //         $extensao = strtolower($extensao);
        //         // Somente imagens, .jpg;.jpeg;.gif;.png
        //         // Aqui eu enfilero as extesões permitidas e separo por ';'
        //         // Isso serve apenas para eu poder pesquisar dentro desta String
        //         if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
        //             // Cria um nome único para esta imagem
        //             // Evita que duplique as imagens no servidor.
        //             $novoNome[$i] = md5(microtime()) . '.' . $extensao;
        //             // Concatena a pasta com o nome
        //             $destino = 'imagens/' . $novoNome[$i];
        //             // tenta mover o arquivo para o destino
        //             if (@move_uploaded_file($arquivo_tmp, $destino)) {
        //                 // echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
        //                 // echo "<img src=\"" . $destino . "\" />";
        //             } else
        //                 echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
        //         } else
        //             echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
        //     } else {
        //         echo "Você não enviou nenhum arquivo!";
        //     }
        // }
        for($i = 0; $i<count($questao);$i++){
            $arr_questoes[i] = new questao($questao[i], $letra_a[i],$letra_b[i],$letra_c[i],$letra_d[i],$letra_e[i], $novoNome[i], $resposta[i], $dificuldade[i]);
            echo "<h3>Questão: " . $arr_questoes[i]->getQuestao() . "</h3>";
            echo "<p>Imagem:
                    <img src=imagens/" . $novoNome[$i] . " alt=' Algum erro aconteceu'>
                </p><br>";
            echo "<p>Letra A: " . $letra_a[$i] . "</p><br>";
            echo "<p>Letra B: " . $letra_b[$i] . "</p><br>";
            echo "<p>Letra C: " . $letra_c[$i] . "</p><br>";
            echo "<p>Letra D: " . $letra_d[$i] . "</p><br>";
            echo "<p>Letra E: " . $letra_e[$i] . "</p><br>";
            echo "<p>Dificuldade: " . $dificuldade[$i] . "</p><br>";
        }
    }
    
    ?>

</body>

</html> 