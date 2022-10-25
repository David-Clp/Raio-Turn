<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $estado = filter_var($_POST['estado'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin = filter_var($_POST['user-type'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

// Validar os valores
if(!$nome){
    $_SESSION['add-user'] = "Por favor digite seu nome";
} elseif (!$email){
    $_SESSION['add-user'] = "Por favor digite seu email";
} elseif (!$cpf){
    $_SESSION['add-user'] = "Por favor digite seu CPF";
} elseif (!$cidade){
    $_SESSION['add-user'] = "Por favor digite sua cidade";
} elseif (!$estado){
    $_SESSION['add-user'] = "Por favor digite seu estado";
} elseif (strlen($password) < 8){
    $_SESSION['add-user'] = 'A senha deve te mais de 8 caracteres';
} elseif (!$avatar['name']){
    $_SESSION['add-user'] = "Por favor adicione uma foto de perfil";
} else{

        $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT); //Criptografar senha

        //verifica se o CPF ou email ja existe no banco de dados
        $user_check_query = "SELECT * FROM usuarios WHERE cpf = '$cpf' OR email = '$email'";
        $user_check_result = mysqli_query($connection, $user_check_query);
        if(mysqli_num_rows($user_check_result) > 0){
            $_SESSION['add-usuario'] = "CPF ou Email já cadastrados";
        } else{
            //Logica do avatar
            //Renomear foto
            $time = time(); // Renomea nome da imagem usando tempo, para cada foto ter nome unico
            $avatar_name = $time . $avatar['name'];
            $avatar_tmp_name = $avatar['tmp_name'];
            $avatar_destination_path = '../imagens/users/' . $avatar_name;

            //verificar se é mesmo uma imagem
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extention = explode('.', $avatar_name);
            $extention = end($extention);
            if(in_array($extention, $allowed_files)){
                //Certifica que a imagem não é muito grande (5mb+)
                if($avatar['size'] < 5000000){
                    // Upload imagem
                    move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                } else{
                    $_SESSION['add-usuario'] = "Tamanho da imagem muito grande, deve ser menor que 5mb";
                }
            } else{
                $_SESSION['add-usuario'] = "Formato de arquivo incorreto, são aceitos os formatos png, jpg ou jpeg";
            }
        }
}

// Redireciona de volta a pagina de cadastro se houver um erro com os valores
if(isset($_SESSION['add-user'])){
    //Passar dados de formulário de volta para pagina de cadastro
    $_SESSION['add-user-valores'] = $_POST;
    echo "<script>window.location = 'add-usuario.php'</script>";
    /* header('location: ' . ROOT_URL . 'admin/'); */
    die();
} else{
    //Insere os dados do usuario na tabela do banco de dados
    $insert_user_query = "INSERT INTO usuarios SET nome='$nome', email='$email', cpf='$cpf', cidade='$cidade',
    estado='$estado', senha='$hashed_password', avatar='$avatar_name', is_admin=$admin";

    $insert_user_result = mysqli_query($connection, $insert_user_query);

    if(!mysqli_errno($connection)){
        // Redireciona para a pagina de gerenciamento de usuarios
        $_SESSION['add-user-sucesso'] = "Usuario Cadastrado com sucesso";
        /* echo "<script>window.location = 'gerenciar-usuarios.php'</script>"; */
        header('location: ' . ROOT_URL . 'admin/gerenciar-usuarios.php' );
        die();
    }
}    

} else{
    /* echo "<script>window.location = 'add-usuario.php'</script>"; */
    header('location: ' . ROOT_URL . 'admin/add-usuario.php');
    die();
}