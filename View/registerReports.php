<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="\armazem\home" class="nav-link text-light">Voltar</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="logout" class="nav-link text-light">
                    Sair
                    <img src="assets/svg/logout.svg" alt="">
                </a>
            </li>
        </ul>
    </div>
</nav>

<section class="my-4">

    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center">

            <div class="card p-3 m-auto rounded" style="width: 750px;">
    
                <form action="setNewReport" method="post">
                    <div class="d-flex flex-column">

                        <h1 class="fw-bolder text-center mb-3">Reportar</h1>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nome: </label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=$_SESSION['name']?>" name="author">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3">Codigo de Ocorrencia:</label>
                            <input type="number" class="col-sm-2 form-control" style="width: 50px;" name="code">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Assunto</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="report"></textarea>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
    
            </div>

        </div>

    </div>

</section>