<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="\estoque/produto">Voltar</a>
            </li>
        </ul>
    </div>
</nav>

<section class="my-5">

    <div class="container">
            <div class="card p-3">

                <h1 class="text-center mb-4">Registrar nova categoria</h1>

                <form action="setCategory" method="post">

                    <div class="form-floating mb-3">
                        <input type="text" name="category" class="form-control" id="floatingInput" placeholder="Categoria">
                        <label for="floatingCode">Categoria</label>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Registrar categoria</button>
                    </div>

                </form>       

            </div>
    </div>        

</section>