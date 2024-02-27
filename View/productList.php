<nav class="navbar bg-dark">
    <div class="container-fluid navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item ms-4">
                <a class="nav-link text-light " href="home">
                    <img src="assets/svg/arrowleft.svg" alt="">    
                    Voltar
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">            
            
            <?php
            
                if($_SESSION['accessLevel'] == 0 && $_SESSION['accessLevel'] != 2 && $_SESSION['accessLevel'] != 1){

                    ?>

                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="relatorio">Relatorios</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="estoque/produto">Novo Produto</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="#">Pedido</a>
                    </li> 

                    <?php

                }elseif($_SESSION['accessLevel'] != 2 && $_SESSION['accessLevel'] != 0 && $_SESSION['accessLevel'] == 1 ){
                    ?>

                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="#">Fazer Relatorios</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link text-light" href="#">Fazer Pedido</a>
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

    <table class="table table-bordered">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Em estoque</th>
                <th scope="col">Saida</th>
                <th scope="col">Entrada</th>
                <th scope="col">Adicionar</th>
            </tr>
        </thead>
        <tbody class="text-center">
            
            <?php
                for ($i=0; $i < count($this->dados); $i++) { 
            ?>
    
            <tr>
    
            <?php
                foreach ($this->dados[$i] as $key=>$val) {        
                    if($key != 'id' && $key != 'exit_price'){
            ?>
    
                <td><?=$val;?></td>            
                
            <?php }  }?>
    
                <td>
                    <form action="estoque/alterarEstoque/" method="get">
                        <div class="input-group mb-3">
                            <!-- <input type="text"  placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"> -->
                            <input class="form-control" type="number" name="quant" style="width: 25px;">

                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1" name="adicionar" value="<?=$this->dados[$i]['id'];?>">
                                <img src="assets/svg/add.svg" width="25" alt="">
                            </button>
                        </div>
                        
                    </form>
                </td>
    
            </tr>
    
            <?php  } ?>
            
        </tbody>
    </table>
    
</div>    

</section>
<!-- <script src="js/script.js"></script> -->