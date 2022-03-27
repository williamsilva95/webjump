<?php
    include'../config/Conexao.class.php';
    include '../model/dao/UserDAO.class.php';
    include '../model/domain/User.class.php';

    if ($_POST){
    
        if(isset($_POST['btnInserir'])){

            $user = new User('', $_POST['nome'], $_POST['email'], $_POST['senha']);
                $uDAO = new UserDAO();
                $resultado = $uDAO->inserir($user);
                if ($resultado){
                    echo '<script> '
                        . 'alert("Inserido com sucesso");'
                        . 'window.location.href = "/Webjump/index.php"'
                        . '</script>';
                } else {
                    echo '<script> '
                        . 'alert("Erro ao inserir!");'
                        . 'window.location.href = "/Webjump/index.php"'
                    . '</script>';
                }
        } else if(isset($_POST['btnAlterar'])){
            $user = new User($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
            $uDAO = new UserDAO();
            $resultado = $uDAO->alterar($user);
            if ($resultado){
                echo '<script> '
                        . 'alert("Alterado com sucesso");'
                        . 'window.location.href = "/Webjump/index.php"'
                    . '</script>';
            } else {
                echo '<script> '
                        . 'alert("Erro ao alterar!");'
                        . 'window.location.href = "/Webjump/index.php"'
                    . '</script>';
            }
        } else if(isset($_POST['btnExcluir'])){
            $user = new User($_POST['id'],'', '','');
            $uDAO = new UserDAO();
            $resultado = $uDAO->excluir($user);
            if ($resultado){
                echo '<script> '
                        . 'alert("Excluído com sucesso");'
                        . 'window.location.href = "/Webjump/index.php"'
                    . '</script>';
            } else {
                echo '<script> '
                        . 'alert("Erro ao excluir!");'
                        . 'window.location.href = "/Webjump/index.php"'
                    . '</script>';
            }
        }
        
    }

?>