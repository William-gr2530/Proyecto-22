<?php
require_once('conexion.php');

class UsuarioModel extends Conexion
{
               
        private $IdUsuario;
        private $NombreUsuario;
        private $TipoDocumento;
        private $NumDocumento;
        private $Contra;
        private $EstadoUsuario;
        private $Telefono;
        private $Direccion;
        private $Rol;
        //private $conexion;

        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->getConexion();
        }

        public function insertarUsuario(string $idUsuario,string $nombreUsuario, string $tipoDocumento,string $contra, string $estadoUsuario,int $telefono,string $direccion, string $rol)
        {
            $this->IdUsuario=$idUsuario;
            $this->NombreUsuario=$nombreUsuario;
            $this->TipoDocumento=$tipoDocumento;
            $this->Contra=$contra;
            $this->EstadoUsuario=$estadoUsuario;
            $this->Telefono=$telefono;
            $this->Direccion=$direccion;
            $this->Rol=$rol;
            
            $sql="INSERT INTO usuario(idUsuario,nombreUsuario,tipoDocumento,clave,estadoUsuario,telefonoUsuario,direccionUsuario,rol) VALUES(?,?,?,?,?,?,?,?);";
            $insert= $this->conexion->prepare($sql);
            $arregloParametros=array($this->IdUsuario,$this->NombreUsuario,$this->TipoDocumento,$this-> Contra,$this-> EstadoUsuario,$this-> Telefono,$this-> Direccion,$this-> Rol);
            $ResultadoInsert=$insert->execute($arregloParametros);
            $idInsert=$this->conexion->lastInsertID();
            return $idInsert;
        }

        public function validarUsuario(string $idUsuario, string $pass, string $estadoUsuario)
        {
            $sql="SELECT IdUsuario, nombreUsuario, clave, estadoUsuario, rol FROM usuario WHERE IdUsuario=?  AND clave=? AND estadoUsuario=?";
            $arregloParametros=array($idUsuario,$pass,$estadoUsuario);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
        public function Buscarexamen(string $buscar)
        {
            $sql="SELECT * FROM usuario WHERE nombreUsuario LIKE '%$buscar%'";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
        public function VerificarExistencia(string $IdUsuario)
        {
            $sql="SELECT idUsuario FROM usuario WHERE idUsuario=?";
            $arregloParametros=array($IdUsuario);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function VerListaUsuarios()
        {
            $sql="SELECT * FROM usuario;";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    
        public function RecuperarUsuario($id)
        {   
            $sql="SELECT * FROM usuario WHERE IdUsuario=?";
            $arregloParametros=array($id);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function actualizarUsuario(string $idUsuario,string $nombreUsuario, string $tipoDocumento,string $contrasena, string $estado,int $telefono,string $direccion, string $rol)
        {
            $this->IdUsuario=$idUsuario;
            $this->NombreUsuario=$nombreUsuario;
            $this->TipoDocumento=$tipoDocumento;
            $this->Contra=$contrasena;
            $this->EstadoUsuario=$estado;
            $this->Telefono=$telefono;
            $this->Direccion=$direccion;
            $this->Rol=$rol;

            $sql="UPDATE usuario SET IdUsuario=?, nombreUsuario=?, tipoDocumento=?, clave=?, estadoUsuario=?, telefonoUsuario=?, direccionUsuario=?, rol=? WHERE IdUsuario='$idUsuario'"; //las consultas preparadas evitan inyeccion sql
            $update=$this->conexion->prepare($sql);
            $ArregloParametros=array($this->IdUsuario,$this->NombreUsuario,$this->TipoDocumento,$this->Contra,$this->EstadoUsuario,$this->Telefono,$this->Direccion,$this->Rol);
            $update->execute($ArregloParametros);
            $resultadoUpdate = $update->rowCount();
            return $resultadoUpdate;
        }
    
        public function eliminarUsuario(string $id)
        {
            $this->Id = $id;
            
            $sql="DELETE FROM usuario WHERE IdUsuario=$id"; 
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
}


?>