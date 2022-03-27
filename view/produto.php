<!doctype html>
<html>
<?php include("head.php"); ?>
  <body>
  <?php include("menu.php"); ?>
    
  <div class="container mt-4">
        <br/>
        <div class="card">
            <div class="card-header text-right">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="add_produto.php" class="btn btn-primary btn-sm" role="button">Novo Produto</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    include("../classes/config/Conexao.class.php");
                    include("../classes/model/dao/ProdutoDAO.class.php");
                    include("../classes/model/dao/CategoriaDAO.class.php");
                    $objDAO = new ProdutoDAO();
                    $objCategoriaDAO = new CategoriaDAO();
                    $consulta = $objDAO->consultar();
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                            <img src="./assets/upload/<?= $linha['imagem'] ?>" alt="<?= $linha['nome'] ?>"
                                     class="card-img-top" height="230"/>
                                <div class="card-body">
                                    <h2 class="card-title text-center"><?= $linha['nome'] ?></h2>
                                    <h5 class="card-title text-center">R$ <?= $linha['preco'] ?></h5>
                                    <p class="card-text text-center"><?= $linha['descricao'] ?></p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <p class="card-text text-left mb-0 ml-1">
                                        <small class="text-muted">Quantidade: <?= $linha['quantidade'] ?></small>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text text-right mb-0 mr-1">
                                        <small class="text-muted"># <?php
                                            $categoria = $objCategoriaDAO->consultarId($linha ['id_categoria']);
                                            echo $categoria['nome'];
									        ?>
                                        </small>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="view_produto.php?id=<?= $linha['id'] ?>" class="btn btn-success btn-sm mr-3" role="button">Vizualizar</a>
                                    <a href="edit_produto.php?id=<?= $linha['id'] ?>" class="btn btn-primary btn-sm mr-3" role="button">Editar</a>
                                    <a href="delete_produto.php?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm " role="button">Deletar</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="row d-flex justify-content-center">
                    
                </div>
            </div>
        </div>
    </div>
    
	
    <!-- Optional JavaScript -->
    
  </body>
</html>