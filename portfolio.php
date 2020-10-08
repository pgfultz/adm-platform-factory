    <?php include_once "components/header.php"; ?>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Portfolio</h1>
          <a href="#" class="btn btn-primary my-2">Adicionar</a>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            <?php
            $sql = $pdo->prepare('SELECT * FROM `projects` ORDER BY `id` DESC');
            $sql->execute();
            while($ln = $sql->fetchObject()){
            ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="<?php echo SITE_BASE.'/uploads/'.$ln->logo; ?>" alt="Card image cap" />
                <div class="card-body">
                  <h4><?php echo $ln->name; ?></h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="portfolioedit.php?id=<?php echo $ln->id; ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Excluir</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
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