<?php include '../src/config/conexao.php'; ?>

<section class="produtos">
    
    <div class="container mt-5 mb-5">
        <h3 class="text-center mb-4" style="color: #d1d1daff;">Nossos Produtos</h3>
        
        <div class="row justify-content-center"> 

            <?php 
            $sql = "SELECT * FROM PRODUTOS";
            $resultado = $conexao->query($sql);
            while($produto = $resultado->fetch_assoc()){
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    
                    <div class="card card-efeito h-100" style="width: 100%;">
                        
                        <img src="https://images.pexels.com/photos/2746823/pexels-photo-2746823.jpeg" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: cover;"
                             alt="Imagem do Produto">
                        
                        <div class="card-body container-pro d-flex flex-column">
                            <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                            
                            <p class="card-text">
                                <?php echo isset($produto['Genero']) ? $produto['Genero'] : 'Gênero'; ?>
                            </p>

                             <p class="card-text">
                                <?php echo isset($produto['estoque']) ? $produto['estoque'] : 'Estoque'; ?>
                            </p>
                            
                            <p class="fw-bold">
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                            </p>
                            
                            <div class="mt-auto">
                                <button 
                                    class="btn btn-primary w-100"
                                    onclick="adicionarProduto(<?php echo $produto['id_produtos']; ?>, '<?php echo $produto['nome']; ?>', <?php echo $produto['preco']; ?>)">
                                    Adicionar ao Carrinho
                                </button>
                            </div>
                        </div>
                    </div>

                </div> <?php
            }
            ?>

        </div> </div> </section>

