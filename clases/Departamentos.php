<?php
namespace Clases;
use PDO;
use PDOException;


class Departamentos extends Conexion {
    private $id;
    private $nom_dep;

    public function __construct()
    {
        parent::__construct();
    }


    //-----------------------------CRUD----------------------------------------------------------
    public function create() {

    }
    public function read() {
        
    }
    public function update() {
        
    }
    public function delete() {
        
    }

    //Metodo para devolver todos los datos de Departamentos
    public function devolverTodo() {
        $con = "select * from departamentos";
        $stmt=parent::$conexion->prepare($con);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al devolver los departamentos, ".$ex->getMessage());
        }
        return $stmt;
    }

    //Metodo para devolver el departamento
    public function devolverDepartamento() {
        $con = "select nom_dep from departamentos where id=:i";
        $stmt=parent::$conexion->prepare($con);

        try {
            $stmt->execute([
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al devolver el departamento, ".$ex->getMessage());
        }
        return $stmt;
    }
    //-------------------------------------------------------------------------------------------

    /**
     * Get the value of nom_dep
     */ 
    public function getNom_dep()
    {
        return $this->nom_dep;
    }

    /**
     * Set the value of nom_dep
     *
     * @return  self
     */ 
    public function setNom_dep($nom_dep)
    {
        $this->nom_dep = $nom_dep;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}