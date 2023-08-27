<?php
require_once("conexion.php");

class examenModel extends Conexion
{
        
        
        private $CodExamen;
        private $Nombreexamen;
        private $Precio;
        private $Tipoexamen;
        private $Tipomuestra;
        
        private $Fecha;
        private $Codigo;
        private $id;

        public function __construct()
        {
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConexion();
        }

        public function insertarExamen(string $nombreexamen, string $codigo,string $tipoexamen,string $precio,string $tipomuestra)
        {
           
            $this->Nombreexamen=$nombreexamen;
            $this->Codigo=$codigo;
            $this->Tipoexamen=$tipoexamen;
            $this->Precio=$precio;
            $this->Tipomuestra=$tipomuestra;
            
            
            

            $sql="INSERT INTO examen(nombre,codigo,tipoexamen,Precio,tipomuestra) VALUES(?,?,?,?,?);";
            $insert=$this->conexion->prepare($sql);
            $arregloParametros=array($this->Nombreexamen,$this->Codigo,$this->Tipoexamen,$this->Precio,$this->Tipomuestra);
            $ResultadoInsert=$insert->execute($arregloParametros);
            $idInsert=$this->conexion->lastInsertID();
            return $idInsert;
        }

        public function ActualizarExamen(string $id,string $nombreexamen, string $codigo,string $tipoexamen,string $precio,string $tipomuestra)
        {
           
            $this->Id=$id;
            $this->Nombreexamen=$nombreexamen;
            $this->Codigo=$codigo;
            $this->Tipoexamen=$tipoexamen;
            $this->Precio=$precio;
            $this->Tipomuestra=$tipomuestra;

            $sql="UPDATE examen SET nombre=?, codigo=?, tipoexamen=?, precio=?, tipomuestra=? WHERE id='$id'"; 
            $update=$this->conexion->prepare($sql);
            $ArregloParametros=array($this->Nombreexamen,$this->Codigo,$this->Tipoexamen,$this->Precio,$this->Tipomuestra);
            $update->execute($ArregloParametros);
            $resultadoUpdate = $update->rowCount();
            return $resultadoUpdate;
        }

        public function VerificarExistencia(string $id)
        {
            $sql="SELECT id FROM examen WHERE id=?";
            $arregloParametros=array($id);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Verexamen()
        {
            $sql="SELECT * FROM examen ";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Buscarexamen(string $buscar)
        {
            $sql="SELECT * FROM examen WHERE nombre LIKE '%$buscar%'";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Eliminar(string $id)
        {
            $this->Id = $id;
           
            $sql="DELETE FROM examen WHERE id=$id";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    
       
       
    
       
}


?>