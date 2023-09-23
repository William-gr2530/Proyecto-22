<?php
require_once("../model/realizarModel.php");
class examenController
{
    private $ObjrealizarModel;
    public function __construct()
    {

        $this->ObjrealizarModel = new realizarModel();
    }
    public function insertarPrueva()
    {
       
        $Idexamen=$_REQUEST['idexamen'];
        $Idpaciente=$_REQUEST['idpaciente'];
        $Idmedico=$_REQUEST['idmedico'];
        $Fecha=$_REQUEST['fecha'];
        $Des=$_REQUEST['des'];
        $Resultado="En proceso";
       
        $insert=$this->ObjrealizarModel->insertarPrueva($Idexamen,$Idpaciente,$Idmedico,$Fecha,$Des,$Resultado);
        if ($insert!=null)
        {
           
            header("Location: ../view/Realizar/mostraranalisis.php?buscar=&Tipo=");
        }
        else
        {
            header("Location: ../view/Realizar/mostraranalisis.php?buscar=&Tipo=");
        }
        
    }

    public function ActualizarResultado()
    {
       
        $Id=$_REQUEST['id'];
        $Resultado=$_REQUEST['comentarios'];
    
            $Verificacion=$this->ObjrealizarModel->VerificarExistencia($Id);
            
            
            if ($Verificacion!=null)
            {
                
                $Update=$this->ObjrealizarModel->ActualizarResultado($Id,$Resultado);
                if ($Update==1)
                {
                    
                    header('Location: ../view/Realizar/mostraranalisis.php?buscar=&Tipo=');
                }
                else
                {
                    header('Location: ../view/Realizar/mostraranalisis.php?buscar=&Tipo=');
                }
                
            }
            else
            {
    
            }
        
    }



    public function Buscarexamen(string $buscar)
    {
        $Lista=$this->ObjrealizarModel->Buscarexamen();
        require_once("../../view/Realizar/mostraranalisis.php");
    }






    public function VerPruevas()
    {
        $Lista=$this->ObjrealizarModel->VerPruevas();
        require_once("../../view/Realizar/mostraranalisis.php?buscar=&Tipo=");
    }
    public function Eliminar(string $id)
    {
        
        $resultado=$this->ObjrealizarModel->Eliminar($id);
        
        header("Location: ../view/Realizar/mostraranalisis.php?buscar=&Tipo=");
    }

       

}

$Tipo= $_REQUEST['Tipo'];
$ObjexamenController=new examenController();
switch ($_REQUEST['Tipo']) 
{
    case "Login":
        //$ObjMedicamentoController->validar();
        break;
    case "Insertar":
        $ObjexamenController->insertarPrueva();
        break;
    case "Verexamen":
        //$ObjpacienteController->VerPaciente();
        break;
    case "Eliminar":
        $ObjexamenController->Eliminar($_REQUEST['id']);
        break;
    case "Buscar":
        $ObjexamenController->Buscarexamen();
        break;
        
    case "Actualizar":
        $ObjexamenController->ActualizarResultado();
        break;
    default:
        echo "Operación no válida";
} 
?>