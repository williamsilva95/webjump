<!doctype html>
<html>
<?php include("head.php"); ?>
  <body>
  <br><br><br><br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Usuário</div>

                <div class="card-body">
                    <form method="POST" action="../classes/controller/UserController.class.php">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required autocomplete="nome" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="senha" type="password" class="form-control" name="senha" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="btnInserir" class="btn btn-primary">Cadastrar</button>
                                <a class="btn btn-link" href="../index.php">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
	
    <!-- Optional JavaScript -->

  </body>
</html>