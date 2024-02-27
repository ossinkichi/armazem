<!-- <a href="/armazem/estoque">Voltar</a>
<form action="newProduct" method="post">
    <div>
        <input type="number" name="code" placeholder="Codigo">
        <input type="text" name="name" placeholder="Produto">
        <input type="text" name="price" placeholder="Preço">
        <input type="text" name="estoque" placeholder="Estoque">
    </div>
    <button type="submit">Registrar</button>
</form> -->

<nav class="navbar bg-dark">
    <div class="container-fluid navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="\armazem\produtos" class="nav-link text-light">
                    <img src="assets/svg/arrowLeft.svg" alt="">    
                    Voltar
                </a>
            </li>
        </ul>
    </div>
</nav>

<section class="mt-4">

    <div class="container">
        <div class="card p-3">

            <h1 class="text-center mb-4">Registrar novo produto</h1>

            <form action="newProduct" method="post">

                <div class="form-floating mb-3">
                    <input type="number" name="code" class="form-control" id="floatingInput" placeholder="Codigo do produto">
                    <label for="floatingCode">Codigo do profudo</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="floatingPassword" placeholder="Nome do produto">
                    <label for="floatingName">Nome do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="price" class="form-control" id="floatingPassword" placeholder="Preço do produto">
                    <label for="floatingPrice">Preço do produto</label>
                </div>

                <div class="form-floating">
                    <select name="category" class="form-select" id="floatingSelectGrid">
                        <option selected disabled>---</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelectGrid">Selecione uma categoria</label>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Registrar Produto</button>
                </div>

            </form>       

        </div>
    </div>

</section>