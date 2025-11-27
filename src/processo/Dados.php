<?php 
include '../config/conexao.php';
?>
<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cep = $_POST['cep'];

$mysql = "INSERT INTO CLIENTE (nome, email, senha,cep) VALUES (?,?,?,?)";
$statement = $conexao->prepare($mysql);
$statement->bind_param("ssss", $nome,$email,$senha,$cep);
if($statement->execute()){
    $idCliente = $statement->insert_id;
    echo "<script>
            alert('Cadastro realizado com SUCESSO! \\n\\nATENÇÃO: O SEU ID É: $idCliente \\n\\nGuarde este número, você precisará dele para comprar!');
            window.location.href = '../../public/index.php'; 
          </script>";
}
else{
    echo "Falha. Cliente não cadastrado".$statement->error;
}
$statement->close();
$conexao->close();
?>