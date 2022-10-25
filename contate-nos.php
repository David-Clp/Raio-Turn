<?php
    include 'partials/header.php';

if(isset($_POST['submit'])){
        // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
        // O return-path deve ser ser o mesmo e-mail do remetente.
        $to = "davidclipel001@gmail.com";
        $assunto = $_POST['titulo'];
        $assunto = $_POST['texto'];
        $headers .= 'From: davidalfagame@gmail.com'. "\r\n" . 'Reply-To: davidalfagame@gmail.com'; // return-path
        $envio = mail($to, $assunto, $texto, $headers);
        
        if($envio)
        echo "Mensagem enviada com sucesso";
        else
        echo "A mensagem não pode ser enviada";

    }

    // volta dos dados caso envie com algum dado incorrreto/faltando
    $titulo = $_SESSION['contate-nos-valores']['titulo$titulo'] ?? null;
    $texto = $_SESSION['contate-nos-valores']['texto '] ?? null;

    // Deleta os dados da sessão de cadastro
    unset($_SESSION['contate-nos-valores']);
?>

<section class="form__section form__add">
    <div class="container">
        <h2>Enviar Email</h2>
            <?php if(isset($_SESSION['contate-nos'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['contate-nos'];
                    unset($_SESSION['contate-nos']);
                    ?>
                </p>
            </div>    
        <?php endif ?>

        <form action="<?= ROOT_URL ?>contate-nos.php" method="POST">
             <input type="text" name="titulo" placeholder="Título" value="<?= $titulo ?>">
             <textarea rows="10" name="texto" placeholder="Texto"><?= $texto ?></textarea>
             <button class="btn" name="submit" type="submit">Enviar</button>
        </form>
    </div>
</section>

<?php 
    include_once ("partials/footer.php");

?>