<a href="home">Voltar</a>
<a href="funcionarios/register">Novo Funcionario</a>
<table>
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">Sexo</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Nivel de acesso</th>
            <th scope="col">Estado</th>
            <th scope="col">Config</th>
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
                    if($this->dados[$i]['status'] == 'desativado'){
                        if($_SESSION['accessLevel'] == 1){

                            ?>
                            <td>
                                <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                            </td>
                            <?php

                        }else{
                        ?>
                        <td>
                            <a href="funcionarios/religar/?pos=<?=$this->dados[$i]['id'];?>">Reativar</a>
                            |
                            <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                        </td>
    
                    </tr>
    
                    <?php
                        }
                    }else{
                        if($_SESSION['accessLevel'] == 1){

                            ?>
                            <td>
                                <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                            </td>
                            <?php

                        }else{
                        ?>
                ?>
                    <td>
                        <a href="funcionarios/desligar/?pos=<?=$this->dados[$i]['id'];?>">Desligar</a>
                        |
                        <a href="funcionarios/perfil/?pos=<?=$this->dados[$i]['id'];?>">Info</a>
                    </td>

                </tr>

                <?php
                        }
                    }

            }
        ?>
    </tbody>
</table>