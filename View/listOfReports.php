<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="estoque" class="nav-link text-light">
                    <img src="assets/svg/arrowLeft.svg" alt="">
                    Voltar
                </a>
            </li>
        </ul>
    </div>
</nav>

<section class="mt-5">

    <div class="container">

        <div class="mb-3" style="width: 150px;">
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>Escolher ano</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Codigo de Ocorrencia</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Data do Relatorio</th>
                </tr>
            </thead>
            <tbody>
        
                <?php
                    for($i = 0; $i < count($this->dados); $i++){
        
                        ?>
                        
                        <tr>
        
                            <?php
        
                            foreach($this->dados[$i] as $key=>$value){
        
                                if($key != 'id'){
                                ?>
        
                                    <td><?= $value ?></td>
                                
                                <?php
                                }
        
                            }
        
                            ?>
        
                        </tr>
                        
                        <?php
        
                    }
                ?>
            </tbody>
        </table>
    </div>

</section>
