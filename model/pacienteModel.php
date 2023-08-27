<?php
require_once("conexion.php");

class pacienteModel extends Conexion
{
        
        
        private $Dui;
        private $Nombre;
        private $Direccion;
        private $Contacto;
        private $Edad;
        
        private $Telefono;
        
        private $id;

        public function __construct()
        {
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConexion();
        }

        public function insertarPaciente(string $nombre,string $edad,string $telefono,string $contacto,string $direccio,string $dui)
        {
           
            $this->Nombre=$nombre;
            $this->Edad=$edad;
            $this->Telefono=$telefono;
            $this->Contacto=$contacto;
            $this->Direccion=$direccio;
            $this->Dui=$dui;

            $sql="INSERT INTO paciente(nombre,edad,telefono,contacto,direccion,dui) VALUES(?,?,?,?,?,?);";
            $insert=$this->conexion->prepare($sql);
            $arregloParametros=array($this->Nombre,$this->Edad,$this->Telefono,$this->Contacto,$this->Direccion,$this->Dui);
            $ResultadoInsert=$insert->execute($arregloParametros);
            $idInsert=$this->conexion->lastInsertID();
            return $idInsert;
        }

        public function ActualizarPaciente(string $id,string $nombre,string $edad,string $telefono,string $contacto,string $direccio,string $dui)
        {
           
            $this->Id=$id;
            $this->Nombre=$nombre;
            $this->Edad=$edad;
            $this->Telefono=$telefono;
            $this->Contacto=$contacto;
            $this->Direccion=$direccio;
            $this->Dui=$dui;

            $sql="UPDATE paciente SET nombre=?, edad=?, telefono=?, contacto=?, direccion=?, dui=? WHERE id='$id'"; 
            $update=$this->conexion->prepare($sql);
            $ArregloParametros=array($this->Nombre,$this->Edad,$this->Telefono,$this->Contacto,$this->Direccion,$this->Dui);
            $update->execute($ArregloParametros);
            $resultadoUpdate = $update->rowCount();
            return $resultadoUpdate;
        }

        public function VerificarExistencia(string $id)
        {
            $sql="SELECT id FROM paciente WHERE id=?";
            $arregloParametros=array($id);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function VerPaciente()
        {
            $sql="SELECT * FROM paciente ";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function BuscarPaciente(string $buscar)
        {
            $sql="SELECT * FROM paciente WHERE nombre LIKE '%$buscar%'";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Eliminar(string $id)
        {
            $this->Id = $id;
           
            $sql="DELETE FROM paciente WHERE id=$id";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    
       
       
    
       
}


?>