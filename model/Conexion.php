<?php
class Conexion
{
        private $host="localhost";
        private $user="root";
        private $pass="w2530";  //1234
        private $db="sifarisdb";
        private $conn;


        public function __construct()
        {
            $cadenaConexion="mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
            try
            {
                $this->conn=new PDO($cadenaConexion,$this->user,$this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(Exception $e)
            {
                $this->conn="Error de conexión";
                echo "ERROR: ".$e->getMessage();
            }

        }

        public function getConexion(){
            return $this->conn;
        }

        
}
?>