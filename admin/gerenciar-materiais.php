<?php
    include 'partials/header.php';

    $query = "SELECT * FROM classe_material";
    $materiais = mysqli_query($connection, $query);
?>

<section class="dashboard">

    <?php if(isset($_SESSION['add-material-sucess'])) : ?>
        <!-- adicionar usuario sucesso -->
        <div class="alert__message sucess container">
            <p>
                <?= $_SESSION['add-material-sucess'];
                unset($_SESSION['add-material-sucess']);
                ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['edit-material-sucess'])): ?> 
            <!-- editar usuario sucesso -->
        <div class="alert__message sucess container">
            <p>
                <?= $_SESSION['edit-material-sucess'];
                unset($_SESSION['edit-material-sucess']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-material'])): ?> 
        <!--editar material falha -->
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-material'];
                    unset($_SESSION['edit-material']);
                    ?>
                </p>
            </div> 
            <?php elseif(isset($_SESSION['delete-material-sucess'])): ?> 
            <!--apagar material sucesso -->
            <div class="alert__message sucess container">
                <p>
                    <?= $_SESSION['delete-material-sucess'];
                    unset($_SESSION['delete-material-sucess']);
                    ?>
                </p>
            </div>
            </div> <?php elseif(isset($_SESSION['delete-material'])): ?> 
            <!--apagar material falha -->
            <div class="alert__message error container">
                    <p>
                        <?= $_SESSION['delete-material'];
                        unset($_SESSION['delete-material']);
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
         <li><a href="gerenciar-usuarios.php"><i class="uil uil-users-alt"></i>
            <h5>Gerenciar Usuários</h5>
         </a></li>
         <li><a href="add-categoria.php"><i class="uil uil-edit"></i>
            <h5>Gerenciar Pontos de Coleta</h5>
         </a></li>
         <li><a href="gerenciar-categorias.php"><i class="uil uil-list-ul"></i>
            <h5>Gerenciar Depositos</h5>
         </a></li>
         <li><a href="gerenciar-materiais.php" class="active"><i class="uil uil-battery-bolt"></i>
            <h5>Gerenciar Tipos Material</h5>
         </a></li>
         <li ><a id="dashboard-btn-add" href="add-material.php"><i class="uil uil-plus-circle" ></i></i></i>
            <h5>Adicionar Material</h5>
         </a></li>
         <?php endif ?>
      </ul>
    </aside>

    <main>
        <h2>Gerenciar Materiais Depositaveis</h2>
        <?php if(mysqli_num_rows($materiais) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Designação</th>
                    <th>Voltagem</th>
                    <th>Material</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php while($material = mysqli_fetch_assoc($materiais)) : ?>
                <tr>
                    <td><img class="avatar-dashboard" src="<?= ROOT_URL . 'imagens/classe_materiais/' .$material['imagem']?>"></td>
                    <td><?= "{$material['designacao']}" ?></td>
                    <td><?= "{$material['voltagem']}" ?></td>
                    <td><?= "{$material['material_feito']}" ?></td>
                    <td><a href="<?= ROOT_URL ?>admin/edit-material.php?id=<?= $material['id'] ?>" class="btn sm">Editar</a></td>
                    <td><a href="<?= ROOT_URL ?>admin/delete-material.php?id=<?= $material['id'] ?>" class="btn sm danger">Excluir</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <?php else : ?>
            <div class="alert__message error"><?= "Sem Materiais Cadastrados" ?></div> 
            <?php endif ?>   
    </main>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>