<?php
   include 'partials/header.php'; 

   $id_user = $_SESSION['user-id'];

   $depositos_sql = "SELECT * FROM depositos WHERE id_user = $id_user";
   $depositos = mysqli_query($connection, $depositos_sql);
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
         <li><a href="index.php" class="active"><i class="uil uil-postcard"></i>
            <h5>Meus Depositos</h5>
         </a></li>

         <?php if(isset($_SESSION['user_admin'])): ?>
         <li><a href="add-usuario.php"><i class="uil uil-user-plus"></i></i>
            <h5>Adicionar Usuário</h5>
         </a></li>
         <li><a href="gerenciar-usuarios.php"><i class="uil uil-users-alt"></i>
            <h5>Gerenciar Usuários</h5>
         </a></li>
         <li><a href="gerenciar-depositos.php"><i class="uil uil-list-ul"></i>
            <h5>Gerenciar Depositos</h5>
         </a></li>
         <li><a href="gerenciar-materiais.php"><i class="uil uil-battery-bolt"></i>
            <h5>Gerenciar Tipos Material</h5>
         </a></li>

         <?php endif ?>
      </ul>
   </aside>
   <main>
      <h2>Meus Depositos</h2>
      <?php if(mysqli_num_rows($depositos) > 0) : ?>
      <table>
         <thead>
            <tr>
               <th>Codigo</th>
               <th>Quantidade</th>
               <!-- <th>Data</th> -->
               <th>Situação</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
                <?php while($deposito = mysqli_fetch_assoc($depositos)) : ?>
                <tr>
                  <td><?= "{$deposito['codigo_deposito']}" ?></td>
                  <td><?= "{$deposito['qtd_total']}" ?></td>
   
                  <td><?= "{$deposito['situacao']}" ?></td>
                  <?php if($deposito['situacao'] == 'Aguardando Depósito') : ?>
                     <td><a href="<?= ROOT_URL ?>admin/delete-deposito.php?id=<?= $deposito['id'] ?>" class="btn sm danger">Cancelar Depósito</a></td>
                  <?php else: ?>
                     <td></td>
                  <?php endif ?>
                </tr>
                <?php endwhile ?>
            </tbody>
      </table>
      <?php else : ?>
            <div class="alert__message error"><?= "Sem Depósitos" ?></div> 
      <?php endif ?>
   </main>
   </div>
</section>

<?php
    include '../partials/footer.php';
?>