<?php 
include '../src/templates/header.php';
?>

<div class="container mt-5 mb-5">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card shadow p-4"> <h3 class="mb-4 text-center">Cadastro de Cliente</h3>

                <form class="row g-3" action="../src/processo/Dados.php" method="POST">
                
                    <div class="col-12">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome completo" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha segura" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">CEP</label>
                        <input type="text" class="form-control" name="cep" placeholder="00000-000">
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                Aceito os termos e condições
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Confirmar Cadastro</button>
                    </div>

                </form> </div> </div> </div> </div> <?php 
include '../src/templates/footer.php';
?>