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
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $questao = $_POST["questao"];
        $letra_a = $_POST["A"];        
        $letra_b = $_POST["B"];        
        $letra_c = $_POST["C"];        
        $letra_d = $_POST["D"];        
        $letra_e = $_POST["E"];
        $resposta= $_POST["resposta"];             
        }
    ?>
    <p>Questão: <?php echo $questao?></p><br>
    <p>Letra A: <?php echo $letra_a?></p><br>
    <p>Letra B: <?php echo $letra_b?></p><br>
    <p>Letra C: <?php echo $letra_c?></p><br>
    <p>Letra D: <?php echo $letra_d?></p><br>
    <p>Letra E: <?php echo $letra_e?></p><br>
    <p>Resposta: <?php echo $resposta?></p><br>

</body>
</html>