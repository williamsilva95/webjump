<?php

 

class User {
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    
    public function __construct($id, $nome, $email, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    
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


    public function setEmail($email): void {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }


    public function setSenha($senha): void {
        $this->senha = $senha;
    }
    public function getSenha() {
        return $this->senha;
    }
 
}
?>