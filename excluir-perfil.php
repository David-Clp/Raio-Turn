<?php
require 'config/database.php';

    $id_user = $_SESSION['user-id'];

/*     //Buscar usuario no banco de dados
    $query = "SELECT * FROM usuarios WHERE id=$id_";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    //Certifica que temos de volta apenas um usuário
    if(mysqli_num_rows($result) == 1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../imagens/' . $avatar_name;
        //Apaga aa imagem
        if($avatar_path){
            unlink($avatar_path);
        }
    } */

    //Apaga usuario do banco de dados
    $delete_user_query = "DELETE FROM usuarios WHERE id=$id_user";
    $delete_user_result = mysqli_query($connection, $delete_user_query);

    session_destroy();
    header('location: ' . ROOT_URL . 'cadastro.php');
    die();


/*     if(mysqli_errno($connection)){
        $_SESSION['delete-user'] = "Usuário {$user['nome']} não apagado!";
    } else{
        $_SESSION['delete-user-sucess'] = "Usuário {$user['nome']} apagado!";
    } */
