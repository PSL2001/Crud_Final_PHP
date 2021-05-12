<?php
session_start();
    if(!isset($_GET['id'])){
        header("Location:profesores.php");
        die();
    }
    require '../vendor/autoload.php';
    use Clases\Departamentos;
    $cod=$_GET['id'];
    $esteDep = new Departamentos();
    $esteDep->setId($cod);
    $datos = $esteDep->read();
    $fila = $datos->fetch(PDO::FETCH_OBJ);
    $esteDep = null;

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
    <title>Detalles Departamento</title>
</head>

<body style="background: cadetblue;">
    <div class="container mt-2">
        <?php
        require 'resources/mensaje.php';
        ?>
        <h3 class="text-center mt-2">Detalles profesor (<?php echo $fila->id ?>)</h3>
        <div class="card" style="width: 24rem;">
            <div class="card-body">
                <h5 class="card-title">Id del departamento: <?php echo $fila->id ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Nombre del departamento: <?php echo $fila->nom_dep ?></h6>
                <a href="departamentos.php" class="card-link btn btn-primary"><i class="fas fa-home"></i> Volver</a>
            </div>
        </div>
    </div>
</body>

</html>