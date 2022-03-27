<?php

 

class UserDAO {
    
    private $sql;
    
    public function inserir($objUser) {
        $this->sql = "INSERT INTO users (nome, email, senha) 
            VALUES (:nome, :email, :senha)";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objUser->getNome());
            $p->bindValue(":email", $objUser->getEmail());
            $p->bindValue(":senha", $objUser->getSenha());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao inserir! ".$e->getMessage();
        }
    }

    public function alterar($objUser) {
        $this->sql = "UPDATE users set nome = :nome, email = :email, senha = :senha WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objUser->getNome());
            $p->bindValue(":email", $objUser->getEmail());
            $p->bindValue(":senha", $objUser->getSenha());
            $p->bindValue(":id", $objUser->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao alterar! ".$e->getMessage();
        }
    }
    
    public function excluir($objUser){
        $this->sql = "DELETE FROM users WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":id", $objUser->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao excluir! ".$e->getMessage();
        }
    }
    
    public function consultarId($id){
        $this->sql = "SELECT * from users where id = ".$id;
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon();
            return $p->query($this->sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return "Erro ao consultar! ".$e->getMessage();
        }
    }
    
    public function consultar(){
        $this->sql = "SELECT * from users";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon();
            return $p->query($this->sql);
        } catch (Exception $e){
            return "Erro ao consultar! ".$e->getMessage();
        }
    }
    
    

}
?>