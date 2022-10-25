<?php
    include 'partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM depositos WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/gerenciar-depositos.php');
    die();
} 


?>

<section class="form__section form__login">
    <div class="container">
        <h2>Editar Depósito</h2>
        <form action="<?= ROOT_URL ?>admin/edit-deposito-logica.php" method="POST">
            <input type="hidden" name="id" value="<?= $id = $_GET['id'] ?>">
            <select name="user-type" id="">
                <option value="Aguardando Depósito">Aguardando Depósito</option>
                <option value="Depósito realizado!">Depósito realizado!</option>
                <option value="Depósito Inválido">Depósito Inválido</option>
             </select>
             <button class="btn" name="submit" type="submit">Atualizar usuário</button>
        </form>
    </div>
</section>