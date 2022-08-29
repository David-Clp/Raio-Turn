<?php
    include 'partials/header.php';

    // volta dos dados caso envie com algum dado incorrreto/faltando
    $nome = $_SESSION['add-user-valor']['nome'] ?? null;
    $email = $_SESSION['add-user-valor']['email'] ?? null;
    $cpf = $_SESSION['add-user-valor']['cpf'] ?? null;
    $cidade = $_SESSION['add-user-valor']['cidade'] ?? null;
    $estado = $_SESSION['add-user-valor']['estado'] ?? null;
    $password = $_SESSION['add-user-valor']['password'] ?? null;

    // Deleta os dados da sessão de cadastro
    unset($_SESSION['add-user-valores']);
?>

<section class="form__section">
    <div class="container">
        <h2>Adicionar usuário</h2>
            <?php if(isset($_SESSION['add-user'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>    
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-usuario-logica.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="nome" value="<?= $nome ?>" placeholder="Nome">
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
            <input type="text" name="cpf" value="<?= $cpf ?>" placeholder="CPF" max="11">
            <input type="text" name="cidade" value="<?= $cidade ?>" placeholder="Cidade">
            <input type="text" name="estado" value="<?= $estado ?>" placeholder="Estado" >                                                           
            <input type="password" name="createpassword" value="<?= $password ?>" placeholder="Crie uma Senha">
            <select name="user-type" id="">
                <option value="0">Usuário padrão</option>
                <option value="1">Administrador</option>
             </select>
            <div class="form__control">
                <label for="avatar">Importar foto para perfil</label>
                <input type="file" name="avatar" id="avatar">
             </div>
             <button class="btn" name="submit" type="submit">Cadastrar</button>
             <small>Já possui uma conta? <a href="login.php">Entre aqui</a></small>
        </form>
    </div>
</section>

