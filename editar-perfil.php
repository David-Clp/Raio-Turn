<?php
    include 'partials/header.php';

        // Buscar usuario do banco de dados
        $id = $_SESSION['user-id'];
        $query = "SELECT * FROM usuarios WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
?>

<section class="form__section form__add">
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
          
        <form action="<?= ROOT_URL ?>editar-perfil-logica.php" enctype="multipart/form-data" method="POST">
             <input type="text" name="nome" value="<?= $user['nome'] ?>" placeholder="Nome">
             <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="E-mail">
             <input type="text" name="cpf" value="<?= $user['cpf'] ?>" placeholder="CPF" max="11">
            <input type="text" name="cidade" value="<?= $user['cidade'] ?>" placeholder="Cidade">
            <input type="text" name="estado" value="<?= $user['estado'] ?>" placeholder="Estado" >                                                           
             <input type="password" name="password" value="<?= $user['senha'] ?>" placeholder="Altere Sua Senha">
             <div class="form__control">
                <label for="avatar">Alterar foto de perfil</label>
                <input type="file" name="avatar" id="avatar">
             </div>
             <button class="btn" name="submit" type="submit">Alterar</button>
        </form>
    </div>


    </section>

<?php
    include 'partials/footer.php';
?>