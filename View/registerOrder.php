<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="\home" class="nav-link text-light">Voltar</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/login\logout" class="nav-link text-light">
                    Sair
                    <img src="\assets/svg/logout.svg" alt="">
                </a>
            </li>
        </ul>
    </div>
</nav>


<section class="mt-4">

    <div class="container">
        <div class="card p-3">

            <h1 class="text-center mb-4">Adicionar pedido</h1>

            <form action="" method="post" id="form">

                <div class="form-floating mb-3">
                    <input type="number" min="0" name="code" class="form-control code" id="floatingInput" placeholder="Codigo do produto">
                    <label for="floatingCode">Codigo do produto</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control name" id="floatingPassword" placeholder="Nome do produto" autocomplete="off">
                    <label for="floatingName">Nome do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" min="0" name="amount" class="form-control amount" id="floatingPassword" placeholder="Preço do produto" autocomplete="off">
                    <label for="floatingPrice">Quantidade desejada</label>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Registrar Promoção</button>
                </div>

            </form>       

        </div>
    </div>

</section>

<script src="\js/jQuery/jQueryV3.7.1.js"></script>
<script src="\js/products.js"></script>