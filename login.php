<?php require "pages/header.php" ?>

	<div class="container">
	    <h1>Login</h1>

	    <?php 
	    	require "classes/ModelUsuario.php";
	    	$user = new ModelUsuario();

	    	$post = filter_input_array(INPUT_POST);
	    	if( isset($post) ) {

	    		$email = addslashes($post['email']);
	    		$senha = addslashes($post['senha']);

	    		if ( empty($post['email']) || empty($post['senha']) ) {
	    			
	    			?><div class="alert alert-warning">
	    				Todos são obrigatórios!
	    			</div><?php

	    		}
	    		else {
	    			
	    			if ( $user->verificaLogin($email, $senha) ) {
	    				?>
    					<script type="text/javascript">window.location.href="./"</script>
	    				<?php
	    			}
	    			else {
	    				?>
	    				<div class="alert alert-danger">
	    					Email e/ou senha inválidos!
	    				</div>
	    				<?php
	    			}
	    		}
	    	}
	   	?>

	    <form method="POST">

	    	<div class="form-group">
	    		<label for="email">Email</label>
	    		<input type="text" id="email" name="email" placeholder="Ex.: email@email.com" 
	    			class="form-control" value="<?php echo ( (isset($post)) && !empty($post['email']) ) ? $post['email']:'' ?>">
	    	</div>

	    	<div class="form-group">
	    		<label for="senha">Senha</label>
	    		<input type="password" id="senha" name="senha" 
	    			class="form-control" value="<?php echo ( (isset($post)) && !empty($post['senha']) ) ? $post['senha']:'' ?>">
	    	</div>

	    	<input type="submit" name="Cadastrar" value="Cadastrar" class="btn btn-primary">

	    </form>
	</div>

<?php require "pages/footer.php" ?>

