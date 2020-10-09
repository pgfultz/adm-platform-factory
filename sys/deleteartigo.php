<?php
require_once '../config.php';

$retorno = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $sql = $pdo->prepare('DELETE FROM `blog` WHERE `id` = ?');
    if($sql->execute(array($id))){
        $retorno = array(
            "success" => true,
            "id" => $id
        );
    }else{
        $retorno = array(
            "success" => false,
            "message" => "Ocorreu um erro inesperado!"
        );
    }
    
}else{
    $retorno = array(
        "success" => false,
        "message" => "Projeto não encontrado!"
    );
}

echo json_encode($retorno);
?>