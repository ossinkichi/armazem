<table>
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Em estoque</th>
            <th scope="col">Saida</th>
            <th scope="col">Entrada</th>
            <th scope="col">Config</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            for ($i=0; $i < count($this->dados); $i++) { 
        ?>
        <tr>
        <?php
            foreach ($this->dados[$i] as $key=>$val) {        
                if($key != 'id'){
        ?>

            <td><?=$val;?></td>            
            
        <?php }  }?>
            <td>
                <a href="estoque/adicionar/?num=<?=$this->dados[$i]['id'];?>">Adicionar</a>
                |
                <a href="estoque/remover/?num=<?=$this->dados[$i]['id'];?>">Remover</a>
            </td>
        </tr>
        <?php  } ?>
    </tbody>
</table>