<?php
    include 'partials/header.php';

    // Buscar usuarios do banco de dados, mas não o atual usuário 
    $atual_admin_id = $_SESSION['user-id'];

    $query = "SELECT * FROM usuarios WHERE NOT id=$atual_admin_id";
    $users = mysqli_query($connection, $query);
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
         <li><a href="" ><i class="uil uil-upload-alt"></i>
            <h5>Realizar Deposito</h5>
         </a></li>
         <li><a href="index.php" ><i class="uil uil-postcard"></i>
            <h5>Meus Depositos</h5>
         </a></li>

         <?php if(isset($_SESSION['user_admin'])): ?>
         <li><a href="add-usuario.php"><i class="uil uil-user-plus"></i></i>
            <h5>Adicionar Usuário</h5>
         </a></li>
         <li><a href="gerenciar-usuarios.php"class="active"><i class="uil uil-users-alt"></i>
            <h5>Gerenciar Usuários</h5>
         </a></li>
         <li><a href=""><i class="uil uil-edit"></i>
            <h5>Gerenciar Pontos de Coleta</h5>
         </a></li>
         <li><a href="gerenciar-categorias.php"><i class="uil uil-list-ul"></i>
            <h5>Gerenciar Depositos</h5>
         </a></li>
         <li><a href="gerenciar-materiais.php"><i class="uil uil-battery-bolt"></i>
            <h5>Gerenciar Tipos Material</h5>
         </a></li>
         <?php endif ?>
      </ul>
    </aside>

    <main>
        <h2>Gerenciar Usúarios</h2>
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
        <?php else : ?>
            <div class="alert__message error"><?= "Sem usuários" ?></div> 
            <?php endif ?>   
    </main>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>