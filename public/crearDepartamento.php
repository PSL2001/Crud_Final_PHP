<?php
session_start();
require '../vendor/autoload.php';

use Clases\Departamentos;



if (isset($_POST['crear'])) {

    if (isset($_POST['nom_dep'])) {
        $nom_dep = $_POST['nom_dep'];
        if (strlen($nom_dep) == 0) {
            $_SESSION['mensaje'] = "Rellena los campos";
            header("Location:{$_SERVER['PHP_SELF']}");
            die();
        }
    }
    $esteDep = new Departamentos();
    if (!$esteDep->existeDepartamento(strtoupper($nom_dep))) {
        $esteDep->setNom_dep(strtoupper($nom_dep));
        $esteDep->create();
        $esteDep = null;
        $_SESSION['mensaje'] = "Departamento creado con exito";
        header("Location:departamentos.php");
    } else {
        $_SESSION['mensaje'] = "Este departamento ya existe";
        header("Location:{$_SERVER['PHP_SELF']}");
        die();
    }
} else {
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
        <div class="container mt-3">
            <?php
            require './resources/mensaje.php';
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-control w-25 mx-auto">
                <div class="mt-2">
                    <input type="text" name="nom_dep" placeholder="Nombre del departamento" class="form-control" required>
                </div>
                <div class="mt-2">
                    <input type="submit" name="crear" class="btn btn-success" value="Crear" />
                    <input type="reset" value="Limpiar" class="btn btn-danger" />
                    <a href="departamentos.php" class="btn btn-primary"><i class="fas fa-home"></i> Volver</a>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>