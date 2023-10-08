<?php

setcookie("rol","2",time()-1);
setcookie("nom","2",time()-1);
header("Location:view/inicio/login.php"); 
?>