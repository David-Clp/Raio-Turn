<?php
require 'config/database.php';

// obter dados de formulário se botão de login foi clicado
if(isset($_POST['submit'])){
    $cpf_email = filter_var($_POST['cpf_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['cpf_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Validar os valores
if(!$cpf_email){
    $_SESSION['login'] = "CPF ou email requiridos";
} elseif(!$password){
    $_SESSION['login'] = "Senha requirido";
} else{
    //Buscar o usuario no banco de dados
    $user_query = "SELECT * FROM usuarios WHERE cpf='$cpf_email' OR email='$cpf_email'";
    $user_result = mysqli_query($connection,$user_query);

    if(mysqli_num_rows($user_result) == 1){
        //Converter o registro em uma variavel
        $user = mysqli_fetch_assoc($user_result);
        $db_password = $user['password'];

        //Compara senha digitada com a do banco de dados
        if(password_verify($password, $db_password)){
            //Sessaõ definida para o controle de acesso
            $_SESSION['user-id'] = $user['id'];
            //Definir sessao se o usuario for um administrador
            if($user['is_admin'] == 1){
                $_SESSION['user_admin'] = true;
            }
            //logar o usuario
            header('location: ' . ROOT_URL );
        }else{
                $_SESSION['login'] = "Verifique os dados digitados";
            }
        }else{
            $_SESSION['login'] = "Usuario não encontrado";
    }
}

    //Se houver algum problema, redirecione de volta para página de login com os dados
    if(isset($_SESSION['login'])){
        $_SESSION['login-dados'] = $_POST;
        header('location ' . ROOT_URL . 'login.php');
        die();
    }else{
        header('location ' . ROOT_URL . 'login.php');
        die();
    }
}