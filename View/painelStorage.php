<a href="home">Voltar</a>
<a href="relatorio">Relatorios</a>
<a href="estoque/produto">Novo Produto</a>
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
                <form action="estoque/alterarEstoque/" method="get">
                    <button type="submit" name="adicionar" value="<?=$this->dados[$i]['id'];?>">Adicionar</button>
                    <input type="text" name="quant" style="width: 25px;">
                    <button type="submit" name="remover" value="<?=$this->dados[$i]['id'];?>">Remover</button>
                </form>
            </td>

        </tr>

        <?php  } ?>
        
    </tbody>
</table>