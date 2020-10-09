<?php

if(isset($_GET['id'])){
    require_once '../config.php';
    $id = $_GET['id'];
    $nome = $_POST['input_nome'];
    $tecnologias = $_POST['input_tecnologias'];
    $descricao = $_POST['input_descricao'];

    $sql = $pdo->prepare("UPDATE `projects` SET `name` = ?, `technologies` = ?, `descr` = ? WHERE `id` = ?");
    if($sql->execute(array($nome,$tecnologias,$descricao,$id))){
        header("location: ../portfolioedit.php?id=".$id);
    }else{
        echo "<script>
        alert('Erro ao atualizar dados!');
        window.location.href='../portfolioedit.php?id=".$id."';
        </script>";
}
}else{
    echo "<script>
    alert('Projeto não encontrado!');
    window.location.href='../portfolioedit.php?id=".$id."';
    </script>";
}

?>