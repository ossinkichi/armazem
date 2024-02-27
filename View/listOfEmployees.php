<nav class="navbar bg-dark">
    <div class="container-fluid navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item ms-4">
                <a class="nav-link text-light" href="home">
                    <img src="assets/svg/arrowLeft.svg" alt="">    
                    Voltar
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            
            <?php
            
                if($_SESSION['accessLevel'] == 0 && $_SESSION['accessLevel'] != 1 && $_SESSION['accessLevel'] != 2){

                    ?>
                    
                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="funcionarios/register">Novo Funcionario</a>
                    </li>

                    <?php

                }

            ?>

            <li class="nav-item ms-4">
                <a class="nav-link text-light" href="login/logout">
                    sair
                    <img src="assets/svg/logout.svg" alt="Logout" width="30">
                </a>
            </li>
        </ul>
    </div>
</nav>

<section>

    <div class="container mt-5">
            
        <div class="d-flex flex-row justify-content-between mb-4">
            <div class="btn-group" role="group" style="width: 150px;">
                <button class="btn btn-success">Ativos</button>
                <button class="btn btn-danger">Desativados</button>
            </div>

            <div>
            <div>
                <input type="text" class="form-control" placeholder="Pesquisar Funcionario" aria-label="Pesquisar Funcionario">
            </div>
            </div>
        </div>

        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Nivel de acesso</th>
                    <th scope="col">Estado</th>
                    <th class="text-center" scope="col">Config</th>
                </tr>
            </thead>
            <tbody>
        
                <?php
                    for($i = 0; $i < count($this->dados); $i++){
        
                        ?>
                        
                        <tr>
        
                        <?php
                        
                            foreach($this->dados[$i] as $key=>$value){
        
                                if($key != 'id' && $key != 'pass'){
                                ?>
        
                                    <td><?= $value ?></td>
        
                                <?php
                                }
                            }
                                if($_SESSION['accessLevel'] == 1){
        
                                    ?>
                                    <td class="text-center">
                                        <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                                    </td>
                                    <?php
        
                                }else{
                                ?>
                                <td class="text-center">
                                    <a href="funcionarios/Alterar/?pos=<?=$this->dados[$i]['id'];?>">Alterar</a>
                                    |
                                    <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                                </td>
            
                            </tr>
        
                        <?php
                                }
                            }
        
                ?>
            </tbody>
        </table>
    </div>

</section>