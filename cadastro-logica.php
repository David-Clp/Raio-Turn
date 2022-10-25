<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $estado = filter_var($_POST['estado'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

// Validar os valores
if(!$nome){
    $_SESSION['cadastro'] = "Por favor digite seu nome";
} elseif (!$email){
    $_SESSION['cadastro'] = "Por favor digite seu email";
} elseif (!$cpf){
    $_SESSION['cadastro'] = "Por favor digite seu CPF";
} elseif (!$cidade){
    $_SESSION['cadastro'] = "Por favor digite sua cidade";
} elseif (!$estado){
    $_SESSION['cadastro'] = "Por favor digite seu estado";
} elseif (strlen($password) < 8 ){
    $_SESSION['cadastro'] = 'A senha deve te mais de 8 caracteres';
} else{

        $hashed_password = password_hash($password, PASSWORD_DEFAULT); //Criptografar senha

        //verifica se o CPF ou email ja existe no banco de dados
        $user_check_query = "SELECT * FROM usuarios WHERE cpf = '$cpf' OR email = '$email'";
        $user_check_result = mysqli_query($connection, $user_check_query);
        if(mysqli_num_rows($user_check_result) > 0){
            $_SESSION['cadastro'] = "CPF ou Email já cadastrados";
        } else{
            //Logica do avatar
            if(!$avatar['name']){
                $avatar = 'imagens/users_avatar/icon-perfil.png';
                $avatar_name = 'icon-perfil.png';
            } else{

            
            //Renomear foto
            $time = time(); // Renomea nome da imagem usando tempo, para cada foto ter nome unico
            $avatar_name = $time . $avatar['name'];
            $avatar_tmp_name = $avatar['tmp_name'];
            $avatar_destination_path = 'imagens/users_avatar/' . $avatar_name;

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
                    $_SESSION['cadastro'] = "Tamanho da imagem muito grande, deve ser menor que 5mb";
                }
            } else{
                $_SESSION['cadastro'] = "Formato de arquivo incorreto, são aceitos os formatos png, jpg ou jpeg";
            }
        }
    }
}

// Redireciona de volta a pagina de cadastro se houver um erro com os valores
if(isset($_SESSION['cadastro'])){
    //Passar dados de formulário de volta para pagina de cadastro
    $_SESSION['cadastro-valores'] = $_POST;
    echo "<script>window.location = 'login.php'</script>";
    /* header('location: ' . ROOT_URL . 'cadastro.php'); */
    die();
} else{$destinatario = "davidclipel001@gmail.com";
    $assunto = "Bem vindo!!";
    $mensagem = "Bem Vindo a Familia Raio Turn!";
     mail("davidclipel001@gmail.com","Bem vindo!!","Bem Vindo a Familia Raio Turn!");
    //Insere os dados do usuario na tabela do banco de dados
    $insert_user_query = "INSERT INTO usuarios SET nome='$nome', email='$email', cpf='$cpf', cidade='$cidade',
    estado='$estado', senha='$hashed_password', avatar='$avatar_name', is_admin=0";

    $insert_user_result = mysqli_query($connection, $insert_user_query);

    //chama funcao que envia email para usuario
    //envia_email($email);


    if(!mysqli_errno($connection)){
        // Redireciona para a pagina de login
        $_SESSION['sucesso-cadastro'] = "Cadastro bem sucedido. Por favor entre com seus dados!";
        /* echo "<script>window.location = 'login.php'</script>"; */
        header('location: ' . ROOT_URL . 'login.php');
        die();
    }
}    

} else{
    /* echo "<script>window.location = 'login.php'</script>"; */
    header('location: ' . ROOT_URL . 'cadastro.php');
    die();
}

//Funcao de enviar email pro usuario
/* function envia_email($email){

    $destinatario = $email;
    $assunto = "Bem vindo!!";
    $mensagem = "Bem Vindo a Familia Raio Turn!";

    mail($destinatario, $assunto, $mensagem);
} */