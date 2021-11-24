<?php 
$conn = mysqli_connect('localhost', 'root', 'root', 'pw2Rest');

function isMetodo($metodo)
{
if (!strcasecmp($_SERVER['REQUEST_METHOD'], $metodo)) {
return true;
}
return false;
}

if (isMetodo('POST')) {
    $nome = $_POST['nome'];
} else if (isMetodo('DELETE')) {
    $id = $_DELETE['id'];
} else if (isMetodo('PUT')) {
    $nome = $_PUT['nome'];
    $id = $_PUT['id'];
} else if (isMetodo('GET')) {
    $categorias;
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
    } else {

    }
}


?>