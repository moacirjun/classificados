<?php

/**
 * Description of ModelAnuncio
 *
 * @author Tracajá
 */
class ModelAnuncio {
    
    public function getAllAnuncios () {
        global $PGSQL_PDO;
        
        $listAnuncios = array();
        $statment = $PGSQL_PDO->prepare("SELECT * FROM tb_anuncio WHERE id_usuario = :id");
        $statment->bindValue(":id", $_SESSION['cLogin']);
        $statment->execute();

        if ( $statment->rowCount() > 0 ) {
            $listAnuncios = $statment->fetchAll();
        }

        return $listAnuncios;
    }
}
