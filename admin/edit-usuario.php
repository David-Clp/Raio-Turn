<?php
    include 'partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM usuarios WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/gerenciar-usuarios.php');
    die();
}   

?>

<section class="form__section form__login">
    <div class="container">
        <h2>Editar Usuário</h2>
        <form action="<?= ROOT_URL ?>admin/edit-usuario-logica.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" name="nome" value="<?= $user['nome'] ?>" placeholder="Nome">
            <select name="user-type" id="">
                <option value="0">Usuário padrão</option>
                <option value="1">Administrador</option>
             </select>
             <button class="btn" name="submit" type="submit">Atualizar usuário</button>
        </form>
    </div>
</section>
