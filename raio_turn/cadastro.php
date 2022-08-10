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
          
        <form action="<? ROOT_URL ?>cadastro-logica.php" enctype="multipart/form-data" method="POST">
             <input type="text" name="nome" value="" placeholder="Nome">
             <input type="email" name="email" value="" placeholder="E-mail">
             <input type="text" name="cpf" value="" placeholder="CPF" max="11">
                    <input type="text" name="cidade" placeholder="Cidade" required="true">
                    <input type="text" name="estado" placeholder="Estado" required="true">                                                           
             <input type="password" name="createpassword" value="" placeholder="Crie uma Senha">
             <input type="password" name="confirmpassword" value="" placeholder="Confirme Senha">
             <div class="form__control">
                <label for="avatar">Importar foto para perfil</label>
                <input type="file" name="avatar" id="avatar">
             </div>
             <button class="btn" name="submit" type="submit">Cadastrar</button>
             <small>Já possui uma conta? <a href="login.html">Entre aqui</a></small>
        </form>
    </div>


    </section>

</body>
</html>