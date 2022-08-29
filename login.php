<?php
    require 'config/constants.php';

    // volta dos dados caso envie com algum dado incorrreto/faltando
    $cpf_email = $_SESSION['login-dados']['cpf_email'] ?? null;
    $password = $_SESSION['login-dados']['password'] ?? null;

    //Deleta os dados da sessão de login
    unset($_SESSION['login-dados']);
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
    <section class="form__section form__login">    
        <div class="container">
            <h2>Entrar</h2>
        <?php if(isset($_SESSION['sucesso-cadastro'])): ?>
        <div class="alert__message sucess">
            <p>
                <?= $_SESSION['sucesso-cadastro'];
                unset($_SESSION['sucesso-cadastro']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['login'])): ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['login'];
                unset($_SESSION['login']);
                ?>
            </p>
        </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>login-logica.php" method="POST">
             <input type="text" name="cpf_email" value="<?= $cpf_email ?>" placeholder="CPF ou Email">
             <input type="password" name="password" value="<?= $password ?>" placeholder="Senha">
             <button class="btn" name="submit" type="submit">Entrar</button>
             <small>Não possui uma conta? <a href="cadastro.php">Crie uma</a></small>
        </form>
    </div>
    </section>

</body>
</html>