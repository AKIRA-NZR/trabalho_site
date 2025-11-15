<?php 
include '../src/templates/header.php';
?>
<h2>Cadastro de Novo Cliente</h2>
<form action="../src/processo/Dados.php" method="POST">
<label for="nome">Nome: </label>
<input type="text" name="nome" required placeholder="Digite seu nome">
<button type="submit">Cadastrar</button>

</form>
<?php 
include '../src/templates/footer.php';
?>