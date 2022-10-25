<?php
    include_once('partials/header.php');

   $query_material = "SELECT * FROM classe_material";
   $materiais = mysqli_query($connection, $query_material);
   $pilhas = [];

   $data = date('Y/m/d');
?>

<section class="dashboard">
   <div class="container deposito__container">
<section class="form__deposito">    
      <div class="container">
         <h2>Depósito</h2>
        
      <form class="form-deposito" action="<?= ROOT_URL ?>admin/deposito-logica.php" method="POST">

      <?php while($material = mysqli_fetch_assoc($materiais)): ?>
      <div class="select-deposito">
         <img src="../imagens/classe_materiais/<?= $material['imagem'] ?>">
         <input type="text" readonly id="input_material" value="<?= "{$material['designacao']} {$material['voltagem']} {$material['material_feito']} "?>" >
         <input name='qtd[]' id="inputqtd" type="number" value="0" min="0">
         <input type="number" name="peso[]" hidden value="<?= $material['peso'] ?>">
      </div>
      <?php endwhile ?>
      <!-- <?php $data = date('Y-m-d'); ?>
         <input type="date" name="data-atual" value=" "> -->
      <button class="btn" name="submit" type="submit">Depositar</button>
      </form>
      
    </div>
    </section>
    </div>
</section>

<?php
    include_once('../partials/footer.php')
?>