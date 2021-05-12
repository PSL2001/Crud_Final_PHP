<?php
session_start();
if (!isset($_POST['id'])) {
    header("Location:departamentos.php");
    die();
}
require '../vendor/autoload.php';

use Clases\Departamentos;

$esteDepar = new Departamentos();
$esteDepar->setId($_POST['id']);
$esteDepar->delete();
$esteDepar = null;
$_SESSION['mensaje'] = "Departamento Borrado Correctamente";
header("Location:departamentos.php");
