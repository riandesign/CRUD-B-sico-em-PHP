<?php
include("conexao.php");
$erro = false;
$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $titulo = $_POST['titulo'];

  $query = "UPDATE frutas SET titulo = '$titulo' WHERE id = '$id'";

  if ($mysqli->query($query)) {
    //$salvo_sucesso = true;
    header('location: lista.php');
  } else {
    $erro = true;
  }
}

// Recupera fruta
$query_recupera = "SELECT * FROM frutas WHERE id = '$id'";
$fruta = $mysqli->query($query_recupera)->fetch_object();
//print_r($fruta);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CRUD Básico</title>
  </head>

  <body>

    <h1>Frutas: editar</h1>

    <?php
    if (isset($erro) && $erro == true) {
      echo '<h2>Houve um erro ao editar a fruta.</h2>';
    }
    ?>

    <p><a href="lista.php">Voltar à lista</a></p>

    <form method="post" action="">
      <input type="text" name="titulo" value="<?php echo $fruta->titulo; ?>" placeholder="Título da fruta" required><br>
      <input type="submit" name="submit" value="Cadastrar">
    </form>

  </body>
</html>
<?php
// Fecha conexão
$mysqli->close();
?>
