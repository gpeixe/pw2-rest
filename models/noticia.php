<?php
class Noticia{
    private $id;
    private $titulo;
    private $subtitulo;
    private $conteudo;
    private $data;
    private $editavel;
    
    function __construct($id, $titulo, $subtitulo, $conteudo, $data, $editavel) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->conteudo = $conteudo;
        $this->data = $data;
        $this->editavel = $editavel;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setTitulo($value){
        $this->titulo = $value;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setSubtitulo($value){
        $this->subtitulo = $value;
    }

    public function getSubtitulo(){
        return $this->subtitulo;
    }

    public function setConteudo($value){
        $this->conteudo = $value;
    }

    public function getConteudo(){
        return $this->conteudo;
    }  
    
    public function setData($value){
       $this->data = $value;
    } 

    public function getData(){
        return $this->data;
    } 

    public function setEditavel($value){
        $this->editavel = $value;
     } 
 
     public function getEditavel(){
         return $this->editavel;
     } 
}

?>