<?php 
	require_once 'Class/professores.php';
	$u = new Professor;
 ?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Play Chest</title>
		<link rel="stylesheet" href="CSS/Style.css">
	</head>
	<body>
		<div id="corpo-form-cad">
		<h1>Cadastro Professor</h1>
		<form method="POST" >
			<input type="text" name="nome_completo" placeholder="Nome Completo" maxlength="30">	
            <input type="text" name="usuario"placeholder="Usuário" maxlength="20">
            <input type="text" name="instituicao" placeholder="Instituição" maxlength="50">
            <input type="number" name="idade" placeholder="Idade" maxlength="2">
            <input type="text" name="disciplinas_leciona" placeholder="Disciplinas que Leciona" maxlength="50">
			<select  name="sexo" id="sexo" >
                <option>Sexo</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
			
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
			$disciplinas_leciona = addslashes($_POST['disciplinas_leciona']);
			$idade = addslashes($_POST['idade']);
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			$confirmar_senha = addslashes($_POST['confirmar_senha']);
			if(!empty($nome_completo) && !empty($usuario) && !empty($instituicao) && !empty($disciplinas_leciona) && !empty($idade) && !empty($email) && !empty($senha) && !empty($confirmar_senha)){
				$u->conectar("play_chest","localhost","root","");
				if($u->msgErro == ""){
					if($senha == $confirmar_senha){
						if($u->cadastrar($nome_completo,$usuario,$instituicao,$disciplinas_leciona,$idade,$email,$senha)){
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