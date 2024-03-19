<a href="/armazem/funcionarios">Voltar</a>

<div class="container">

    <div class="row">

        <span>Data de nascimento : <?=$this->dados['dateOfBirth'];?></span>
        
        <span>name: <h3><?=$this->dados['name'];?></h3></span>
        
        <div>
            <p>Email: <?=$this->dados['email'];?></p>
            <p>Telefone: <?=$this->dados['phone'];?></p>
            <p>Genero: <?=$this->dados['gender'];?></p>
        </div>
        
        <span>Nivel de Acesso: <?=$this->dados['accessLevel'];?></span>
        
        <span>Status de atividade: <?=$this->dados['status'];?></span>

    </div>
    

</div>