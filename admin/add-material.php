<?php
    include 'partials/header.php';

if(isset($_POST['submit'])){
    $designacao = filter_var($_POST['designacao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $voltagem = filter_var($_POST['voltagem'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $material_feito = filter_var($_POST['material_feito'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $peso = filter_var($_POST['peso'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];  
    
    if(!$designacao){
        $_SESSION['add-material'] = "Por favor digite a designação do material";
    }elseif (!$avatar['name']){
        $_SESSION['add-material'] = "Por favor adicione uma imagem para o material";
    } else{
    //Logica da imagem
    $avatar_name = $avatar['name'];
    $avatar_destination_path = '../imagens/classe_materiais/' . $avatar_name;
    $avatar_tmp_name = $avatar['tmp_name'];

    //verificar se é mesmo uma imagem
    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extention = explode('.', $avatar_name);
    $extention = end($extention);
    if(in_array($extention, $allowed_files)){
        //Certifica que a imagem não é muito grande (5mb+)
        if($avatar['size'] < 500000){
            // Upload imagem
            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
        } else{
            $_SESSION['add-material'] = "Tamanho da imagem muito grande, deve ser menor que 5mb";
        }
    } else{
        $_SESSION['add-material'] = "Formato de arquivo incorreto, são aceitos os formatos png, jpg ou jpeg";
    }
    
    }

    // Redireciona de volta ao cadastro se houver um erro com os valores
if(isset($_SESSION['add-material'])){
    echo "errado";
    //Passar dados de formulário de volta para pagina de cadastro
    $_SESSION['add-material-valores'] = $_POST;
    /* echo "<script>window.location = 'add-material.php'</script>"; */
    header('location: ' . ROOT_URL . 'admin/add-material.php');
    die();
} else{
    //Insere os dados do usuario na tabela do banco de dados
    $insert_material_query = "INSERT INTO classe_material (designacao, imagem, voltagem, material_feito, peso)
        values('$designacao','$avatar_name','$voltagem','$material_feito', $peso)";
/*     SET designacao='$designacao', avatar='$avatar_name', voltagem='$voltagem', material_feito='$material_feito'";*/
    $insert_material_result = mysqli_query($connection, $insert_material_query);

    if(!mysqli_errno($connection)){
        // Redireciona para a pagina de gerenciamento de materiais
        
        $_SESSION['add-material-sucess'] = "Cadastro bem sucesssido";
        /* echo "<script>window.location = 'gerenciar-materiais.php'</script>";  */   
        header('location: ' . ROOT_URL . 'admin/gerenciar-materiais.php');
        die();
    }
}

}   

    // volta dos dados caso envie com algum dado incorrreto/faltando
    $designacao = $_SESSION['add-material-valores']['designacao'] ?? null;
    $voltagem = $_SESSION['add-material-valores']['voltagem'] ?? null;
    $material_feito = $_SESSION['add-material-valores']['material_feito'] ?? null;
    $peso = $_SESSION['add-material-valores']['peso'] ?? null;

    // Deleta os dados da sessão de cadastro
    unset($_SESSION['add-material-valores']);
?>

<section class="form__section form__add">
    <div class="container">
        <h2>Adicionar Material</h2>
            <?php if(isset($_SESSION['add-material'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-material'];
                    unset($_SESSION['add-material']);
                    ?>
                </p>
            </div>    
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-material.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="designacao" value="<?= $designacao ?>" placeholder="Designacao">
            <input type="text" name="voltagem" value="<?= $voltagem ?>" placeholder="Voltagem">
            <input type="text" name="material_feito" value="<?= $material_feito ?>" placeholder="Material Feito">
            <input type="text" name="peso" value="<?= $peso ?>" placeholder="Peso">
            <div class="form__control">
                <label for="avatar">Importar foto para visalização</label>
                <input type="file" name="avatar" id="avatar">
             </div>
             <button class="btn" name="submit" type="submit">Adicionar</button>
        </form>
    </div>
</section>

<?php 
    include_once ("../partials/footer.php");

?>