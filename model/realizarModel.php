<?php
require_once("conexion.php");

class realizarModel extends Conexion
{
        
        
        private $Idexamen;
        private $Idpaciente;
        private $Pago;
        private $Resultado;
    

        public function __construct()
        {
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConexion();
        }

        public function insertarPrueva(string $idexamen,string $idpaciente,string $idmedico,string $fecha,string $des,string $resultado)
        {
           
            $this->Idexamen=$idexamen;
            $this->Idpaciente=$idpaciente;
            $this->Idmedico=$idmedico;
            $this->Fecha=$fecha;
            $this->Des=$des;
            $this->Resultado=$resultado;
         

            $sql="INSERT INTO analisis(idexamen,idpaciente,idmedico,fecha,descuento,resultado) VALUES(?,?,?,?,?,?);";
            $insert=$this->conexion->prepare($sql);
            $arregloParametros=array($this->Idexamen,$this->Idpaciente,$this->Idmedico,$this->Fecha,$this->Des,$this->Resultado);
            $ResultadoInsert=$insert->execute($arregloParametros);
            $idInsert=$this->conexion->lastInsertID();
            return $idInsert;
        }

        public function ActualizarResultado(string $id, string $resultado)
        {
            $this->Id=$id;

            $this->Resultado=$resultado;

            $sql="UPDATE analisis SET resultado=? WHERE id='$id'"; 
            $update=$this->conexion->prepare($sql);
            $ArregloParametros=array($this->Resultado);
            $update->execute($ArregloParametros);
            $resultadoUpdate = $update->rowCount();
            return $resultadoUpdate;
        }

        public function VerificarExistencia(string $id)
        {
            $sql="SELECT id FROM analisis WHERE id=?";
            $arregloParametros=array($id);
            $query=$this->conexion->prepare($sql);
            $query->execute($arregloParametros);
            $resultado=$query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function VerPruevas()
        {
            $sql="SELECT A.id, E.nombre as examen, p.nombre as paciente,m.nombre as medico,A.fecha as Fecha,A.descuento as Descuento, A.resultado  FROM analisis A inner join examen e on A.idexamen = e.id inner join paciente p on A.idpaciente = p.id inner join medico m on A.idmedico = m.id";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Buscarexamen(string $buscar)
        {
            $sql="SELECT A.id, E.nombre as examen, p.nombre as paciente,m.nombre as medico,A.fecha as Fecha,A.descuento as Descuento, A.resultado  FROM analisis A inner join examen e on A.idexamen = e.id inner join paciente p on A.idpaciente = p.id inner join medico m on A.idmedico = m.id WHERE p.nombre LIKE '%$buscar%'";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function Eliminar(string $id)
        {
            $this->Id = $id;
           
            $sql="DELETE FROM analisis WHERE id=$id";
            $execute=$this->conexion->query($sql);
            $resultado=$execute->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    
       
       
    
       
}


?>