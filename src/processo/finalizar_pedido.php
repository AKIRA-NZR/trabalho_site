<?php
include '../config/conexao.php';

$json = file_get_contents('php://input');
$dados = json_decode($json, true);

if (isset($dados['id_cliente']) && isset($dados['total'])) {
    
    $idCliente = $dados['id_cliente'];
    $precoFinal = $dados['total']; 
    $quantidadeTotal = 0;
    if (isset($dados['itens'])) {
        foreach ($dados['itens'] as $item) {
            $quantidadeTotal += $item['quantidade'];
        }
    }
    
    $sql = "INSERT INTO COMPRAS (id_cliente_fk, data_compra, quantidade, preco_final) VALUES (?, NOW(), ?, ?)";
    
    $stmt = $conexao->prepare($sql);
    
    $stmt->bind_param("iid", $idCliente, $quantidadeTotal, $precoFinal);
    
    if ($stmt->execute()) {
        echo "Pedido realizado com sucesso! Obrigado pela compra.";
    } else {
        echo "Erro no Banco: " . $stmt->error;
    }
    
    $stmt->close();
    
} else {
    echo "Erro: Dados incompletos.";
}

$conexao->close();
?>