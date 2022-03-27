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
                Alterar Categoria
            </div>
            <div class="card-body">
            <?php
                include("../classes/config/Conexao.class.php");
                include("../classes/model/dao/CategoriaDAO.class.php");
                if (isset($_GET['id'])) {
                    $objDAO = new CategoriaDAO();
                    $resultado = $objDAO->consultarId($_GET['id']);

            ?>
                <form action="../classes/controller/CategoriaController.class.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $resultado['id'] ?>" />
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" required value="<?= $resultado['nome'] ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm mr-3" id="btnAlterar" name="btnAlterar">Salvar</button>
                    <a class="btn btn-link" href="categoria.php">Voltar</a>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
        </div>
    </div>
	
    <!-- Optional JavaScript -->
  </body>
</html>