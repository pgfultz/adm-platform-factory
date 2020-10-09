<?php

if(isset($_GET['id'])){
    require_once '../config.php';
    $id = $_GET['id'];
    $titulo = $_POST['input_titulo'];
    $categoria = $_POST['input_categoria'];
    $descricao = $_POST['txtArtigo'];

    $sql = $pdo->prepare("UPDATE `blog` SET `titulo` = ?, `categoria` = ?, `descricao` = ? WHERE `id` = ?");
    if($sql->execute(array($titulo,$categoria,$descricao,$id))){
        header("location: ../blog.php");
    }else{
        echo "<script>
        alert('Erro ao atualizar dados!');
        window.location.href='../blog.php';
        </script>";
}
}else{
    echo "<script>
    alert('Projeto não encontrado!');
    window.location.href='../blog.php';
    </script>";
}

?>