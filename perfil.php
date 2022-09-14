<?php
    include 'partials/header.php';

    // Buscar usuario do banco de dados
    $id = $_SESSION['user-id'];

    $query = "SELECT * FROM usuarios WHERE id=$id";
    $user = mysqli_query($connection, $query);
?>

<section class="dashboard">

    <?php if(isset($_SESSION['add-user-sucess'])) : ?>
        <!-- adicionar usuario sucesso -->
        <div class="alert__message sucess container">
            <p>
                <?= $_SESSION['add-user-sucess'];
                unset($_SESSION['add-user-sucess']);
                ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['edit-user-sucess'])): ?> 
            <!-- editar usuario sucesso -->
        <div class="alert__message sucess container">
            <p>
                <?= $_SESSION['edit-user-sucess'];
                unset($_SESSION['edit-user-sucess']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-user'])): ?> 
        <!--editar usuario falha -->
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-user'];
                    unset($_SESSION['edit-user']);
                    ?>
                </p>
            </div> 
            <?php elseif(isset($_SESSION['delete-user-sucess'])): ?> 
            <!--apagar usuario sucesso -->
            <div class="alert__message sucess container">
                <p>
                    <?= $_SESSION['delete-user-sucess'];
                    unset($_SESSION['delete-user-sucess']);
                    ?>
                </p>
            </div>
            </div> <?php elseif(isset($_SESSION['delete-user'])): ?> 
            <!--apagar usuario falha -->
            <div class="alert__message error container">
                    <p>
                        <?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                        ?>
                    </p>
            </div>       
            <?php endif ?>

    <div class="container dashboard__container">
    <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
    <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
    <aside>
    <ul>
         <li><a href="add-usuario.php"><i class="uil uil-user-plus"></i></i>
            <h5>Editar Conta</h5>
         </a></li>
         <li ><a href="gerenciar-usuarios.php"><i class="uil uil-users-alt"></i>
            <h5>Excluir</h5>
         </a></li>

      </ul>
    </aside>

    <main>
        <h2>Perfil Usuário</h2>
        <?php if(mysqli_num_rows($users) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Administrador</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = mysqli_fetch_assoc($users)) : ?>
                <tr>
                    <td><img class="avatar-dashboard" src="<?= ROOT_URL . 'imagens/' .$user['avatar']?>"></td>
                    <td><?= "{$user['nome']}" ?></td>
                    <td><?= "{$user['email']}" ?></td>
                    <td><a href="<?= ROOT_URL ?>admin/edit-usuario.php?id=<?= $user['id'] ?>" class="btn sm">Editar</a></td>
                    <td><a href="<?= ROOT_URL ?>admin/delete-usuario.php?id=<?= $user['id'] ?>" class="btn sm danger">Excluir</a></td>
                    <?php if($user['is_admin'] == 1) : ?>
                        <td>Sim</td>
                    <?php else: ?>
                        <td>Não</td>
                        <?php endif ?>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
            <?php endif ?>   
    </main>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>