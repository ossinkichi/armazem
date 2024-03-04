<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="login/logout">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<section>

        <div class="">
            <form action="#" method="post">
                <input type="number" name="code" id="code" placeholder="Codigo do produto">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome do Produto: </label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="name" value="..." name="author">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Preço por unidade: </label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="price" value="..." name="author">
                    </div>
                </div>
                <input type="number" name="quant" id="quant" placeholder="Quantidade" min="1">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Preço Total: </label>
                    <div class="col-sm-4">
                        <input type="number" readonly class="form-control-plaintext" id="priceAll" value="0" name="author">
                    </div>
                </div>
            </form>
        
            <div class=""></div>
        
            <div class="">
                <button>Pesquisar Produto</button>
                <button>Cancelar Produto</button>
                <button>Cancelar Compra</button>
                <button onclick="addProduct()">adicionar produto</button>
                <button type="submit" disabled>Finalizar Compra</button>
            </div>
        </div>
</section>
<div></div>

<script src="js/jQuery/jQueryV3.7.1.js"></script>
<script src="js/products.js"></script>
