<?php
$var=$_REQUEST['Tipo'];
setcookie("rol",$var,time()+3600);

if($var=="Especialista")
{
    
    header("Location: view/Realizar/mostraranalisis.php?buscar=&Tipo="); 
}else {
    header("Location: view/inicio/home.php"); 

}





?>