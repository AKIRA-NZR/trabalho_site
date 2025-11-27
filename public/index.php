<?php 
    include '../src/templates/header.php'; 
?>

<section class="banner d-flex align-items-center justify-content-center">
    <div class="conteudo-principal">
        <h1 class="display-3 fw-bold">Vinil Hunters</h1>
        <p class="fs-4">As maiores raridades você encontra aqui.</p>
        <a href="#vitrine" class="btn btn-outline-dark btn-lg mt-3">Ver Coleção</a>
         <h1>Venha encontrar os melhores vinis da Década somente aqui</h1>
         <p>Cheios de acervos pra explorar desde o rock até o post punk com a loja Vinil Hunters</p>
    </div>
</section>

<div id="vitrine">
    <?php
        include 'produtos.php'; 
    ?>
</div>

<?php 
    include '../src/templates/footer.php'; 
?>