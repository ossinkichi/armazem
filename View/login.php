<section class="d-flex flex-column justify-content-center">
    <div class="container">
        <div class="card p-3 py-5 m-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 350px;">
            <form action="login/validate" method="post">

                <div class="d-flex flex-column gap-2">

                    <h1 class="fs-1 fw-bolder text-center mb-3">Login</h1>
    
                    <div class="form-floating mb-3">
                        <input type="text" placeholder="Nome de Usuario"   name="user" class="form-control" id="floatingInput" required>
                        <label for="floatingInput">Nome de Usuario</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="Password" placeholder="Senha" name="pass" class="form-control" id="floatingPassword" required>
                        <label for="floatingPassword">Senha</label>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
    
</section>