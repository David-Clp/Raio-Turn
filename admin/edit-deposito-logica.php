<?php

include 'partials/header.php';
if(isset($_POST['submit'])){
    $id_deposito = $_POST['id'];
    $situacao = $_POST['user-type'];

        //Atualiza Usuario
        $query = "UPDATE depositos SET situacao='$situacao' WHERE id=$id_deposito LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-deposito'] = "Falha para atualizar usuário";
        } else{
            $_SESSION['edit-deposito-sucess'] = "Depósito atualizado com sucesso";
            header('location: ' . ROOT_URL . 'admin/gerenciar-depositos.php');
            die();
        }
    

}