<?php 
include_once("../dbCOnnection/connect.php");
include_once("../models/categoria.php");

function isMetodo($metodo)
{
if (!strcasecmp($_SERVER['REQUEST_METHOD'], $metodo)) {
return true;
}
return false;
}

if (isMetodo('POST')) {
    $entityBody = json_decode(file_get_contents('php://input'), true);
    if (!isset($entityBody['nome'])) {
        http_response_code(400);
        exit;
    }
    $connect = new connectDB();
    $nome = $entityBody['nome'];
    $id = uniqid();
    $query = "INSERT INTO categoria (id, nome) VALUES ('$id','$nome')";
    $con = mysqli_query($connect->getConectaBanco(), $query);
    $connect->disconect($connect->getConectaBanco());
    http_response_code(201);
} else if (isMetodo('DELETE')) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if(!isset($queries['id'])) {
        http_response_code(400);
        exit;
    }
    $connect = new connectDB();
    $id = $queries['id'];
    $query = "SELECT * FROM noticia WHERE categoria_id = '$id'";
    $con = mysqli_query($connect->getConectaBanco(),$query);
    $categorias = array();
    $count = 0;
    while ($dado = $con->fetch_array()) {
            $count++;
    }
    if ($count >= 1) {
        http_response_code(403);
        exit;
    }
    $query= "DELETE FROM categoria WHERE id = '$id'";
    mysqli_query($connect->getConectaBanco(), $query); 
    $connect->disconect($connect->getConectaBanco());
    http_response_code(200);
} else if (isMetodo('PUT')) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if(!isset($queries['id'])) {
        http_response_code(400);
        exit;
    }
    $entityBody = json_decode(file_get_contents('php://input'), true);
    if (!isset($entityBody['nome'])) {
        http_response_code(400);
        exit;
    }
    $connect = new connectDB();
    $nome = $entityBody['nome'];
    $id = $queries['id'];
    $query= "UPDATE categoria SET nome = '$nome' WHERE id = '$id'";
    $con = mysqli_query($connect->getConectaBanco(),$query);
    $connect->disconect($connect->getConectaBanco());
    http_response_code(200);
} else if (isMetodo('GET')) {
    $queries = array();
    $connect = new connectDB();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if (isset($queries['id'])) {
        $connect = new connectDB();
        $query = "SELECT * FROM categoria WHERE id =".$id;
        $con = mysqli_query($connect->getConectaBanco(),$query);
        $dado = $con->fetch_array();
        if (!isset($dato['id'])) {
            http_response_code(404);
            exit;
        }
        $connect->disconect($connect->getConectaBanco());
        return new Categoria($dado["id"],$dado["nome"]);
    } else {
        $query = "SELECT * FROM categoria";
        $con = mysqli_query($connect->getConectaBanco(),$query);
        $categorias = array();
        while ($dado = $con->fetch_array()) {
            $categoria = new Categoria($dado["id"],$dado["nome"]);
            array_push($categorias, $categoria);
        }
        $connect->disconect($connect->getConectaBanco());
        return $categorias;
    }
}
?>