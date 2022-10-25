<?php
    include 'partials/header.php';

    // Buscar usuario do banco de dados
    $id = $_SESSION['user-id'];

    $query = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($resultado);
?>

<section class="dashboard">

    <div class="container dashboard__container">
    <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
    <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
    <aside>
    <ul>
         <li><a href="<?= ROOT_URL ?>contate-nos.php"><i class="uil uil-edit"></i></i>
            <h5>contate-nos</h5>
         </a></li>
      </ul>
    </aside>

    <main>
        <h2>Contate nossa Equipe</h2>
        <img class="avatar-perfil" src="<?= ROOT_URL . 'imagens/essenciais/raio-turn.png' ?>">
        <table>
            <thead>
                <tr>
                    <th>Email Equipe</th>
                    <th>Telefone Administradores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>raioturn@gmail.com</td>
                    <td>(69)99239-3373 ou (69)99209-5236</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Email Desenvolvedor</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>davidclipel001@gmail.com</td>
                    <td>(69)99273-3353</td>
                </tr>
            </tbody>
        </table>
    </main>
    </div>
</section>

<?php
    include 'partials/footer.php';
?>
