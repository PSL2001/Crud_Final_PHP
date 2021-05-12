<?php
session_start();
require '../vendor/autoload.php';

use Clases\Profesores;
use Clases\Departamentos;

if (!isset($_GET['id'])) {
    header("Location:profesores.php");
    die();
}
$id = $_GET['id'];
$esteProfesor = new Profesores();
$esteProfesor->setId($id);
$miProfe = $esteProfesor->read();
$fila = $miProfe->fetch(PDO::FETCH_OBJ);

$esteDep = new Departamentos();
$miDep = $esteDep->read();
$fila2 = $miDep->fetch(PDO::FETCH_OBJ);
//Aqui deberia coger el id de departamentos pero peta la pagina
$esteDep->setId($fila2->id);


if (isset($_POST['editar'])) {
    if (isset($_POST['nom_prof'])) {
        $nom_prof = $_POST['nom_prof'];
        if (strlen($nom_prof) == 0) {
            $_SESSION['mensaje'] = "Rellena el nombre";
            header("Location:{$_SERVER['PHP_SELF']}id=$id");
            die();
        }
    }

    if (isset($_POST['sueldo'])) {
        $sueldo = $_POST['sueldo'];
        if (strlen($sueldo) == 0) {
            $_SESSION['mensaje'] = "Rellena el sueldo";
            header("Location:{$_SERVER['PHP_SELF']}id=$id");
            die();
        }
    }

    if (isset($_POST['fecha_prof'])) {
        $fecha_prof = $_POST['fecha_prof'];
        if (strlen($fecha_prof) == 0) {
            $_SESSION['mensaje'] = "Rellena la fecha";
            header("Location:{$_SERVER['PHP_SELF']}id=$id");
            die();
        }
    }

    if (isset($_POST['dep'])) {
        $dep = $_POST['dep'];
        if (strlen($dep) == 0) {
            $_SESSION['mensaje'] = "Rellena los campos";
            header("Location:{$_SERVER['PHP_SELF']}id=$id");
            die();
        }
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
            <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id"; ?>" method="post" class="form-control w-25 mx-auto">
                <div class="mt-2">
                    <input type="text" name="nom_prof" value="<?php echo $fila->nom_prof ?>" class="form-control" required>
                </div>
                <div class="mt-2">
                    <input type="number" name="sueldo" value="<?php echo $fila->sueldo ?>" class="form-control" required>
                </div>
                <div class="mt-2 ">
                    <select class="form-select" name="departamento" aria-label="Default select example">
                        <option selected>Selecciona el departamento</option>
                        <?php
                        while ($item = $fila2) {
                            echo "<option value='{$item->id}'>{$item->nom_dep}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-2">
                    <input type="submit" name="editar" class="btn btn-success" value="Editar" />
                    <input type="reset" value="Limpiar" class="btn btn-danger" />
                    <a href="profesores.php" class="btn btn-primary"><i class="fas fa-home"></i> Volver</a>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>