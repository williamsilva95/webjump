<!doctype html>
<html>
<?php include("head.php"); ?>
  <body>
  <?php include("menu.php"); ?>
  <br><br>
    <div class="d-flex justify-content-center">
        <br/>
        <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                Adicionar Categoria
            </div>
            <div class="card-body">
                <form action="../classes/controller/CategoriaController.class.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm mr-3" id="btnInserir" name="btnInserir">Salvar</button>
                    <a class="btn btn-link" href="categoria.php">Voltar</a>
                </form>
            </div>
        </div>
        </div>
    </div>
	
    <!-- Optional JavaScript -->
  </body>
</html>