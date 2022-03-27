<?php

 

class Produto {
    
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $quantidade;
    private $id_categoria;
    private $imagem;
    
    
    public function __construct($id, $nome, $preco, $descricao, $quantidade, $id_categoria, $imagem) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->id_categoria = $id_categoria;
        $this->imagem = $imagem;
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }


    public function setNome($nome): void {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }


    public function setPreco($preco): void {
        $this->preco = $preco;
    }
    public function getPreco() {
        return $this->preco;
    }


    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }
    public function getDescricao() {
        return $this->descricao;
    }


    public function setQuantidade($quantidade): void {
        $this->quantidade = $quantidade;
    }
    public function getQuantidade() {
        return $this->quantidade;
    }


    public function setIdCategoria($id_categoria): void {
        $this->id_categoria = $id_categoria;
    }
    public function getIdCategoria() {
        return $this->id_categoria;
    }


    public function setImagem($imagem): void {
        $this->imagem = $imagem;
    }
    public function getImagem() {
        return $this->imagem;
    }

}
?>