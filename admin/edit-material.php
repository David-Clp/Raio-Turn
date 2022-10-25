<!--     NOTA: Desevolver logiga para alterar foto, 
            mesma logica para alterar foto de
                    perfil de usuario
-->

<?php
    include 'partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM classe_material WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $material = mysqli_fetch_assoc($result);
    } 
    elseif(isset($_POST['atualizar-material'])){
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $designacao = filter_var($_POST['designacao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $voltagem = filter_var($_POST['voltagem'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $material_feito = filter_var($_POST['material_feito'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $peso = filter_var($_POST['peso'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        /* $avatar = $_FILES['avatar'];  */
        
        //verificar entradas invalidas
        if(!$designacao){
            $_SESSION['edit-material'] = "Dados Invalidos!";
        } else{
            //Atualiza material
            $query = "UPDATE classe_material SET designacao='$designacao', voltagem='$voltagem', material_feito='$material_feito', peso=$peso WHERE id=$id LIMIT 1";
            $result = mysqli_query($connection, $query);
        
            if(mysqli_errno($connection)){
                $_SESSION['edit-material'] = "Falha para atualizar Material";
                /* echo "<script>window.location = 'gerenciar-materiais.php'</script>"; */
                header('location: ' . ROOT_URL . 'admin/gerenciar-materiais.php');
                die(); 
            } else{
                $_SESSION['edit-material-sucess'] = "Material atualizado com sucesso";
                /* echo "<script>window.location = 'gerenciar-materiais.php'</script>"; */
                header('location: ' . ROOT_URL . 'admin/gerenciar-materiais.php');
                die(); 
            }
        }

    } else{
        /* echo "<script>window.location = 'gerenciar-materiais.php'</script>"; */
        header('location: ' . ROOT_URL . 'admin/gerenciar-materiais.php');
        die(); 
    }
        


  

?>

<section class="form__section form__login">
    <div class="container">
        <h2>Editar Material</h2>
        <form action="<?= ROOT_URL ?>admin/edit-material.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $material['id'] ?>">
            <input type="text" name="designacao" value="<?= $material['designacao'] ?>" placeholder="Designacao">
            <input type="text" name="voltagem" value="<?= $material['voltagem'] ?>" placeholder="Voltagem">
            <input type="text" name="material_feito" value="<?= $material['material_feito'] ?>" placeholder="Material Feito">
            <input type="text" name="peso" value="<?= $material['peso']?>" placeholder="Peso">
            <!--             <div class="form__control">
                <label for="avatar">Importar foto para visalização</label>
                <input type="file" name="avatar" id="avatar">
             </div> -->
             <button class="btn" name="atualizar-material" type="submit">Atualizar</button>
        </form>
    </div>
</section>