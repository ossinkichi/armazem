<a href="/armazem/estoque">Voltar</a>
<form action="newRegister" method="post">
    <div>
        <input type="text"      name="name"         placeholder="Nome">
        <input type="password"  name="pass"         placeholder="Senha">
        <input type="date"      name="dateOfBirth"  placeholder="Data de Nascimento">
        <div>
            <span>Genero</span>

            <input type="radio" name="gender" id="masc" value="masculino">
            <label for="masc">Masculino</label>

            <input type="radio" name="gender" id="fem" value="feminino">
            <label for="masc">Feminino</label>
        </div>

        <input type="mail"      name="e-mail"       placeholder="E-mail">
        <input type="tel"       name="phone"        placeholder="Telefone">
        <input type="int"       name="accessLevel"  placeholder="Nivel de accesso">
    </div>
    <button>Registrar</button>
</form>