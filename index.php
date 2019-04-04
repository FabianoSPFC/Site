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
		<div id="corpo-form" style="border: 1px solid red;">
		<h1>Entrar</h1>			
		<form method="POST">					
			<input type="email" placeholder="Email" name="email">
			<input type="password" placeholder="Senha" name="senha">
			<input type="submit" placeholder="ACESSAR">
			<p>Ainda não é inscrito?<a href="cadastro_aluno.php"><strong>Cadastre-se!</strong></p>
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