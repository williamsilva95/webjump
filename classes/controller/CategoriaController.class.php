<?php
    include'../config/Conexao.class.php';
    include '../model/dao/CategoriaDAO.class.php';
    include '../model/domain/Categoria.class.php';

    if ($_POST){
    
        if(isset($_POST['btnInserir'])){

            $categoria = new Categoria('', $_POST['nome']);
                $cDAO = new CategoriaDAO();
                $resultado = $cDAO->inserir($categoria);
                if ($resultado){
                    echo '<script> '
                            . 'alert("Inserido com sucesso");'
                            . 'window.location.href = "/Webjump/view/categoria.php"'
                        . '</script>';
                } else {
                    echo '<script> '
                            . 'alert("Erro ao inserir!");'
                            . 'window.location.href = "/Webjump/view/categoria.php"'
                        . '</script>';
                }
        } else if(isset($_POST['btnAlterar'])){
            $categoria = new Categoria($_POST['id'], $_POST['nome']);
            $cDAO = new CategoriaDAO();
            $resultado = $cDAO->alterar($categoria);
            if ($resultado){
                echo '<script> '
                        . 'alert("Alterado com sucesso");'
                        . 'window.location.href = "/Webjump/view/categoria.php"'
                    . '</script>';
            } else {
                echo '<script> '
                        . 'alert("Erro ao alterar!");'
                        . 'window.location.href = "/Webjump/view/categoria.php"'
                    . '</script>';
            }
        } else if(isset($_POST['btnExcluir'])){
            $categoria = new Categoria($_POST['id'],'');
            $cDAO = new CategoriaDAO();
            $resultado = $cDAO->excluir($categoria);
            if ($resultado){
                echo '<script> '
                        . 'alert("Excluído com sucesso");'
                        . 'window.location.href = "/Webjump/view/categoria.php"'
                    . '</script>';
            } else {
                echo '<script> '
                        . 'alert("Erro ao excluir!");'
                        . 'window.location.href = "/Webjump/view/categoria.php"'
                    . '</script>';
            }
        }
        
    }

?>