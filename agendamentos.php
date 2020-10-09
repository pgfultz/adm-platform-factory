<?php include_once "components/header.php"; ?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Agendamentos</h1>
    </div>
  </section>

  <div class="album py-1 bg-light">
    <div class="container">

      <div class="row">
      <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Serviço</th>
            <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = $pdo->prepare('SELECT * FROM `book_call` ORDER BY `id` DESC');
        $sql->execute();
        while($ln = $sql->fetchObject()){
        ?>
            <tr>
                <th scope="row"><?php echo $ln->id; ?></th>
                <td><?php echo $ln->client_name; ?></td>
                <td><?php echo $ln->client_email; ?></td>
                <td><?php echo $ln->client_phone; ?></td>
                <td><?php echo $ln->service; ?></td>
                <td><?php echo $ln->description; ?></td>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>