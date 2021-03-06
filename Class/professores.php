<?php 

Class Professor
{	
	private $pdo;
	public $msgErro = "";
	public function conectar($nome,$host,$usuario,$senha){
		global $pdo; 
		try {
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);	
		} catch (PDOException $e) {
			$msgErro = $e -> getMessage();
		}
		
	}	

	public function cadastrar($nome_completo,$usuario,$instituicao,$disciplinas_leciona,$idade,$email,$senha){
		global $pdo;
		//Verificar se ha email cadastrado 
		$sql = $pdo ->prepare("SELECT id FROM professores WHERE email = :e");
		$sql ->bindValue(":e", $email);
		$sql ->execute();
		if($sql->rowCount()>0){
			return false;
		}
		//caso não
		else{
			$sql = $pdo->prepare("INSERT INTO professores (nome_completo,usuario,instituicao,disciplinas_leciona,idade,email,senha) VALUES(:n, :u, :t, :d, :i, :e, :p)");
			$sql ->bindValue(":n", $nome_completo);
			$sql ->bindValue(":u", $usuario);
			$sql ->bindValue(":t", $instituicao);
			$sql ->bindValue(":d", $disciplinas_leciona);			
			$sql ->bindValue(":i", $idade);
			$sql ->bindValue(":e", $email);
			$sql ->bindValue(":p", md5($senha));
			$sql ->execute();
			return true;
		}
	}

	public function logar($email,$senha){
		global $pdo;
			//verificar se o email e senha estao cadastrados 
		$sql = $pdo->prepare("SELECT id_usuario FROM professores WHERE email = :e AND senha = :p");
		$sql ->bindValue(":e", $email);
		$sql ->bindValue(":p", md5($senha));
		$sql ->execute();
		if($sql -> rowCount() >0){
			//entrar no sistema sessão	
			$dado = $sql -> fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			return true; //logado com sucesso
		}else{
			return false; //não conseguiu logar
		}	
	}		
}
 ?>