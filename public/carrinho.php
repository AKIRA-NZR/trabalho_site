<?php include '../src/templates/header.php'; ?>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4" style="color:aliceblue">Finalizar Pedido</h2>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Preço</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-carrinho">
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="carrinho-vazio" class="alert alert-warning mt-3 d-none">
                Sua sacola está vazia. <a href="index.php">Voltar a comprar</a>.
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4 class="mb-3">Cálculo de frete</h4>
                
                <div class="mb-3">
                    <label class="form-label small fw-bold">ID do Cliente:</label>
                    <input type="number" id="id_cliente" class="form-control" placeholder="Ex: 1" required>
                    <div class="form-text">Digite o ID gerado no seu cadastro.</div>
                    
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Calcular Frete (CEP):</label>
                    <div class="input-group">
                        <input type="text" id="cep" class="form-control" placeholder="00000-000" onblur="buscarFrete()">
                        <button class="btn btn-outline-secondary" type="button" onclick="buscarFrete()">OK</button>
                    </div>
                    <small id="endereco-destino" class="text-muted d-block mt-1"></small>
                </div>

                <hr>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span id="valor-subtotal">R$ 0,00</span>
                </div>
                <div class="d-flex justify-content-between mb-2 text-danger">
                    <span>Frete:</span>
                    <span id="valor-frete">R$ 0,00</span>
                </div>
                <div class="d-flex justify-content-between mb-4 fs-5 fw-bold">
                    <span>Total:</span>
                    <span id="valor-total-final">R$ 0,00</span>
                </div>

                <button onclick="finalizarCompra()" class="btn btn-success w-100 btn-lg">
                    Confirmar Pedido
                </button>
                
                <button onclick="limparCarrinho()" class="btn btn-link text-danger btn-sm w-100 mt-2">
                    Esvaziar Sacola
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let carrinho = JSON.parse(localStorage.getItem('lojaDiscos_carrinho')) || [];
    let valorFrete = 0;
    let valorSubtotal = 0;

    function carregarPagina() {
        let tbody = document.getElementById('tabela-carrinho');
        tbody.innerHTML = '';
        valorSubtotal = 0;

        if (carrinho.length === 0) {
            document.getElementById('carrinho-vazio').classList.remove('d-none');
            return;
        }

        carrinho.forEach(item => {
            let totalItem = item.preco * item.quantidade;
            valorSubtotal += totalItem;

            tbody.innerHTML += `
                <tr>
                    <td>${item.nome}</td>
                    <td>${item.quantidade}</td>
                    <td>R$ ${item.preco.toFixed(2)}</td>
                    <td>R$ ${totalItem.toFixed(2)}</td>
                </tr>
            `;
        });

        atualizarTotais();
    }

    function buscarFrete() {
        let cep = document.getElementById('cep').value.replace(/\D/g, '');

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(resposta => resposta.json())
                .then(dados => {
                    if (!dados.erro) {
                        document.getElementById('endereco-destino').innerText = `${dados.logradouro}, ${dados.bairro} - ${dados.localidade}`;
                        valorFrete = 20.00; 
                        atualizarTotais();
                    } else {
                        alert("CEP não encontrado!");
                    }
                });
        }
    }

    function atualizarTotais() {
        document.getElementById('valor-subtotal').innerText = valorSubtotal.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
        document.getElementById('valor-frete').innerText = valorFrete.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
        
        let totalFinal = valorSubtotal + valorFrete;
        document.getElementById('valor-total-final').innerText = totalFinal.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
    }

    function finalizarCompra() {
        let idCliente = document.getElementById('id_cliente').value;

        if (!idCliente) {
            alert("Por favor, digite seu ID de Cliente.");
            return;
        }
        if (carrinho.length === 0) {
            alert("Carrinho vazio!");
            return;
        }

        let dadosPedido = {
            id_cliente: idCliente,
            total: valorSubtotal + valorFrete,
            itens: carrinho
        };

        fetch('../src/processo/finalizar_pedido.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dadosPedido)
        })
        .then(res => res.text())
        .then(resposta => {
            alert(resposta);
            if (resposta.includes("sucesso")) {
                localStorage.removeItem('lojaDiscos_carrinho');
                window.location.href = 'index.php';
            }
        });
    }

    function limparCarrinho() {
        localStorage.removeItem('lojaDiscos_carrinho');
        location.reload();
    }


    carregarPagina();
</script>

<?php include '../src/templates/footer.php'; ?>