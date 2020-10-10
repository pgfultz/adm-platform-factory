<?php
    require_once 'config.php';

    if(!isset($_SESSION['logged_id']) AND !isset($_SESSION['logged_name'])){
        include_once "login.php";
        die;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Platform Factory</title>
    <link rel="icon" href="img/logo.png">
    
    <!-- Principal CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body> 
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo BASE; ?>">Administração</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE; ?>/">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE; ?>/agendamentos.php">Agendamentos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE; ?>/portfolio.php">Portfolio</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE; ?>/blog.php">Blog</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['logged_name']; ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Add User</a>
                <a class="dropdown-item" href="#">Configs</a>
                <a class="dropdown-item" href="sys/logout.php">Sair</a>
                </div>
            </li>
        </ul>
      </div>
    </nav>