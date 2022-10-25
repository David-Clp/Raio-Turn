var productNumber = 1

         
function addRow() {
let newRow = `
   <select name="" id="">
      <?php while($material = mysqli_fetch_assoc($materiais)): ?>
         <option value="<?=$material['id']?>"><?= "{$material['designacao']} {$material['voltagem']} {$material['material_feito']} "?></option>
         <?php $imagem = $material['imagem'] ?>
      <?php endwhile ?>
   </select>
   <input type="number" value="0" min="0">
   
   <img src="../imagens/classe_materiais/<?= $imagem ?>">
   ` 
document.querySelector(".select-deposito").innerHTML += newRow
productNumber++;
}