<?php include_once "components/header.php"; ?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Adicionar artigo</h1>
    </div>
  </section>

  <div class="album pb-5 bg-light">
    <div class="container">

        <div class="row">
            <form action="sys/addblog.php" id="form_blog" name="form_blog" method="post" enctype="multipart/form-data">
                <div class="capa-blog">
                    <input type="file" name="input_capa_blog" id="input_capa_blog" class="input_capa_blog" accept="image/x-png,image/gif,image/jpeg" />
                    <label for="input_capa_blog" class="btn btn-primary btn-mudar-capa">Adicionar capa</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="input_titulo">Título</label>
                    <input type="text" class="form-control" id="input_titulo" name="input_titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="input_categoria">Categoria <small class="text-muted">(Separado por virgula)</small></label>
                    <input type="text" class="form-control" id="input_categoria" name="input_categoria" placeholder="Categoria">
                </div>
                <div class="form-group">
                    <label for="input_descricao">Descrição</label>
                    <textarea class="form-control" placeholder="Artigo" name="txtArtigo" id="txtArtigo" rows="3"></textarea>
                </div>
                <input type="submit" value="Adicionar" class="btn btn-primary">
            </form>
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
<script src="ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'txtArtigo' );
</script>

</body>
</html>