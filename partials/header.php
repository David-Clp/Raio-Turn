<?php
    require 'config/database.php';

// Buscar atual usuário do Banco de Dados
if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM usuarios WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Folha Estilo css-->
       <link rel="stylesheet" href="<?= ROOT_URL ?>css/folha-estilo.css">
       <!-- ICONSCOUT CDN-->
       <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
       <!--GOOGLE FONTS (MONTSERRAT)-->
       <link href="https://fonts.googleapis.com/css2? família=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
       <!--Logo-->
       <link REL="SHORTCUT ICON" href="<?= ROOT_URL ?>imagens/essenciais/logo.ico">
    <title>Raio Turn</title>
</head>
<body>
    <nav class="glass__principal">
        <div class="container nav__container"> 
            <a href="<?= ROOT_URL ?>" class="nav__logo"><img src="<?= ROOT_URL ?>imagens/essenciais/raio-turn.png" alt=""></a> 

            <?php if(isset($_SESSION['user-id'])): ?>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-times-square"></i></button> 
            <ul class="nav__items">   
                <li class="nav__profile">
                    <div class="avatar">
                        <img  src="<?= ROOT_URL . 'imagens/users_avatar/' . $avatar['avatar'] ?>" >  
                        </div>  <a href="<?= ROOT_URL ?>perfil.php">Perfil</a>  
                
                </li>
                <li><a href="<?= ROOT_URL ?>admin/">Painel</a></li>            
                <li><a href="<?= ROOT_URL ?>pontos_coleta.php">Pontos Coleta</a></li>
                <li><a href="<?= ROOT_URL ?>sobre.php">Sobre</a></li>
                <li><a href="<?= ROOT_URL ?>contato.php">Contato</a></li>
                <li><a href="<?= ROOT_URL ?>sair.php">Sair</a></li>  
                
            </ul>
                <?php else: ?>
                <ul>
                    <li><a href="<?= ROOT_URL ?>login.php">Entrar</a></li> 
                </ul>
                <?php endif ?>
            
            
        </div>
    </nav>
