<html>
<?php
require 'conector/conexion.php';

if (!empty($_POST) AND (empty($_POST['login']))) {
    header("Location: index.php"); exit;
}
$busca = $_POST['login'];
$find = "";


if (!empty($_POST['login'])) {
  //echo "entrou";

  //Nome fantasia
  if (isset($_POST['nome'])){
    echo $busca = $_POST['login'];
    $nome = "True";
    $find = "upper(nome_fantasia) like '%$busca%'";
  }
  //Endereço
  if (isset($_POST['endereco'])){
    echo $endereco = $_POST['endereco'];
    if (!empty($find)){
     $find = $find . " or upper(logradouro) like '%$busca%'";
   } else {
     $find = "upper(logradouro) like '%$busca%'";
   }
  }
  //bairro
  if (isset($_POST['bairro'])){
    echo $bairro = $_POST['bairro'];
    if (!empty($find)){
     $find = $find . " or upper(bairro) like '%$busca%'";
   } else {
     $find = "upper(bairro) like '%$busca%'";
   }
  }
  //cidade
  if (isset($_POST['cidade'])){
    echo $cidade = $_POST['cidade'];
    if (!empty($find)){
     $find = $find . " or upper(municipio) = '%$busca%'";
   } else {
     $find = "upper(municipio) like '%$busca%'";
   }
  }
  //uf
  if (isset($_POST['uf'])){
    echo $uf = $_POST['uf'];
    if (!empty($find)){
     $find = $find . " or upper(uf) like '%$busca%'";
   } else {
     $find = "upper(uf) like '%$busca%'";
   }
  }
  //cep
  if (isset($_POST['cep'])){
    echo $cep = $_POST['cep'];
    if (!empty($find)){
     $find = $find . " or cep like '%$busca%'";
   } else {
     $find = "cep like '%$busca%'";
   }
  }
  //telefone
  if (isset($_POST['telefone'])){
    echo $telefone = $_POST['telefone'];
    if (!empty($find)){
     $find = $find . " or telefone like '%$busca%'";
   } else {
     $find = "telefone like '%$busca%'";
   }
  }
  //atprincipal
  if (isset($_POST['atprincipal'])){
    echo $atprincipal = $_POST['atprincipal'];
    if (!empty($find)){
     $find = $find . " or atividade_principal = '$busca'";
   } else {
     $find = "atividade_principal = '$busca'";
   }
  }
  //atsecundaria
  if (isset($_POST['atsecundaria'])){
    echo $atsecundaria = $_POST['atsecundaria'];
    if (!empty($find)){
     $find = $find . " or atividades_secundarias = '$busca'";
   } else {
     $find = "atividades_secundarias = '$busca'";
   }
  }
  //if (empty($find)){
    //$find = $find . " 1";
  //}
}
?>
<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">

  <title>BuscaEmpresa</title>
  <link rel="stylesheet" type="text/css" href="css/find.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
    <div class="topo">
  		<div class="header" >
  			<div>Busca<span>Empresa</span></div>
      </div>
  		<br>
  		<div class="login">

        <!-- Formulário de Login -->
          <form action="find.php" method="post">
              <input type="text" name="login" id="login" placeholder="Busca" maxlength="25" value="<?php echo $busca; ?>" autofocus>
              <input class="busca" type="submit" value="Buscar">
              <?php
              $total = "";
              $query = "SELECT ifnull(count(*), 0) as total FROM dados where $find";
              $sql = mysqli_query($conn, $query);
              while($row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                  $total = $row_s['total'];
              }
               ?>
              <h1 style="font-family: 'Exo', sans-serif;font-size: 18px; position: absolute; color: black; top:35px;">Exatamente <?php echo $total; ?> resultados.</h1>

    <div class="back" style="font-family: 'Exo', sans-serif;">
      <input type = "checkbox" id = "razaosocial" nome = "razaosocial" value = "Razão Social">
      <label for = "razaosocial"> Razão Social </label>

      <input type="checkbox" name="nome" value="on" <?php if(!empty($nome)){ echo "checked"; } ?>>
      <label>Nome Fantasia</label>

      <input type="checkbox" name="endereco" value="on" <?php if(!empty($endereco)){ echo "checked"; } ?>>
      <label for="endereco">Endereço</label>

      <input type="checkbox" name="bairro" value="on" <?php if(!empty($bairro)){ echo "checked"; } ?>>
      <label for="bairro">Bairro</label>

      <input type="checkbox" name="cidade" value="on" <?php if(!empty($cidade)){ echo "checked"; } ?>>
      <label for="cidade">Cidade</label>

      <input type="checkbox" name="uf" value="on" <?php if(!empty($uf)){ echo "checked"; } ?>>
      <label for="uf">UF</label>

      <input type="checkbox" name="cep" value="on" <?php if(!empty($cep)){ echo "checked"; } ?>>
      <label for="cep">CEP</label>

      <input type="checkbox" name="telefone" value="on" <?php if(!empty($telefone)){ echo "checked"; } ?>>
      <label for="telefone">Telefone</label>

      <input type="checkbox" name="atprincipal" value="on" <?php if(!empty($atprincipal)){ echo "checked"; } ?>>
      <label for="atprincipal">Atividade Principal</label>

      <input type="checkbox" name="atsecundaria" value="on" <?php if(!empty($atsecundaria)){ echo "checked"; } ?>>
      <label for="atsecundaria">Atividade Secundária</label>
      <br><br>
    </div>
  </div>
</form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<div class="result2">
<table class="result">
<?php
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
if (!empty($find)){
  $find = strtolower($find);
  $query = "SELECT * FROM dados where $find and situacao = 'ATIVA' order by 3";
  //echo $query;
  $i = 0;
  $sql = mysqli_query($conn, $query);
  if (!empty($sql)){
  while($row_u = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    $i++;
    $razao_social = $row_u['nome'];
    $nome_fantasia = $row_u['nome_fantasia'];
    $telefone = $row_u['telefone'];
    $logradouro = $row_u['logradouro'];
    $bairro = $row_u['bairro'];
    $cidade = $row_u['municipio'];
    $uf = $row_u['uf'];
    $cep = $row_u['cep'];
    $capital_social = $row_u['capital_social'];

?>
<tr>
  <td><?php echo $i . " - " . $nome_fantasia . " - CapitalSocial: " . $capital_social . " - Endereço: " . $logradouro . " - Bairro: " . $bairro . " - Cidade: " . $cidade . " - UF: " . $uf . " - CEP: " . $cep;?><b><?php echo  " - Tel.: " . $telefone; ?> </b><input class="mapa" type="submit" value="Mapa"></td>
</tr>
<?php
}}}
?>
</table>
</div>
</body>
</html>
