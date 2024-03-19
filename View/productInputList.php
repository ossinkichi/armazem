<nav class="navbar bg-dark">
    <div class="container-fluid navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item ms-4">
                <a class="nav-link text-light " href="\armazem\estoque">
                    <img src="\assets/svg/arrowleft.svg" alt="">    
                    Voltar
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">            
            <li class="nav-item ms-4">
                <a class="nav-link text-light" href="login/logout">
                    sair
                    <img src="\assets/svg/logout.svg" alt="Logout" width="30">
                </a>
            </li>
        </ul>
    </div>
</nav>

<section>
    <div class="container mt-5">

    <table class="table table-bordered">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">Entrada</th>
                <th scope="col">Data da entrada</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
            <?php
            for($i = 0; $i < count($this->dados);$i++){
                foreach($this->dados[$i] as $key=>$values){
                    if($key != 'id'){
                        ?>
                        <td><?=$values?></td>
                        <?php
                    }
                }?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    </div>
</section>