<?php
    include 'partials/header.php';

    // Buscar usuario do banco de dados
    $id = $_SESSION['user-id'];

    $query = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($resultado);
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
         <li><a href="<?= ROOT_URL ?>editar-perfil.php"><i class="uil uil-edit"></i></i>
            <h5>Editar Conta</h5>
         </a></li>
         <li ><a href="<?= ROOT_URL ?>excluir-perfil.php" id="btn-perfil-delete"><i class="uil uil-user-times"></i>
            <h5>Excluir</h5>
         </a></li>

      </ul>
    </aside>

    <main>
        <h2>Perfil Usuário</h2>
        <img class="avatar-perfil" src="<?= ROOT_URL . 'imagens/' .$user['avatar']?>" >
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Localização</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?= "{$user['nome']}" ?></td>
                    <td><?= "{$user['email']}" ?></td>
                    <td><?= "{$user['cpf']}" ?></td>
                    <td><?= "{$user['cidade']}, {$user['estado']}"?></td>
                </tr>

            </tbody>
        </table>
    </main>
    </div>
</section>

<?php
    include 'partials/footer.php';
?>