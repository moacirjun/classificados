<?php require "pages/header.php" ?>

<div class="container">
    <h1>Cadastre-se</h1>

    <?php
    require "classes/ModelUsuario.php";
    $user = new ModelUsuario();

    $post = filter_input_array(INPUT_POST);
    if (isset($post) && !empty($post['nome'])) {

        $nome = addslashes($post['nome']);
        $tel = addslashes($post['tel']);
        $email = addslashes($post['email']);
        $senha = addslashes($post['senha']);

        if (empty($post['nome']) || empty($post['email']) || empty($post['senha'])) {
            ?><div class="alert alert-warning">
                O campos Nome, Email, e Senha são obrigatórios!
            </div><?php
    } else {

        if ($user->cadastrar($nome, $tel, $email, $senha)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso. 
                    <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
            <?php
        } else {
            ?>
                <div class="alert alert-warning">
                    Este usuário já existe! 
                    <a href="login.php">Faça o cadastro agora.</a>
                </div>
            <?php
        }
    }
}
?>

    <form method="POST">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome..." 
                   class="form-control" 
                   value="<?php echo ( (isset($post)) && !empty($post['nome']) ) ? $post['nome'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="tel">Telefone</label>
            <input type="text" id="tel" name="tel" placeholder="(92) 98243-8992" 
                   class="form-control" 
                   value="<?php echo ( (isset($post)) && !empty($post['tel']) ) ? $post['tel'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Ex.: email@email.com" 
                   class="form-control" 
                   value="<?php echo ( (isset($post)) && !empty($post['email']) ) ? $post['email'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" 
                   class="form-control" 
                   value="<?php echo ( (isset($post)) && !empty($post['senha']) ) ? $post['senha'] : '' ?>">
        </div>

        <input type="submit" name="Cadastrar" value="Cadastrar" class="btn btn-primary">

    </form>
</div>

<?php require "pages/footer.php" ?>

