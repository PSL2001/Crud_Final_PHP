<?php
session_start();
if (!isset($_POST['id'])) {
    header("Location:profesores.php");
    die();
}
require '../vendor/autoload.php';

use Clases\Profesores;

$esteProfe = new Profesores();
$esteProfe->setId($_POST['id']);
$esteProfe->delete();
$esteProfe = null;
$_SESSION['mensaje'] = "Profesor Borrado Correctamente";
header("Location:profesores.php");
