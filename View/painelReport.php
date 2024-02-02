<a href="home">Voltar</a>
<table>
    <thead>
        <tr>
            <th scope="col">Autor</th>
            <th scope="col">Data de emisão</th>
            <th scope="col">Valor de Saida</th>
            <th scope="col">Estoque</th>
            <th scope="col">Saida</th>
            <th scope="col">Entrada</th>
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