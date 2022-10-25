<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //Apaga usuario do banco de dados
    $delete_deposito_query = "DELETE FROM depositos WHERE id=$id";
    $delete_deposito_result = mysqli_query($connection, $delete_deposito_query);
    if(mysqli_errno($connection)){
        $_SESSION['delete-deposito'] = "Usuário {$deposito['codigo_deposito']} não apagado!";
    } else{
        $_SESSION['delete-deposito-sucess'] = "Usuário {$deposito['codigo_deposito']} apagado!";
    }
}

header('location: ' . ROOT_URL . 'admin/gerenciar-depositos.php');
die();