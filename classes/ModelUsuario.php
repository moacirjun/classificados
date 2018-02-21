<?php

/**
 * Description of ModelUsuario
 *
 * @author Moacir Lima Jr
 */
class ModelUsuario {
    
	public function cadastrar ($pNome, $pTel, $pEmail, $pSenha) {

		global $PGSQL_PDO;

		$statment = $PGSQL_PDO->prepare("SELECT pk_id FROM public.tb_usuario WHERE email = :email");
		$statment->bindValue(":email", $pEmail);
		$statment->execute();

		if ( $statment->rowCount() > 0  ) {
			return false;
		}
		else {

			$statment = $PGSQL_PDO->prepare(
				"INSERT INTO public.tb_usuario (nome, telefone, email, senha) 
				VALUES (:nome, :tel, :email, :senha)");

			$statment->bindValue(":nome", $pNome);
			$statment->bindValue(":tel", $pTel);
			$statment->bindValue(":email", $pEmail);
			$statment->bindValue(":senha", md5($pSenha) );
			$statment->execute();

			return true;
		}
	}

	public function verificaLogin ($pEmail, $pSenha) {
		global $PGSQL_PDO;

		$statment = $PGSQL_PDO->prepare(
			"SELECT pk_id FROM public.tb_usuario 
				WHERE email = :email AND senha = :senha");
		$statment->bindValue(":email", $pEmail);
		$statment->bindValue(":senha", md5($pSenha) );
		$statment->execute();

		if ( $statment->rowCount() > 0  ) {
			$loggedUser = $statment->fetch();
			$_SESSION['cLogin'] = $loggedUser['pk_id'];
			return true;
		}
		else {
			return falsee;
		}
	}
    
}
