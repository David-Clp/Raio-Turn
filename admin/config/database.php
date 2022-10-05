<?php


require 'config/constants.php';

//Conexão com o banco de dados
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);



if(mysqli_errno($connection)){
   die(mysqli_errno($connection));
}

// Verificaoes para não usuarios nao acessarem as paginas ou serem acessadas paginas idevidas
/* if(!isset($_SESSION['user-id']) && $_SERVER["REQUEST_URI"] != '/raio_turn/'){
   header("Location: ". ROOT_URL . "login.php");
}

if($_SERVER["REQUEST_URI"] != '/raio_turn/config/'){
   header("Location: ". ROOT_URL . "login.php");
} */
