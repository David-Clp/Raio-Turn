<?php
    require 'config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin = filter_var($_POST['user-type'], FILTER_SANITIZE_NUMBER_INT);

    //verificar entradas invalidas
    if(!$nome){
        $_SESSION['edit-user'] = "Dados Invalidos!";
    } else{
        //Atualiza Usuario
        $query = "UPDATE usuarios SET nome='$nome', is_admin=$admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = "Falha para atualizar usuário";
        } else{
            $_SESSION['edit-user-sucess'] = "Usuário(a) $nome atualizado com sucesso";
        }
    }

}

header('location: ' . ROOT_URL . 'admin/gerenciar-usuarios.php');
die();