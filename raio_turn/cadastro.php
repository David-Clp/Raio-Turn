<?php
    require 'config/constants.php';

    // volta dos dados caso envie com algum dado incorrreto/faltando
    $nome = $_SESSION['cadastro-valores']['nome'] ?? null;
    $email = $_SESSION['cadastro-valores']['email'] ?? null;
    $cpf = $_SESSION['cadastro-valores']['cpf'] ?? null;
    $cidade = $_SESSION['cadastro-valores']['cidade'] ?? null;
    $estado = $_SESSION['cadastro-valores']['estado'] ?? null;
    $createpassword = $_SESSION['cadastro-valores']['createpassword'] ?? null;
    $confirmpassword = $_SESSION['cadastro-valores']['confirmpassword'] ?? null;

    // Deleta os dados da sessão de cadastro
    unset($_SESSION['cadastro-valores']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website responsivo</title>
    <!-- Folha Estilo css-->
    <link rel="stylesheet" href="css/folha-estilo.css">
    <!-- ICONSCOUT CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--GOOGLE FONTS (MONTSERRAT)-->
    <link href="https://fonts.googleapis.com/css2? família=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Cadastro</h2>

            <?php if(isset($_SESSION['cadastro'])) : ?>
            <div class="alert__message error">
                <p>
                <?= $_SESSION['cadastro'];
                unset($_SESSION['cadastro']);
                ?>
                </p>
            </div>
            <?php endif ?>
          
        <form action="<?= ROOT_URL ?>cadastro-logica.php" enctype="multipart/form-data" method="POST">
             <input type="text" name="nome" value="<?= $nome ?>" placeholder="Nome">
             <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
             <input type="text" name="cpf" value="<?= $cpf ?>" placeholder="CPF" max="11">
            <input type="text" name="cidade" value="<?= $cidade ?>" placeholder="Cidade">
            <input type="text" name="estado" value="<?= $estado ?>" placeholder="Estado" >                                                           
             <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Crie uma Senha">
             <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirme Senha">
             <div class="form__control">
                <label for="avatar">Importar foto para perfil</label>
                <input type="file" name="avatar" id="avatar">
             </div>
             <button class="btn" name="submit" type="submit">Cadastrar</button>
             <small>Já possui uma conta? <a href="login.php">Entre aqui</a></small>
        </form>
    </div>


    </section>

</body>
</html>