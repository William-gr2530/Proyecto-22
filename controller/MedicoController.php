<?php
require_once("../model/medicoModel.php");
class medicoController
{
    private $ObjmedicoModel;
    public function __construct()
    {

        $this->ObjmedicoModel = new medicoModel();
    }
    public function insertarMedico()
    {
       
        $Nombre=$_REQUEST['Nombremedico'];
        
        $Telefono=$_REQUEST['telefono'];
        $Contacto=$_REQUEST['contacto'];
        $Direccio=$_REQUEST['direccio'];
        $Espe=$_REQUEST['espe'];
        $insert=$this->ObjmedicoModel->insertarMedico($Nombre,$Telefono,$Contacto,$Direccio,$Espe);
        if ($insert!=null)
        {
            header("Location: ../view/Medico/nuevomedico.php?mensaje=Examen  '.$Nombre.' creado con exito!");
        }
        else
        {
            header('Location: ../view/Medico/nuevomedico.php?mensaje=Hubo un error al registrar el medico intente de nuevo.');
        }
        
    }

    public function ActualizarMedico()
    {
       
        $Id=$_REQUEST['id'];
        $Nombre=$_REQUEST['Nombremedico'];
        
        $Telefono=$_REQUEST['telefono'];
        $Contacto=$_REQUEST['contacto'];
        $Direccio=$_REQUEST['direccio'];
        $Espe=$_REQUEST['espe'];
    
            $Verificacion=$this->ObjmedicoModel->VerificarExistencia($Id);
            
            
            if ($Verificacion!=null)
            {
                
                $Update=$this->ObjmedicoModel->ActualizarMedico($Id,$Nombre,$Telefono,$Contacto,$Direccio,$Espe);
                if ($Update==1)
                {
                    
                    header('Location: ../view/Medico/mostrarmedico.php?buscar=&Tipo=');
                }
                else
                {
                    header('Location: ../view/Paciente/mostrarmedico.php?buscar=&Tipo=');
                }
                
            }
            else
            {
    
            }
        
    }










    public function VerMedico()
    {
        $Lista=$this->ObjmedicoModel->VerMedico();
        require_once("../../view/Medico/mostrarmedico.php?buscar=&Tipo=");
    }
    public function BuscarMedico(string $buscar)
    {
        $Lista=$this->ObjmedicoModel->BuscarMedico();
        require_once("../../view/medico/mostrarmedico.php?buscar=&Tipo=");
    }
    public function Eliminar(string $id)
    {
        
        $resultado=$this->ObjmedicoModel->Eliminar($id);
        header("Location: ../view/Medico/mostrarmedico.php?buscar=&Tipo=");
    }

       

}

$Tipo= $_REQUEST['Tipo'];
$ObjMedicoController=new MedicoController();
switch ($_REQUEST['Tipo']) 
{
    case "Login":
        //$ObjMedicamentoController->validar();
        break;
    case "Insertar":
        $ObjMedicoController->insertarMedico();
        break;
    case "Verexamen":
        $ObjMedicoController->VerMedico();
        break;
    case "Eliminar":
        $ObjMedicoController->Eliminar($_REQUEST['id']);
        break;
    case "Cargar":
        
        break;
    case "Actualizar":
        $ObjMedicoController->ActualizarMedico();
        break;
    default:
        echo "Operación no válida";
} 
?>