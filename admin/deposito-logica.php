<?php

    include_once('config/database.php');

if(isset($_POST['submit'])){
    $id_user = $_SESSION['user-id'];
    $qtd = $_POST['qtd'];
    $peso = $_POST['peso'];
    $soma_qtd = 0;
    $soma_peso = 0;
    date_default_timezone_set('America/Manaus');
    $data = date('Y-m-d');;
    /* $data = implode("-",array_reverse(explode("/",$data))); */
    $codigo_deposito = str_pad(date('dm'), 6, $id_user) ;
    $num_randon = rand(1, 99);
    $codigo_deposito = str_pad($codigo_deposito, 8, $num_randon);

    for($i=0; $i< count($qtd); $i++){
        $soma_qtd = $soma_qtd + ($qtd[$i]) ;
        $soma_peso = $soma_peso + (($peso[$i])* $qtd[$i]);
    }
    $deposito_query = "INSERT INTO `depositos`(`id_user`, `qtd_total`, `peso_total`, `data_deposito`, `codigo_deposito`, `situacao`) 
                    VALUES ($id_user, $soma_qtd, $soma_peso, $data, $codigo_deposito, 'Aguardando Depósito')";
    $insert_result = mysqli_query($connection, $deposito_query);
    
    if(!mysqli_errno($connection)){
        // Redireciona para a pagina de gerenciamento de usuarios
        $_SESSION['deposito-sucess'] = "Deposito agendado com sucesso! aguardando depósito em um ponto de coleta!";
        /* echo "<script>window.location = 'index.php'</script>"; */
        header('location: ' . ROOT_URL . 'admin/');
        die();
    }
    else{
        /* echo "<script>window.location = 'index.php'</script>"; */ 
        header('location: ' . ROOT_URL . 'admin/deposito.php');
    }
}

?>