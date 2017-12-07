<?php

// Dados para conectar ao banco
$mysqli = new mysqli("localhost", "root", "", "php_crud_basico");

// Verifica conexão
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

?>
