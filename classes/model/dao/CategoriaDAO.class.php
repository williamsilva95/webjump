<?php

 

class CategoriaDAO {
    
    private $sql;
    
    public function inserir($objCategoria) {
        $this->sql = "INSERT INTO categorias (nome) 
            VALUES (:nome)";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objCategoria->getNome());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao inserir! ".$e->getMessage();
        }
    }

    public function alterar($objCategoria) {
        $this->sql = "UPDATE categorias set nome = :nome WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objCategoria->getNome());
            $p->bindValue(":id", $objCategoria->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao alterar! ".$e->getMessage();
        }
    }
    
    public function excluir($objCategoria){
        $this->sql = "DELETE FROM categorias WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":id", $objCategoria->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao excluir! ".$e->getMessage();
        }
    }
    
    public function consultarId($id){
        $this->sql = "SELECT * from categorias where id = ".$id;
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon();
            return $p->query($this->sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return "Erro ao consultar! ".$e->getMessage();
        }
    }
    
    public function consultar(){
        $this->sql = "SELECT * from categorias";
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