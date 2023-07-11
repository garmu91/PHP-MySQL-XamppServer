<?php
//archivo para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error

$errores = [false,false,false,false,false,false,false];

if(empty($modnombre)){
    $errores[0]=true;
}
if(empty($modapellidos)){
    $errores[1]=true;
}
if(empty($modemail)){
    $errores[2]=true;
}
if(empty($modtelefono)){
    $errores[3]=true;
}
if(empty($modfnac)){
    $errores[4]=true;
}
if(empty($modusuario)){
    $errores[5]=true;
}
if(empty($modpass)){
    $errores[6]=true;
}else{
    $errores[6]=false;
}
header('Refresh:0; url=perfil.php?modnombre='.$errores[0].'&modapellidos='.$errores[1].'&modemail='.$errores[2].'&modtelefono='.$errores[3].'&modfnac='.$errores[4].'&modusuario='.$errores[7].'&modpass='.$errores[8]);
?>