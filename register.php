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
		<div id="corpo-form-cad">
		<h1>Cadastrar</h1>
		<form method="POST" >
			<input type="text" name="nome_completo" placeholder="Nome Completo" maxlength="30">	
			<input type="text" name="usuario"placeholder="Usuário" maxlength="20">
			<input type="text" name="curso" placeholder="Curso"maxlength="50">
			<input type="text" name="semestre" placeholder="Semestre" maxlength="2">
			<input type="text" name="idade" placeholder="Idade" maxlength="2">
			<input type="email" name="email" placeholder="email" maxlength="50">
			<input type="password" name="senha" placeholder="Senha"
			 maxlength="15">
			<input type="password" name="confirmar_senha" placeholder="Confirmar Senha" maxlength="15">
			<input type="submit" value="Cadastrar">	
		</form>
		</div>

		<?php 
			//verificar se a pessoa clicou no botão casdatrar
		if(isset($_POST['nome_completo'])){
			$nome_completo = addslashes($_POST['nome_completo']);
			$usuario = addslashes($_POST['usuario']);
			$curso = addslashes($_POST['curso']);
			$Semestre= addslashes($_POST['semestre']);
			$idade = addslashes($_POST['idade']);
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			$confirmar_senha = addslashes($_POST['confirmar_senha']);
			if(!empty($nome_completo) && !empty($usuario) && !empty($curso) && !empty($semestre) && !empty($idade) && !empty($email) && !empty($senha) && !empty($confirmar_senha)){
				$u->conectar("play_chest","localhost","root","");
				if($u->msgErro = ""){
					if($senha == $confirmar_senha){
						if($u->cadastrar($nome_completo,$usuario,$curso,$semestre,$idade,$email,$senha)){
							echo "Cadastrado com sucesso! Acesse para entrar!";
								}
							else{
								echo "Email já cadastrado" ;
							}
						}
							else{
								echo "Senha e Confirmar Senha não correspondem";
					}							
				}
							else{
								echo" Erro: ".$u->msgErro;
			}
		}
						else{
								echo "Preencha todos os dados!";
	}
}
			
	

		 ?>
	</body>
</html>