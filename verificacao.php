<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Play Chest</title>
    <style>
    p{
        font-family: Arial;
        font-size:18px;
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
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $questao = $_POST["questao"];
        $arquivo = $_POST["arquivo"];
        $letra_a = $_POST["A"];        
        $letra_b = $_POST["B"];        
        $letra_c = $_POST["C"];        
        $letra_d = $_POST["D"];        
        $letra_e = $_POST["E"];
        $resposta= $_POST["resposta"]; 
        $sql_query = "INSERT INTO created_questions(questao,letra_a,letra_b,letra_c,letra_d,letra_e,resposta) VALUES('$questao','$letra_a','$letra_b','$letra_c','$letra_d','$letra_e','$resposta');";     
        if(mysqli_query($link,$sql_query)){
            echo "Deu certo";
        }else{
            echo "Deu errado".mysqli_error($link);
        }       
        }
    ?>
    <p>Questão: <?php echo $questao?></p><br>
    <img src=<?php echo $arquivo; ?> alt=""><br>
    <p>Letra A: <?php echo $letra_a?></p><br>
    <p>Letra B: <?php echo $letra_b?></p><br>
    <p>Letra C: <?php echo $letra_c?></p><br>
    <p>Letra D: <?php echo $letra_d?></p><br>
    <p>Letra E: <?php echo $letra_e?></p><br>
    <p>Resposta: <?php echo $resposta?></p><br>

</body>
</html>