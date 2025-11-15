<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$bancoDados = "lojadiscos";
$conexao =  new mysqli($servidor,$usuario,$senha,$bancoDados);
if ($conexao->connect_error) {
    die("Erro na conexão". $conexao->connect_error);
}


?>