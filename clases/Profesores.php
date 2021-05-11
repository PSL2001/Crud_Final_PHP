<?php
namespace Clases;
use PDO;
use PDOException;


class Profesores extends Conexion {
    private $id;
    private $nom_prof;
    private $sueldo;
    private $fecha_prof;
    private $dep;

    public function __construct()
    {
        parent::__construct();
    }


    //-----------------------------CRUD----------------------------------------------------------
    public function create() {
        $con = "insert into profesores(nom_prof, sueldo, fecha_prof, dep) values(:n, :s, now(), :d)";
        $stmt=parent::$conexion->prepare($con);

        try {
            $stmt->execute([
                ':n'=>$this->nom_prof,
                ':s'=>$this->sueldo,
                ':d'=>$this->dep
            ]);
        } catch (PDOException $ex) {
            die("Error al crear el nuevo profesor," .$ex->getMessage());
        }
    }
    public function read() {
        $con = "select * from profesores where id=:id";
        $stmt=parent::$conexion->prepare($con);

        try {
            $stmt->execute([
                ':id'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al leer el profesor, ".$ex->getMessage());
        }
        return $stmt;
    }
    public function update() {
        
    }
    public function delete() {
        $con = "delete from profesores where id=:i";
        $stmt=parent::$conexion->prepare($con);

        try {
            $stmt->execute([
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el profesor," .$ex->getMessage());
        }
    }

    //Metodo para devolver todos los datos de Profesores
    public function devolverTodo() {
        $con="select * from profesores";
        $stmt=parent::$conexion->prepare($con);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al devolver los profesores. Mensaje:".$ex->getMessage());
        }
        return $stmt;
    }
    //-------------------------------------------------------------------------------------------


    /**
     * Get the value of dep
     */ 
    public function getDep()
    {
        return $this->dep;
    }

    /**
     * Set the value of dep
     *
     * @return  self
     */ 
    public function setDep($dep)
    {
        $this->dep = $dep;

        return $this;
    }

    /**
     * Get the value of fecha_prof
     */ 
    public function getFecha_prof()
    {
        return $this->fecha_prof;
    }

    /**
     * Set the value of fecha_prof
     *
     * @return  self
     */ 
    public function setFecha_prof($fecha_prof)
    {
        $this->fecha_prof = $fecha_prof;

        return $this;
    }

    /**
     * Get the value of sueldo
     */ 
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * Set the value of sueldo
     *
     * @return  self
     */ 
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Get the value of nom_prof
     */ 
    public function getNom_prof()
    {
        return $this->nom_prof;
    }

    /**
     * Set the value of nom_prof
     *
     * @return  self
     */ 
    public function setNom_prof($nom_prof)
    {
        $this->nom_prof = $nom_prof;

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