<?php
$var=$_REQUEST['Tipo'];
$nom=$_REQUEST['Nom'];
setcookie("rol",$var,time()+3600);
setcookie("nom",$nom,time()+3600);
if($var=="Especialista")
{
    
    header("Location: view/Realizar/mostraranalisis.php?buscar=&Tipo="); 
}else {
    header("Location: view/inicio/home.php"); 

}





?>