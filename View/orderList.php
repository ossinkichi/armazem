<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="\estoque" class="nav-link text-light">
                    <img src="assets/svg/arrowLeft.svg" alt="">
                    Voltar
                </a>
            </li>
        </ul>
    </div>
</nav>

<section class="mt-5">

    <div class="container">

        <div class="mb-3" style="width: 250px;">
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>Codigo de Ocorrencia</option>
                <option value="2024">...</option>
            </select>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Codigo do produto</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data do pedido</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Aceitar</th>
                </tr>
            </thead>
            <tbody class="text-center">
        
                <?php
                    for($i = 0; $i < count($this->dados); $i++){
        
                        ?>
                        
                        <tr style="height: 50px;">
        
                            <?php
        
                            foreach($this->dados[$i] as $key=>$value){
        
                                if($key != 'id'){
                                ?>
        
                                    <td><?= $value ?></td>
                                
                                <?php
                                }
        
                            }
        
                            ?>
                            <td>
                                <a href="/estoque/acceptOrder/?code=<?=$this->dados[$i]['id'];?>">Aceitar</a>
                            </td>
        
                        </tr>
                        
                        <?php
        
                    }
                ?>
            </tbody>
        </table>
    </div>

</section>
