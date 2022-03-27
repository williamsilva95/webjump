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
                Adicionar Produto
            </div>
            <div class="card-body">
                <form action="../classes/controller/ProdutoController.class.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="descricao" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="preco">Preço</label>
                            <input name="preco" type=number step=0.01 class="form-control" id="preco" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="quantidade">Quantidade</label>
                            <input name="quantidade" type="text" class="form-control" id="quantidade" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_categoria">Categoria</label>
                        <select class="form-control" id="id_categoria" name="id_categoria" required>
                        <option disabled selected>Selecione</option>
                        <?php
                            include("../classes/config/Conexao.class.php");
                            include("../classes/model/dao/CategoriaDAO.class.php");
                            $objDAO = new CategoriaDAO();
                            $resultado = $objDAO->consultar();
                            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input name="imagem" type="file" class="form-control-file" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm mr-3" id="btnInserir" name="btnInserir">Salvar</button>
                    <a class="btn btn-link" href="produto.php">Voltar</a>
                </form>
            </div>
        </div>
        </div>
    </div>
	
    <!-- Optional JavaScript -->
  </body>
</html>