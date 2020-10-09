<?php include_once "components/header.php"; ?>

    <main role="main">

      <div class="album py-3 bg-light">
        <div class="container">

          <div class="row">

            <div class="a-editar">
                <h3>Adicionar novo projeto </h3>
                <form action="sys/addprojeto.php" id="form_dados_projeto" name="form_dados_projeto" method="post" enctype="multipart/form-data">
                    <div class="capa-novo-projeto">
                        <input type="file" name="input_nova_capa" id="input_nova_capa" class="input_nova_capa" accept="image/x-png,image/gif,image/jpeg" />
                        <label for="input_nova_capa" class="btn btn-primary btn-mudar-capa">Adicionar capa</label>
                    </div>
                    <br>
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
                    <input type="submit" value="Adicionar" class="btn btn-primary">
                </form>
                
            </div>
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
    <script src="js/script.js"></script>
</body>
</html>