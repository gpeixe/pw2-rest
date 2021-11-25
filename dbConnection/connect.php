<?php
class connectDB{
    private $servidor = "localhost";
    private $usuario = "root";
    private $senha = "root";
    private $dbname = "pw2-rest";
    
    public function getConectaBanco(){
        $connect = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->dbname);
        return $connect;
    }

    public function disconect($connect){
        mysqli_close($connect);
    }
}
?>