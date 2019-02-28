[<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Play Chest</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        	
            $questao = $_POST["questao"];
			$letra_a = $_POST["letra A"];       
			$letra_b = $_POST["letra B"];      
			$letra_c = $_POST["letra C"];       
			$letra_d = $_POST["letra D"];        
			$letra_e = $_POST["letra E"]; 
			$resposta = $_POST["resposta"];
			echo $questao,$letra_a,$letra_b,$letra_c,$letra_d,$letra_e;
        }   

    ?>
</body>
</html>