<?php include_once "components/header.php"; ?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Blog</h1>
      <a href="addblog.php" class="btn btn-primary my-2">Adicionar artigo</a>
    </div>
  </section>

  <div class="album py-1 bg-light">
    <div class="container">

      <div class="row">
      <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Data</th>
            <th scope="col">Autor</th>
            <th scope="col">Titulo</th>
            <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = $pdo->prepare('SELECT * FROM `blog` ORDER BY `id` DESC');
        $sql->execute();
        while($ln = $sql->fetchObject()){
            $date = new DateTime($ln->created_at);
        ?>
            <tr>
                <th style="width: 15%"><?php echo $date->format('d/m/Y H:i'); ?></th>
                <td style="width: 15%"><?php echo $ln->autor; ?></td>
                <td style="width: 50%"><?php echo $ln->titulo; ?></td>
                <td style="width: 20%"><a href="editblog.php?id=<?php echo $ln->id; ?>" class="btn btn-primary">Editar</a> | <button class="btn btn-danger" onclick="excluirArtigo(<?php echo $ln->id; ?>)">Excluir</button></td>
            </tr>
        <?php
        }
        ?>

            </tbody>
        </table>
      </div>
    </div>
  </div>

</main>

<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>