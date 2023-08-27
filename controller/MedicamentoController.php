<?php
require_once("../model/examenModel.php");
class MedicamentoController
{
    private $ObjexamenModel;
    public function __construct()
    {

        $this->ObjexamenModel = new examenModel();
    }
    public function insertarExamen()
    {
       
        $Nombre=$_REQUEST['Nombreexamen'];
        $Codigo=$_REQUEST['Codigo'];
        $Tipoexamen=$_REQUEST['Tipoexamen'];
        $Precio=$_REQUEST['Precio'];
        $Tipomuestra=$_REQUEST['Tipomuestra'];
        
        $insert=$this->ObjexamenModel->insertarExamen($Nombre,$Codigo,$Tipoexamen,$Precio,$Tipomuestra);
        if ($insert!=null)
        {
            header("Location: ../view/Examenes/nuevoexamen.php?mensaje=Examen  '.$Nombreexamen.' creado con exito!");
        }
        else
        {
            header('Location: ../view/Examenes/nuevoexamen.php?mensaje=Hubo un error al registrar el examen intente de nuevo.');
        }
        
    }

    public function ActualizarExamen()
    {
       
        $Id=$_REQUEST['id'];
        $Nombre=$_REQUEST['Nombreexamen'];
        $Codigo=$_REQUEST['Codigo'];
        $Tipoexamen=$_REQUEST['Tipoexamen'];
        $Precio=$_REQUEST['Precio'];
        $Tipomuestra=$_REQUEST['Tipomuestra'];
    
            $Verificacion=$this->ObjexamenModel->VerificarExistencia($Id);
            
            
            if ($Verificacion!=null)
            {
               
                $Update=$this->ObjexamenModel->ActualizarExamen($Id,$Nombre,$Codigo,$Tipoexamen,$Precio,$Tipomuestra);
                if ($Update==1)
                {
                    
                    header('Location: ../view/Examenes/mostrarexamen.php?buscar=&Tipo=');
                }
                else
                {
                    header('Location: ../view/Examenes/mostrarexamen.php?buscar=&Tipo=');
                }
                
            }
            else
            {
    
            }
        
    }










    public function Verexamen()
    {
        $Lista=$this->ObjexamenModel->Verexamen();
        require_once("../../view/Examenes/mostrarexamen.php?buscar=&Tipo=");
    }
    public function Buscarexamen(string $buscar)
    {
        $Lista=$this->ObjexamenModel->Buscarexamen();
        require_once("../../view/Examenes/mostrarexamen.php?buscar=&Tipo=");
    }
    public function Eliminar(string $id)
    {
        
        $resultado=$this->ObjexamenModel->Eliminar($id);
        header("Location: ../view/Examenes/mostrarexamen.php?buscar=&Tipo=");
    }

       

}

$Tipo= $_REQUEST['Tipo'];
$ObjMedicamentoController=new MedicamentoController();
switch ($_REQUEST['Tipo']) 
{
    case "Login":
        //$ObjMedicamentoController->validar();
        break;
    case "Insertar":
        $ObjMedicamentoController->insertarExamen();
        break;
    case "Ver":
        $ObjMedicamentoController->Verexamen();
        break;
    case "Eliminar":
        $ObjMedicamentoController->Eliminar($_REQUEST['id']);
        break;
    case "Buscar":
        $ObjMedicamentoController->Buscarexamen();
        break;
    case "Actualizar":
        $ObjMedicamentoController->ActualizarExamen();
        break;
    default:
        echo "Operación no válida";
} 
?>