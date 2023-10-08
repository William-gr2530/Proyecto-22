<?php
require_once("../model/UsuariosModel.php");

class UsuarioController
{
    private $ObjUsuarioModel;

    public function __construct()
    {
        $this->ObjUsuarioModel=new UsuarioModel();
    }

    public function validar()
    {
        $Usuario = $_REQUEST['IdUsuario'];
        $Contra= $_REQUEST['password'];
        $EstadoUsuario = "Activo";
        //Validar Usuario
        $ValidarUsuario=$this->ObjUsuarioModel->validarUsuario($Usuario, $Contra, $EstadoUsuario);
        
        if ($ValidarUsuario!=null)
        {
            session_start();
            $_SESSION["IdUsuario"]=$ValidarUsuario["IdUsuario"];
            $_SESSION["nombreUsuario"]=$ValidarUsuario["nombreUsuario"];
            $_SESSION["Clave"]=$ValidarUsuario["clave"];
            $_SESSION["estadoUsuario"] = $ValidarUsuario["estadoUsuario"];
            $_SESSION["Rol"]=$ValidarUsuario["rol"];
            $value=$ValidarUsuario["rol"];
            //setcookie("rol",$value,time()+3600,"../../");
           
            if ($ValidarUsuario["rol"]=="Administrador")
            {
                header('Location: ../cookie.php?Tipo=Administrador&Nom='.$ValidarUsuario["nombreUsuario"].''); 

           }else if ($ValidarUsuario["rol"]=="Especialista") {
            //para un nemu aparte

            header('Location: ../cookie.php?Tipo=Especialista&Nom='.$ValidarUsuario["nombreUsuario"].'');
        }else if ($ValidarUsuario["rol"]=="Recepcionista")
        {
            
            header('Location: ../cookie.php?Tipo=Recepcionista&Nom='.$ValidarUsuario["nombreUsuario"].'');
        }else
        {
            header('Location: ../view/inicio/No.php');
        }
          
        }
        else
        {
            header('Location: ../view/inicio/NoValido.php');
        }
    }

    public function InsertarUsuario()
    {
        $IdUsuario =$_REQUEST['idUsuario'];
        $NombreUsuario=$_REQUEST['nombreUsuario'];
        $TipoDocumento=$_REQUEST['tipoDocumento'];
        $Contra=$_REQUEST['contrasena'];
        $EstadoUsuario=$_REQUEST['estado'];
        $Telefono=$_REQUEST['telefono'];
        $Direccion=$_REQUEST['direccion'];
        $Rol= $_REQUEST['rol'];
        
        $Verificacion=$this->ObjUsuarioModel->VerificarExistencia($IdUsuario);

        if ($Verificacion!=null)
        {
            header('Location: ../../view/usuarios/crearUsuario.php?mensaje=El usuario '.$IdUsuario.' ya existe escriba uno diferente para continuar el registro');
        }
        else
        {
            //INSERTAR UN USUARIO NUEVO
            $insert=$this->ObjUsuarioModel->insertarUsuario($IdUsuario, $NombreUsuario,$TipoDocumento,$Contra,$EstadoUsuario,$Telefono,$Direccion, $Rol);
            if ($insert!=null)
            {
                header('Location: ../view/usuarios/crearUsuario.php?mensaje=Usuario  '.$IdUsuario.' creado con exito!');

            }
            else
            {
                
                header('Location: ../view/usuarios/crearUsuario.php?mensaje=Hubo un error al crear el usuario intente de nuevo.');
            }
        }  
    }

    public function VerUsuarios()
    {
        $ListaUsuarios=$this->ObjUsuarioModel->VerListaUsuarios();
        require_once("../view/usuarios/mostrarUsuario.php?buscar=&Tipo=");
    }
    public function Buscarexamen(string $buscar)
    {
        $Lista=$this->ObjUsuarioModel->Buscarexamen();
        require_once("../../view/Examenes/mostrarUsuario.php");
    }
    public function Eliminar(string $id)
    {
        $estado = "inactivo";
        $resultado=$this->ObjUsuarioModel->eliminarUsuario($id);
        if ($resultado)
        {
            
        }
        else
        {
            header('Location: ../view/usuarios/mostrarUsuario.php?buscar=&Tipo=');
        }
    }

    public function RecuperarUsuario(string $id)
    {
        $DatosRecuperados=$this->ObjUsuarioModel->RecuperarUsuario($id);
        require_once("../view/usuarios/editarUsuario.php");
        
    }

    public function ActualizarUsuario()
    {
        $IdUsuario = $_REQUEST['idUsuario'];
        $NombreUsuario=$_REQUEST['nombreUsuario'];
        $TipoDocumento=$_REQUEST['tipoDocumento'];
        $Contra=$_REQUEST['contrasena'];
        $EstadoUsuario=$_REQUEST['estado'];
        $Telefono=$_REQUEST['telefono'];
        $Direccion=$_REQUEST['direccion'];
        $Rol= $_REQUEST['rol'];

        $Verificacion=$this->ObjUsuarioModel->VerificarExistencia($IdUsuario);
        
        
        if ($Verificacion!=null)
        {
            //Modificar Usuario existente por un nuevo nombre de usuario
            $Update=$this->ObjUsuarioModel->actualizarUsuario($IdUsuario,$NombreUsuario,$TipoDocumento,$Contra,$EstadoUsuario,$Telefono,$Direccion,$Rol);
            if ($Update==1)
            {
                
                header('Location: ../view/usuarios/mostrarUsuario.php?buscar=&Tipo=');
            }
            else
            {
                header('Location: ../view/usuarios/mostrarUsuario.php?buscar=&Tipo=');
            }
 
        }
        else
        {

        }
    }

}

$Tipo= $_REQUEST['Tipo'];
$ObjUsuarioController=new UsuarioController();
switch ($Tipo) 
{
    case "Ingresar":
        $ObjUsuarioController->validar();
        break;
    case "Insertar":
        $ObjUsuarioController->InsertarUsuario();
        break;
    case "VerUsuarios":
        $ObjUsuarioController->VerUsuarios();
        break;
    case "Eliminar":
        $ObjUsuarioController->Eliminar($_REQUEST['IdUsuario']);
        break;
    case "Cargar":
        $ObjUsuarioController->RecuperarUsuario($_REQUEST['Id']);
        break;
    case "Actualizar":
        $ObjUsuarioController->ActualizarUsuario();
        break;
    default:
        echo "Operación no válida";
} 
?>