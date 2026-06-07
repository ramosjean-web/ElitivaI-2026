<?php
    require_once('cabecalho.php');

?>
<div class="banner-scme">

    <div class="container">

        <h1>
            <i class="bi bi-gear-wide-connected"></i>
            Bem-vindo ao SCME <?= $_SESSION['nome'] ?> </h1>

        <p>
            Sistema de Controle de Manutenção de Equipamentos
        </p>

    </div>

</div>
<?php
    require_once('rodape.php');