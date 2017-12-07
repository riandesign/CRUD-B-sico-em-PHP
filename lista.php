<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CRUD Básico</title>
  </head>

  <body>

    <h1>Frutas</h1>

    <p><a href="cadastrar.php">Cadastrar nova fruta</a></p>

    <?php
    $query = "SELECT * FROM frutas ORDER by titulo ASC";

    if ($result = $mysqli->query($query)) :
    ?>
      <table style="width:100%" border="1">
        <tr>
          <th>Fruta</th>
          <th>Ações</th>
        </tr>

        <?php
        // Retorna chave(s) associada(s) à tabela do banco
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <td>
              <?php echo $row["titulo"]; ?>
            </td>
            <td>
              <a href="editar.php?id=<?php echo $row["id"]; ?>">Editar</a>
              -
              <a href="excluir.php?id=<?php echo $row["id"]; ?>">Excluir</a>
            </td>
          </tr>
        <?php
        endwhile;
        ?>
      </table>
    <?php
      // Libera (memória) resultado
      $result->close();
    endif;
    ?>

  </body>
</html>
<?php
// Fecha conexão
$mysqli->close();
?>
