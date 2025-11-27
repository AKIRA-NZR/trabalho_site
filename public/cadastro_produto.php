<h2>Cadastrar produto novo</h2>
<form action="../src/processo/DadosProduto.php" method="POST" class="form">
    <fieldset>
        <legend>Informações do produto</legend>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br><br>

        <label for="Genero">Gênero:</label>
        <input type="text" name="Genero" required><br><br>

        <label for="estoque">Estoque:</label>
        <input type="number" name="estoque" required><br>

        <button type="submit">Cadastrar</button>

    </fieldset>
</form>