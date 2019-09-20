<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>BuscaEmpresa</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Busca<span>Empresa</span></div>
    </div>
		<br>
		<div class="login">

      <!-- Formulário de Login -->
        <form action="find.php" method="post">
            <input type="text" name="login" id="login" placeholder="Busca" maxlength="55" />
            <input type="submit" value="Buscar">
  <div class="back" style="font-family: 'Exo', sans-serif;">
    <input type = "checkbox" id = "razaosocial" nome = "razaosocial" value = "Razão Social">
    <label for = "razaosocial"> Razão Social </label>

    <input type="checkbox" name="nome" value="on">
    <label>Nome Fantasia</label>

    <input type="checkbox" name="endereco" value="on">
    <label for="endereco">Endereço</label>

    <input type="checkbox" name="bairro" value="on">
    <label for="bairro">Bairro</label>

    <input type="checkbox" name="cidade" value="on">
    <label for="cidade">Cidade</label>

    <input type="checkbox" name="uf" value="on">
    <label for="uf">UF</label>

    <input type="checkbox" name="cep" value="on">
    <label for="cep">CEP</label>

    <input type="checkbox" name="telefone" value="on">
    <label for="telefone">Telefone</label>

    <input type="checkbox" name="atprincipal" value="on">
    <label for="atprincipal">Atividade Principal</label>

    <input type="checkbox" name="atsecundaria" value="on">
    <label for="atsecundaria">Atividade Secundária</label>
    <br><br>
  </div>

</form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>
