    <?php
    
    include_once "components/header.php";
    
    if(isset($_GET['id'])){

        $id = $_GET['id'];
    ?>

    <main role="main">

      <div class="album py-3 bg-light">
        <div class="container">

          <div class="row">

            <?php
            $sql = $pdo->prepare('SELECT * FROM `projects` WHERE `id` = ?');
            $sql->execute(array($id));
            if($sql->rowCount() != 0){
                $ln = $sql->fetchObject();
            ?>
            <div class="a-editar">
                <h3>Editando - <?php echo $ln->name; ?></h3>
                <form action="sys/editprojectdata.php?id=<?php echo $ln->id; ?>" id="form_dados_projeto" name="form_dados_projeto" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input_nome">Nome</label>
                        <input type="text" class="form-control" id="input_nome" name="input_nome" value="<?php echo $ln->name; ?>" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="input_tecnologias">Tecnologias <small class="text-muted">(Separado por virgula)</small></label>
                        <input type="text" class="form-control" id="input_tecnologias" name="input_tecnologias" value="<?php echo $ln->technologies; ?>" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="input_descricao">Descrição</label>
                        <textarea class="form-control" placeholder="Descrição" name="input_descricao" id="input_descricao" rows="3"><?php echo $ln->descr; ?></textarea>
                    </div>
                    <input type="submit" value="Alterar dados" class="btn btn-primary">
                </form>
                <hr />
                <h4 class="mt-5">Capa</h4>
                <div class="capa-projeto" style="background-image: url('<?php echo BASE."/uploads/".$ln->logo; ?>')">
                    <form action="sys/addcapa.php?id_project=<?php echo $id; ?>&photo_name=<?php echo $ln->logo; ?>" id="form_add_capa" method="post" enctype="multipart/form-data">
                        <input type="file" name="input_capa" id="input_capa" class="input_capa" accept="image/x-png,image/gif,image/jpeg" />
                        <label for="input_capa" class="btn btn-primary btn-mudar-capa">Trocar</label>
                    </form>
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