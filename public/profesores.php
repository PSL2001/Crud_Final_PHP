<?php
    session_start();
    require "../vendor/autoload.php";

    use Clases\Profesores;
    $misProfesores = new Profesores();
    $datos = $misProfesores->devolverTodo();
    $misProfesores = null;
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
    <title>Profesores</title>
</head>
<body style="background: cadetblue;">
    <h3 class="text-center mt-2">Profesores</h3>
    <div class="container mt-2">
    <?php
        require './resources/mensaje.php';
    ?>
    <a href="crearProfesor.php" class="btn btn-primary my-2"><i class="fas fa-plus-square"></i> Nuevo Post</a>
    <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col">Nombre del profesor</th>
      <th scope="col">Sueldo del profesor</th>
      <th scope="col">Fecha de Incorporacion</th>
      <th scope="col">Departamento</th>
      <th scope="col" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($fila = $datos->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "<th scope='row'>";
    echo "<a href='detallesProfesor.php?id={$fila->id}' class='btn btn-info'><i class='fas fa-info'></i> Detalles</a></th>";
    echo "<td>{$fila->nom_prof}</td>";
    echo "<td>{$fila->sueldo}</td>";
    echo "<td>{$fila->fecha_prof}</td>";
    echo "<td>{$fila->nom_dep}</td>";
    echo "<td>";
    echo "<a href='editarProfesor.php?id={$fila->id}' class='btn btn-warning'><i class='fas fa-pencil-alt'></i> Editar</a>&nbsp;\n";
    echo "</td>";
    echo "<td>";
    echo "<form name='as' method='POST' class='form-inline' action='borrarProfesor.php'>\n";
    echo "<input type='hidden' name='id' value='{$fila->id}'>\n";
    echo "<button type='submit' class='ml-2 btn btn-danger'>Borrar</button>";
    echo "</tr>";
  }
    
    ?>
  </tbody>
</table>
    </div>
</body>
</html>