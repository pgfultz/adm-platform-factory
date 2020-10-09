<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '../config.php';

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = $pdo->prepare('SELECT * FROM `admin` WHERE `email` = ? AND `password` = ?');
        $sql->execute(array($email,md5($senha)));

        if($sql->rowCount() == 1){
            $dados = $sql->fetchObject();
            session_start();
            $_SESSION['logged_id'] = $dados->id;
            $_SESSION['logged_name'] = $dados->name;

            header("location: ../index.php");
            
        }else{
            echo "<script>
            alert('Email ou senha inválidos!');
            window.location.href='../login.php';
            </script>";
        }
    }
?>