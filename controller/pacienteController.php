<?php
require_once("../model/pacienteModel.php");
class pacienteController
{
    private $ObjpacienteModel;
    public function __construct()
    {

        $this->ObjpacienteModel = new pacienteModel();
    }
    public function insertarPaciente()
    {
       
        $Nombre=$_REQUEST['Nombrepaciente'];
        $Edad=$_REQUEST['edad'];
        $Telefono=$_REQUEST['telefono'];
        $Contacto=$_REQUEST['contacto'];
        $Direccio=$_REQUEST['direccio'];
        $Dui=$_REQUEST['dui'];
        $insert=$this->ObjpacienteModel->insertarPaciente($Nombre,$Edad,$Telefono,$Contacto,$Direccio,$Dui);
        if ($insert!=null)
        {
            header("Location: ../view/Paciente/nuevopaciente.php?mensaje=Examen  '.$Nombre.' creado con exito!");
        }
        else
        {
            header('Location: ../view/Paciente/nuevopaciente.php?mensaje=Hubo un error al registrar el examen intente de nuevo.');
        }
        
    }

    public function ActualizarPaciente()
    {
       
        $Id=$_REQUEST['id'];
        $Nombre=$_REQUEST['Nombrepaciente'];
        $Edad=$_REQUEST['edad'];
        $Telefono=$_REQUEST['telefono'];
        $Contacto=$_REQUEST['contacto'];
        $Direccio=$_REQUEST['direccio'];
        $Dui=$_REQUEST['dui'];
    
            $Verificacion=$this->ObjpacienteModel->VerificarExistencia($Id);
            
            
            if ($Verificacion!=null)
            {
                
                $Update=$this->ObjpacienteModel->ActualizarPaciente($Id,$Nombre,$Edad,$Telefono,$Contacto,$Direccio,$Dui);
                if ($Update==1)
                {
                    
                    header('Location: ../view/Paciente/mostrarpaciente.php?buscar=&Tipo=');
                }
                else
                {
                    header('Location: ../view/Paciente/mostrarpaciente.php?buscar=&Tipo=');
                }
                
            }
            else
            {
    
            }
        
    }










    public function VerPaciente()
    {
        $Lista=$this->ObjpacienteModel->VerPaciente();
        require_once("../../view/Paciente/mostrarpaciente.php?buscar=&Tipo=");
    }
    public function BuscarPaciente(string $buscar)
    {
        $Lista=$this->ObjpacienteModel->BuscarPaciente();
        require_once("../../view/Paciente/mostrarpaciente.php?buscar=&Tipo=");
    }
    public function Eliminar(string $id)
    {
        
        $resultado=$this->ObjpacienteModel->Eliminar($id);
        header("Location: ../view/Paciente/mostrarpaciente.php?buscar=&Tipo=");
    }

       

}

$Tipo= $_REQUEST['Tipo'];
$ObjpacienteController=new pacienteController();
switch ($_REQUEST['Tipo']) 
{
    case "Login":
        //$ObjMedicamentoController->validar();
        break;
    case "Insertar":
        $ObjpacienteController->insertarPaciente();
        break;
    case "Verexamen":
        $ObjpacienteController->VerPaciente();
        break;
    case "Eliminar":
        $ObjpacienteController->Eliminar($_REQUEST['id']);
        break;
    case "Cargar":
        
        break;
    case "Actualizar":
        $ObjpacienteController->ActualizarPaciente();
        break;
    default:
        echo "Operación no válida";
} 
?>