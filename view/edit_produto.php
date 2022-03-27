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
                Alterar Produto
            </div>
            <div class="card-body">
            <?php
                include("../classes/config/Conexao.class.php");
                include("../classes/model/dao/ProdutoDAO.class.php");
                if (isset( $_GET['id'] )) {
                    $objDAO = new ProdutoDAO();
                    $resultado = $objDAO->consultarId($_GET['id']);

            ?>
                <form action="../classes/controller/ProdutoController.class.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $resultado['id'] ?>" />
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" required value="<?= $resultado['nome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="descricao" rows="3" required ><?= $resultado['descricao'] ?></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="preco">Preço</label>
                            <input name="preco" type=number step=0.01 class="form-control" id="preco" required value="<?= $resultado['preco'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="quantidade">Quantidade</label>
                            <input name="quantidade" type="text" class="form-control" id="quantidade" required value="<?= $resultado['quantidade'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_categoria">Categoria</label>
                        <select class="form-control" name="id_categoria" required>
                        <?php
                            include("../classes/model/dao/CategoriaDAO.class.php");
                            $objDAO = new CategoriaDAO();
                            $consulta = $objDAO->consultar();
                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?= $linha['id'] ?>"
                            <?php if ($linha['id'] == $resultado['id_categoria']) echo " selected";?>    
                            ><?= $linha['nome'] ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input name="imagem" type="file" class="form-control-file" accept="image/*" required value="./assets/upload/<?= $resultado['imagem'] ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm mr-3" id="btnAlterar" name="btnAlterar">Salvar</button>
                    <a class="btn btn-link" href="produto.php">Voltar</a>
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