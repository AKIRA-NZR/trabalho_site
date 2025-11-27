let carrinho = JSON.parse(localStorage.getItem('lojaDiscos_carrinho')) || [];

atualizarContador();

function adicionarProduto(id, nome, preco) {
    
    let produtoExistente = carrinho.find(item => item.id === id);

    if (produtoExistente) {
        produtoExistente.quantidade += 1;
    } else {
        carrinho.push({
            id: id,
            nome: nome,
            preco: preco,
            quantidade: 1
        });
    }

    salvarCarrinho();

    alert("Produto adicionado à sacola!");
    atualizarContador();
}

function salvarCarrinho() {
    localStorage.setItem('lojaDiscos_carrinho', JSON.stringify(carrinho));
}

function atualizarContador() {
    let contadorHTML = document.getElementById('contagem-carrinho');
    if (contadorHTML) {
        let totalItens = carrinho.reduce((total, item) => total + item.quantidade, 0);
        contadorHTML.innerText = totalItens + " itens";
    }
}

function limparCarrinho() {
    carrinho = [];
    salvarCarrinho();
    location.reload();
}