<?php

 

class ProdutoDAO {
    
    private $sql;
    
    public function inserir($objProduto) {
        $this->sql = "INSERT INTO produtos (nome, preco, descricao, quantidade, id_categoria, imagem) 
            VALUES (:nome, :preco, :descricao, :quantidade, :id_categoria, :imagem)";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objProduto->getNome());
            $p->bindValue(":preco", $objProduto->getPreco());
            $p->bindValue(":descricao", $objProduto->getDescricao());
            $p->bindValue(":quantidade", $objProduto->getQuantidade());
            $p->bindValue(":id_categoria", $objProduto->getIdCategoria());
            $p->bindValue(":imagem", $objProduto->getImagem());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao inserir! ".$e->getMessage();
        }
    }

    public function alterar($objProduto) {
        $this->sql = "UPDATE produtos set nome = :nome, preco = :preco, descricao = :descricao, 
         quantidade = :quantidade, id_categoria = :id_categoria, imagem = :imagem
         WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":nome", $objProduto->getNome());
            $p->bindValue(":preco", $objProduto->getPreco());
            $p->bindValue(":descricao", $objProduto->getDescricao());
            $p->bindValue(":quantidade", $objProduto->getQuantidade());
            $p->bindValue(":id_categoria", $objProduto->getIdCategoria());
            $p->bindValue(":imagem", $objProduto->getImagem());
            $p->bindValue(":id", $objProduto->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao alterar! ".$e->getMessage();
        }
    }
    
    public function excluir($objProduto){
        $this->sql = "DELETE FROM produtos WHERE id = :id ";
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon()->prepare($this->sql);
            $p->bindValue(":id", $objProduto->getId());
            return $p->execute();
        } catch (Exception $e){
            return "Erro ao excluir! ".$e->getMessage();
        }
    }
    
    public function consultarId($id){
        $this->sql = "SELECT * from produtos where id = ".$id;
        try{
            $conexao = new Conexao();
            $p = $conexao->getCon();
            return $p->query($this->sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return "Erro ao consultar! ".$e->getMessage();
        }
    }
    
    public function consultar(){
        $this->sql = "SELECT * from produtos";
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