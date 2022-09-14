<?php
   include 'partials/header.php'; 
?>

<section class="dashboard">
   <div class="container dashboard__container">
   <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
   <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
   <aside>
      <ul>
         <li><a href="" ><i class="uil uil-upload-alt"></i>
            <h5>Realizar Deposito</h5>
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
         <li><a href="add-categoria.php"><i class="uil uil-edit"></i>
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
      <h2>Meus Depositos</h2>
      <table>
         <thead>
            <tr>
               <th>Codigo</th>
               <th>Tipo Material</th>
               <th>Quantidade</th>
               <th>Data</th>
            </tr>
         </thead>
         <tbody>
            <tr>

            </tr>
         </tbody>
      </table>
   </main>
   </div>
</section>


<?php
    include '../partials/footer.php';
?>