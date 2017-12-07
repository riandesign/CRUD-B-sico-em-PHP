<?php
include("conexao.php");
$id = $_GET['id'];

$query = "DELETE FROM frutas WHERE id = '$id'";

if ($mysqli->query($query)) {
  header('location: lista.php');
} else {
  echo 'Erro!';
  exit();
}
?>
