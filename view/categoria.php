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
                        <a href="add_categoria.php" class="btn btn-primary btn-sm" role="button">Nova Categoria</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <table class="table col-md-12">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nome</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    include("../classes/config/Conexao.class.php");
                    include("../classes/model/dao/CategoriaDAO.class.php");
                    $objDAO = new CategoriaDAO();
                    $consulta = $objDAO->consultar();
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $linha['id'] ?></th>
                            <td class="text-center"><?= $linha['nome'] ?></td>
                            <td class="text-center">
                                <a href="edit_categoria.php?id=<?= $linha['id'] ?>" class="btn btn-primary btn-sm mr-3" role="button">Editar</a>
                                <a href="delete_categoria.php?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm " role="button">Deletar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                </div>
                <div class="row d-flex justify-content-center">
                    
                </div>
            </div>
        </div>
    </div>
    
	
    <!-- Optional JavaScript -->
    
  </body>
</html>