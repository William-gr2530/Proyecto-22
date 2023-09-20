<?php
require_once("conexion.php");

class medicoModel extends Conexion
{
        
        
        private $Espe;
        private $Nombre;
        private $Direccion;
        private $Contacto;
        
        
        private $Telefono;
        
        private $id;

        public function __construct()
        {
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConexion();
        }

        public function insertarMedico(string $nombre,string $telefono,string $contacto,string $direccio,string $espe)
        {
           
            $this->Nombre=$nombre;
            
            $this->Telefono=$telefono;
            $this->Contacto=$contacto;
            $this->Direccion=$direccio;
            $this->Espe=$espe;

            $sql="INSERT INTO medico(nombre,telefono,contacto,direccion,espe) VALUES(?,?,?,?,?);";
            $insert=$this->conexion->prepare($sql);
            $arregloParametros=array($this->Nombre,$this->Telefono,$this->Contacto,$this->Direccion,$this->Espe);
            $ResultadoInsert=$insert->execute($arregloParametros);
            $idInsert=$this->conexion->lastInsertID();
            return $idInsert;
        }

        public function ActualizarMedico(string $id,string $nombre,string $telefono,string $contacto,string $direccio,string $espe)
        {
           
            $this->Id=$id;
            $this->Nombre=$nombre;
            
            $this->Telefono=$telefono;
            $this->Contacto=$contacto;
            $this->Direccion=$direccio;
            $this->Espe=$espe;

            $sql="UPDATE medico SET nombre=?, telefono=?, contacto=?, direccion=?, espe=? WHERE id='$id'"; 
            $update=$this->conexion->prepare($sql);
            $ArregloParametros=array($this->Nombre,$this->Telefono,$this->Contacto,$this->Direccion,$this->Espe);
            $update->execute($ArregloParametros);
            $resultadoUpdate = $update->rowCount();
            return $resultadoUpdate;
        }

        public function VerificarExistencia(string $id)
        {
            $sql="SELECT id FROM medico WHERE id=?";
            $arregloParametros=array($id);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function VerMedico()
        {
            $sql="SELECT * FROM medico ";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function BuscarMedico(string $buscar)
        {
            $sql="SELECT * FROM medico WHERE nombre LIKE '%$buscar%'";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Eliminar(string $id)
        {
            $this->Id = $id;
           
            $sql="DELETE FROM medico WHERE id=$id";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    
       
       
    
       
}


?>