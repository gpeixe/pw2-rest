<?php
class Categoria{
    private $id;
    private $nome;
    
    function __construct($id, $nome) {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($value){
        $this->nome = $value;
    }

    public function getNome(){
        return $this->nome;
    }
}
?>