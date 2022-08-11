<?php
    require 'config/constants.php';
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
        <form action="<?= ROOT_URL ?>login-logica.php" method="POST">
             <input type="text" name="cpf_email" value="" placeholder="CPF ou Email">
             <input type="password" name="password" value="" placeholder="Senha">
             <button class="btn" name="submit" type="submit">Entrar</button>
             <small>Não possui uma conta? <a href="cadastro.php">Crie uma</a></small>
        </form>
    </div>
    </section>

</body>
</html>