<?php
    session_start();
    require "../vendor/autoload.php";

    use Clases\Departamentos;
    $miDep = new Departamentos();
    $datos = $miDep->devolverTodo();
    $miDep = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Departamentos</title>
</head>
<body style="background: cadetblue;">
    <h3 class="text-center mt-2">Departamentos</h3>
    <div class="container mt-2">
    <?php
        require './resources/mensaje.php';
    ?>
    <a href="crearDepartamento.php" class="btn btn-primary my-2"><i class="fas fa-plus-square"></i> Nuevo Departamento</a>
    <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col">Id del departamento</th>
      <th scope="col">Nombre del departamento</th> 
      <th scope="col" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($fila = $datos->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>\n";
    echo "<th scope='row'>\n";
    echo "<a href='detallesDepartamento.php?id={$fila->id}' class='btn btn-info'><i class='fas fa-info'></i> Detalles</a></th>\n";
    echo "<td>{$fila->id}</td>\n";
    echo "<td>{$fila->nom_dep}</td>\n";
    echo "<td>\n";
    echo "<a href='editarDepartamento.php?id={$fila->id}' class='btn btn-warning'><i class='fas fa-pencil-alt'></i> Editar</a>&nbsp;\n";
    echo "</td>\n";
    echo "<td>\n";
    echo "<form name='as' method='POST' class='form-inline' action='borrarDepartamento.php'>\n";
    echo "<input type='hidden' name='id' value='{$fila->id}'>\n";
    echo "<button type='submit' class='ml-2 btn btn-danger'>Borrar</button>\n";
    echo "</td>";
    echo "</form>";
    echo "</tr>";
  }
    
    ?>
  </tbody>
</table>
  <a href="profesores.php" class="btn btn-info"><i class="fas fa-angle-double-right"></i> Ir a profesores</a>
    </div>
</body>
</html>