<?php
    include'../config/Conexao.class.php';
    include '../model/dao/ProdutoDAO.class.php';
    include '../model/domain/Produto.class.php';

    if ($_POST){
    
        if(isset($_POST['btnInserir']))
        {
            if(isset($_FILES['imagem']))
            {
                $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = '../../view/assets/upload/'; //Diretório para uploads 
                move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                $_POST['imagem'] = $new_name;

                $produto = new Produto('', $_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['quantidade'], 
                $_POST['id_categoria'], $_POST['imagem']);
                $pDAO = new ProdutoDAO();
                $resultado = $pDAO->inserir($produto);
                if ($resultado){
                 echo '<script> '
                        . 'alert("Inserido com sucesso");'
                        . 'window.location.href = "/Webjump/view/produto.php"'
                    . '</script>';
                }else {
                    echo '<script> '
                        . 'alert("Erro ao inserir!");'
                        . 'window.location.href = "/Webjump/view/produto.php"'
                    . '</script>';
                }
            } 
        
        } else if(isset($_POST['btnAlterar'])){

            $id = $_POST['id'];
            $con = mysqli_connect('localhost', 'root', '') or die("Erro de conexão");
            $banco = mysqli_select_db($con, 'webjump') or die("Erro ao selecionar o banco de dados");
            $sql = mysqli_query($con, "SELECT imagem FROM produtos WHERE id = $id");
            $result = mysqli_fetch_assoc($sql);
            // O trecho de codigo acima faz a requisição ao banco de dados pegando a imagem do produto a ser editado
            // Por se tratar de uma ação de edit primeiro ele ira excluir a imagem atual do diretorio para posteriormente estar salvando a nova imagem
            if(is_file('../../view/assets/upload/'.$result['imagem'])){
                $deletar = unlink('../../view/assets/upload/'.$result['imagem']); //Deleta a imagem da pasta

                if($deletar){

                    if(isset($_FILES['imagem'])){
                        $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                        $dir = '../../view/assets/upload/'; //Diretório para uploads 
                        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                        $_POST['imagem'] = $new_name;
        
                        $produto = new Produto($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['quantidade'], 
                        $_POST['id_categoria'], $_POST['imagem']);
                        $pDAO = new ProdutoDAO();
                        $resultado = $pDAO->alterar($produto);
                        if ($resultado){
                            echo '<script> '
                                . 'alert("Alterado com sucesso");'
                                . 'window.location.href = "/Webjump/view/produto.php"'
                            . '</script>';
                        } else {
                            echo '<script> '
                                . 'alert("Erro ao alterar!");'
                                . 'window.location.href = "/Webjump/view/produto.php"'
                            . '</script>';
                        }
                    }
                }
            }
        } else if(isset($_POST['btnExcluir'])){
            $id = $_POST['id'];
            $con = mysqli_connect('localhost', 'root', '') or die("Erro de conexão");
            $banco = mysqli_select_db($con, 'webjump') or die("Erro ao selecionar o banco de dados");
            $sql = mysqli_query($con, "SELECT imagem FROM produtos WHERE id = $id");
            $result = mysqli_fetch_assoc($sql);
            // O trecho de codigo acima faz a requisição ao banco de dados pegando a imagem do produto a ser excluido

            if(is_file('../../view/assets/upload/'.$result['imagem'])){
                $deletar = unlink('../../view/assets/upload/'.$result['imagem']); //Deleta a imagem da pasta

                if($deletar){
                    $produto = new Produto($_POST['id'],'','','','','','');
                    $pDAO = new ProdutoDAO();
                    $resultado = $pDAO->excluir($produto);
                    if ($resultado){
                        echo '<script> '
                                . 'alert("Excluído com sucesso");'
                                . 'window.location.href = "/Webjump/view/produto.php"'
                            . '</script>';
                    } else {
                        echo '<script> '
                                . 'alert("Erro ao excluir!");'
                                . 'window.location.href = "/Webjump/view/produto.php"'
                            . '</script>';
                    }
                }
            }else {
                echo '<script> '
                        . 'alert("Erro ao excluir!");'
                        . 'window.location.href = "/Webjump/view/produto.php"'
                    . '</script>';
            }
        }
        
    }


?>