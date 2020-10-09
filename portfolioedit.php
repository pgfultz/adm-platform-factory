    <?php
    
    include_once "components/header.php";
    
    if(isset($_GET['id'])){

        $id = $_GET['id'];
    ?>

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
            $sql = $pdo->prepare('SELECT * FROM `projects` WHERE `id` = ?');
            $sql->execute(array($id));
            if($sql->rowCount() != 0){
                $ln = $sql->fetchObject();
            ?>
            <div class="a-editar">
                <h4>Capa</h4>
                <div class="capa-projeto" style="background-image: url('<?php echo BASE."/uploads/".$ln->logo; ?>')">
                    <button class="btn btn-primary btn-mudar-capa">Trocar</button>
                </div>
                
                <br><br>
                <h4>Fotos</h4>
                <div class="a-fotos">
                    <?php
                        $sql_fotos = $pdo->prepare("SELECT * FROM `projects_photos` WHERE `project_id` = ?");
                        $sql_fotos->execute(array($id));
                        while($fotos = $sql_fotos->fetchObject()){
                        ?>
                            <div class="foto" style="background-image: url('<?php echo BASE."/uploads/".$fotos->photo; ?>')">
                                <div class="f-escuro"></div>
                                <a href="sys/deletefoto.php?id=<?php echo $fotos->id; ?>&id_project=<?php echo $id; ?>&photo_name=<?php echo $fotos->photo; ?>">
                                    <div class="btn-apagar-foto">X</div>
                                </a>
                            </div>
                    <?php
                        }
                    ?>
                    <div class="foto">
                        <form action="sys/addfoto.php?id_project=<?php echo $id; ?>" id="form_add_foto" method="post" enctype="multipart/form-data">
                            <input type="file" name="input_foto" id="input_foto" class="input_foto" accept="image/x-png,image/gif,image/jpeg" />
                            <label for="input_foto" class="btn-add-foto bg-primary">+</label>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }else{
                echo '<h3 class="mt-4">Algo deu errado!</h3>';
            }
            ?>
          </div>
        </div>
      </div>

    </main>

    <?php
    }else{
        echo '<h3 class="mt-4">Algo deu errado!</h3>';
    }
    ?>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>