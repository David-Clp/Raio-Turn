<?php
   include 'partials/header.php'; 

   $depositos_sql = "SELECT * FROM depositos";
   $depositos = mysqli_query($connection, $depositos_sql);

   

   if(isset($_POST['pesquisa']) && isset($_POST['submit'])){
      $pesquisa = filter_var($_POST['pesquisa'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if($pesquisa == "todos" or $pesquisa == "TODOS" or $pesquisa == "t" or $pesquisa == "T"){
         $depositos_sql = "SELECT * FROM depositos";
         $depositos = mysqli_query($connection, $depositos_sql);
      }else{
         $depositos_sql = "SELECT * FROM depositos WHERE codigo_deposito LIKE '%$pesquisa%'";
         $depositos = mysqli_query($connection, $depositos_sql);
/*           $query = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%' AND NOT id=$atual_admin_id";
          $users = mysqli_query($connection, $query); */ 
      }
      unset($_POST['pesquisa']); 
  } else{
      $depositos_sql = "SELECT * FROM depositos";
      $depositos = mysqli_query($connection, $depositos_sql);
  }
?>

<section class="dashboard">

   <?php if(isset($_SESSION['deposito-sucess'])) : ?>
      <!-- adicionar usuario sucesso -->
     <div class="alert__message sucess container">
         <p>
            <?= $_SESSION['deposito-sucess'];
            unset($_SESSION['deposito-sucess']);
            ?>
         </p>
      </div>
   <?php endif ?>     

   <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
   <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
   <div class="container dashboard__container">
   <aside>
      <ul>
         <li><a href="deposito.php" ><i class="uil uil-upload-alt"></i>
            <h5>Realizar Depósito</h5>
         </a></li>
         <li><a href="index.php" ><i class="uil uil-postcard"></i>
            <h5>Meus Depósitos</h5>
         </a></li>

         <?php if(isset($_SESSION['user_admin'])): ?>
         <li><a href="add-usuario.php"><i class="uil uil-user-plus"></i></i>
            <h5>Adicionar Usuário</h5>
         </a></li>
         <li><a href="gerenciar-usuarios.php"><i class="uil uil-users-alt"></i>
            <h5>Gerenciar Usuários</h5>
         </a></li>
         <li><a href="gerenciar-categorias.php" class="active"><i class="uil uil-list-ul"></i>
            <h5>Gerenciar Depósitos</h5>
         </a></li>
         <li><a href="gerenciar-materiais.php"><i class="uil uil-battery-bolt"></i>
            <h5>Gerenciar Tipos Material</h5>
         </a></li>

         <?php endif ?>
      </ul>
   </aside>
   <main>
      <h2>Depositos</h2>

      <form class="container search__bar-container" action="<?= ROOT_URL ?>admin/gerenciar-depositos.php" method="POST">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="pesquisa" placeholder="Buscar">
                <button type="submit" name="submit" class="btn">Vai</button>
            </div>
        </form>

      <?php if(mysqli_num_rows($depositos) > 0) : ?>
      <table>
         <thead>
            <tr>
                <th>Id usúario</th>
                <th>Codigo</th>
                <th>Quantidade</th>
                <!-- <th>Data</th> -->
                <th>Situação</th>
                <th>Editar</th>
            </tr>
         </thead>
         <tbody>
                <?php while($deposito = mysqli_fetch_assoc($depositos)) : ?>
                <tr>
                    <td><?= "{$deposito['id_user']}" ?></td>
                    <td><?= "{$deposito['codigo_deposito']}" ?></td>
                    <td><?= "{$deposito['qtd_total']}" ?></td>
                
                    <td><?= "{$deposito['situacao']}" ?></td>
                    <td><a href="<?= ROOT_URL ?>admin/edit-deposito.php?id=<?= $deposito['id'] ?>" class="btn sm">Editar</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
      </table>
      <?php else : ?>
            <div class="alert__message error"><?= "Sem depósitos" ?></div> 
      <?php endif ?>
   </main>
   </div>
</section>

<?php
    include '../partials/footer.php';
?>