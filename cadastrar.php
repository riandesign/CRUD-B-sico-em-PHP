<?php
include("conexao.php");
$erro = false;

if (isset($_POST['submit'])) {

  // mysql_real_escape_string(trim... => Salva string com apóstrofo
  $titulo = mysql_real_escape_string(trim($_POST['titulo']));

  $query = "INSERT INTO frutas (titulo) values ('$titulo')";

  if ($mysqli->query($query)) {
    //$salvo_sucesso = true;
    header('location: lista.php');
  } else {
    $erro = true;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CRUD Básico</title>
  </head>

  <body>

    <h1>Frutas: cadastrar</h1>

    <?php
    if (isset($erro) && $erro == true) {
      echo '<hr />';
      echo '<h2>Houve um erro ao cadastrar a fruta.</h2>';
      if(!empty( $mysqli->error)){
        echo '<p>' . $mysqli->error . '</p>';
      }
      echo '<hr />';
    }
    ?>

    <p><a href="lista.php">Voltar à lista</a></p>

    <form method="post" action="">
      <input type="text" name="titulo" placeholder="Título da fruta" required><br>
      <input type="submit" name="submit" value="Cadastrar">
    </form>

  </body>
</html>
<?php
// Fecha conexão
$mysqli->close();
?>
