<nav class="navbar bg-dark">
    <div class="container-fluid navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="\armazem\funcionarios" class="nav-link text-light">
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

                <form class="row g-3 needs-validation" action="#" method="post"  novalidate>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="name" required>
                        <div class="invalid-tooltip">
                            Por favor insira um nome
                        </div>
                    </div>
                    
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="validationTooltip01" name="pass" required>
                        <div class="invalid-tooltip">
                            Por favor insira uma senha.
                        </div>
                    </div>
        
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltipUsername" class="form-label">E-email</label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        <input type="mail" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" name="e-mail" required>
                        <div class="invalid-tooltip">
                            Por favor insira um email válido.
                        </div>
                        </div>
                    </div>
        
                    <div class="col-md-2 position-relative">
                        <label for="validationTooltip03" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="validationTooltip03" name="dateOfBirth" required>
                        <div class="invalid-tooltip">
                            Por favor insira uma data.
                        </div>
                    </div>
        
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip04" class="form-label">Gênero</label>
                        <select name="gender" class="form-select" id="validationTooltip04" required>
                            <option selected disabled>Gênero</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                        <div class="invalid-tooltip">
                            Por favor escolha um gênero.
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip05" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="validationTooltip05" name="phone" required>
                        <div class="invalid-tooltip">
                            Por favor insira um numero.
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip04" class="form-label">Cargo</label>
                        <select name="accessLevel" class="form-select" id="validationTooltip04" required>
                            <option selected disabled>Selecionar nivel de acesso</option>
                            <option value="0">Administrador</option>
                            <option value="1">Gerente</option>
                            <option value="2">Funcionario</option>
                        </select>
                        <div class="invalid-tooltip">
                            Por favor escolha um cargo.
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Alterar dados</button>
                    </div>
            </form>
        </div>
    </div>

</section>