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
			<h1>Cadastro Aluno</h1>
			<form method="POST" >
				<input type="text" name="nome_completo" placeholder="Nome Completo" maxlength="30">	
            	<input type="text" name="usuario"placeholder="Usuário" maxlength="20" >
            	<input type="text" name="instituicao" placeholder="Instituição" maxlength="50">
				<input type="text" name="curso" placeholder="Curso"maxlength="50">
				<input type="number" name="semestre" placeholder="Semestre" maxlength="2">
            	<input type="number" name="idade" placeholder="Idade" maxlength="2">
            	<select name="sexo" id="sexo">
						<option>Sexo</option>
                    	<option value="masculino">Masculino</option>
                    	<option value="femenino">Femenino</option>
            	</select>
				<input type="email" name="email" placeholder="e-mail" maxlength="50">
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
			$instituicao = addslashes($_POST['instituicao']);
			$curso = addslashes($_POST['curso']);
			$semestre = addslashes($_POST['semestre']);
			$idade = addslashes($_POST['idade']);
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			$confirmar_senha = addslashes($_POST['confirmar_senha']);
			if(!empty($nome_completo) && !empty($usuario) && !empty($instituicao) && !empty($curso) && !empty($semestre) && !empty($idade) && !empty($email) && !empty($senha) && !empty($confirmar_senha)){
				$u->conectar("play_chest","localhost","root","");
				if($u->msgErro == ""){
					if($senha == $confirmar_senha){
						if($u->cadastrar($nome_completo,$usuario,$instituicao,$curso,$semestre,$idade,$email,$senha)){
							?>
							<div id= "msg-sucesso">Cadastrado com sucesso! Acesse para entrar!</div>
							<?php
								}
							else{
								?>
								<div class ="">Email já cadastrado</div>
								
								<?php
							}
						}
							else{
								?>
								<div class ="msg-erro">Senha e Confirmar Senha não correspondem</div>
								<?php
					}							
				}
							else{
									?>
								<div class ="msg-erro">
									<?php echo " Erro: ".$u->msgErro;?></div>
								<?php	
								
			}
		}
						else{
							?>
								<div class ="msg-erro">Preencha todos os dados!</div>
								<?php
								
	}
}
			
	

		 ?>
	</body>
</html>