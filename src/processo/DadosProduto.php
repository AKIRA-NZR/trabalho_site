<?php 
include '../config/conexao.php';
?>
<?php
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$genero = $_POST['Genero'];
$estoque = $_POST['estoque'];

$mysql = "INSERT INTO PRODUTOS (nome,preco,Genero,estoque) VALUES (?,?,?,?)"; 
$statement = $conexao->prepare($mysql);
$statement->bind_param("sdsi", $nome, $preco, $genero, $estoque);
if($statement->execute()){
    echo"Cadastrado com sucesso";
}
else{
    echo "Erro".$statement->error;
}
?>