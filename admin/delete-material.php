<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //Buscar usuario no banco de dados
    $query = "SELECT * FROM classe_material WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $material = mysqli_fetch_assoc($result);

    //Certifica que temos de volta apenas um material
    if(mysqli_num_rows($result) == 1){
        $avatar_name = $material['avatar'];
        $avatar_path = '../imagens/classe_materiais/' . $avatar_name;
        //Apaga aa imagem
        if($avatar_path){
            unlink($avatar_path);
        }
    }

    //Apaga material do banco de dados
    $delete_material_query = "DELETE FROM classe_material WHERE id=$id";
    $delete_material_result = mysqli_query($connection, $delete_material_query);
    if(mysqli_errno($connection)){
        $_SESSION['delete-material'] = "Material não apagado!";
    } else{
        $_SESSION['delete-material-sucess'] = "Material apagado com Sucesso!";
    }
}

header('location: ' . ROOT_URL . 'admin/gerenciar-materiais.php');
    /* echo "<script>window.location = 'gerenciar-materiais.php'</script>"; */
die();