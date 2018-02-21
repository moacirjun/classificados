<?php require 'pages/heder.php' ?>

<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="anuncio-add.php" class="btn btn-primary">Adicionar Anúncio</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Foto</td>
                <td>Tútulo</td>
                <td>Valor</td>
                <td>Ações</td>
            </tr>
        </thead>

        <?php
        require 'classes/ModelAnuncios.php';
        $Anuncio = new ModelAnuncios();
        $listaAnuncios = $Anuncio->getAllAnuncios();

        foreach ($listaAnuncios as $item) :
            ?>

            <tr>
                <td><img src="assets/images/anuncios/ <?php echo $itme['url'] ?>"></td>
                <td>R$ <?php echo $item['titulo'] ?></td>
                <td><?php echo $item['valor'] ?></td>
                <td></td>
            </tr>

        <?php endforeach ?>

    </table>
</div>

<?php require 'pages/footer.php' ?>