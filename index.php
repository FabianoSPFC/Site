<?php
	require_once 'Class/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Play Chest</title>
		<link rel="stylesheet" href="CSS/Style.css">
	</head>
	<body>
		<div id="corpo-form">
		<h1>Entrar</h1>			
		<form method="POST">					
			<input type="email" placeholder="Email" name="email">
			<input type="password" placeholder="Senha" name="senha">
			<input type="submit" placeholder="ACESSAR">
			<a href="teste.js">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
		</form>
		
		</div>
		<?php 
			if(isset($_POST['email'])){	
					
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);	

			if(!empty($email) && !empty($senha)){
				$u->conectar("play_chest","localhost","root","");
				if($u->msgErro == ""){

					if($u->logar($email,$senha)){
						header("location: cadastro.html");
				}

			
			else{
				?>
				<div class="msg-erro">Email e/ou senha incorretos!</div>
				<?php
			}
		}
		else{
			?>
			<div class ="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?></div>
				<?php
		}
}
			else{
				?>
				<div class="msg-erro">Preencha todos os campos!</div>
				<?php
			}
		}
		 ?>
	</body>
</html>