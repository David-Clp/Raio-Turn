var productNumber = 1

function addRow() {
let newRow = `    
<select name="" id="">
<?php while($material = mysqli_fetch_assoc($materiais)): ?>
   <option value="<?=$material['id']?>"><?= "{$material['designacao']} {$material['voltagem']} {$material['material_feito']} " ?></option>
<?php endwhile ?>
</select>`
document.querySelector(".select").innerHTML += newRow
productNumber++;
}