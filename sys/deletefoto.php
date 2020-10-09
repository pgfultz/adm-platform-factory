<?php
    if (isset($_GET['id'])) {
        require_once '../config.php';

        $id = $_GET['id'];
        $id_project = $_GET['id_project'];
        $photo_name = $_GET['photo_name'];
        $photo_path = '../uploads/'.$photo_name;

        if(file_exists($photo_path)){
            unlink($photo_path);
        }

        $sql = $pdo->prepare('DELETE FROM `projects_photos` WHERE `id` = ?');
        if($sql->execute(array($id))){

            header("location: ../portfolioedit.php?id=".$id_project);
            
        }else{
            echo "<script>
            alert('Ocorreu um erro!');
            window.location.href='../portfolioedit.php?id=".$id_project."';
            </script>";
        }
    }else{
        echo "<script>
        alert('Ocorreu um erro!');
        window.location.href='../portfolioedit.php?id=".$id_project."';
        </script>";
    }
?>