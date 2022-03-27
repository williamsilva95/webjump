<!doctype html>
<html>
<?php include("head.php"); ?>
  <body>
  <?php include("menu.php"); ?>
  <br><br>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <?php
                include("../classes/config/Conexao.class.php");
                include("../classes/model/dao/ProdutoDAO.class.php");
                include ("../classes/model/dao/CategoriaDAO.class.php");
                if (isset($_GET['id'])) {
                    $objDAO = new ProdutoDAO();
                    $objCategoriaDAO = new CategoriaDAO();
                    $resultado = $objDAO->consultarId($_GET['id']);

            ?>
            <div class="col-md-6 mt-3">
                <div class="col mb-5">
                    <div class="card h-100">
                        <img src="./assets/upload/<?= $resultado['imagem'] ?>" alt="<?= $resultado['nome'] ?>"
                            class="card-img-top" height="290"/>
                            <div class="card-body">
                                <h2 class="card-title text-center"><?= $resultado['nome'] ?></h2>
                                <h5 class="card-title text-center">R$ <?= $resultado['preco'] ?></h5>
                                <p class="card-text text-center"><?= $resultado['descricao'] ?></p>
                            </div></small>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <p class="card-text text-left mb-0 ml-2">
                                    <small class="text-muted">Quantidade: <?= $resultado['quantidade'] ?></small>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text text-right mb-0 mr-2">
                                    <small class="text-muted"># <?php
                                        $categoria = $objCategoriaDAO->consultarId($resultado ['id_categoria']);
                                        echo $categoria['nome'];
									    ?>
                                    </small>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="produto.php" class="btn btn-primary btn-sm" role="button">Voltar</a>
                            </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
	
    <!-- Optional JavaScript -->
    <script src="assets/js/main.js"></script>
  </body>
</html>