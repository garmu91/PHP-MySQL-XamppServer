<?php
//archivo para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error

$errores = [false,false,false,false,false,false,false,false];

if(empty($nombre)){
    $errores[0]=true;
}else{
    $errores[0]=urlencode($nombre);
}
if(empty($apellidos)){
    $errores[1]=true;
}else{
    $errores[1]=urlencode($apellidos);
}
if(empty($email)){
    $errores[2]=true;
} else{
    $errores[2]=$email;
}
if(empty($telefono)){
    $errores[3]=true;
}else{
    $errores[3]=$telefono;
}
if(empty($fnac)){
    $errores[4]=true;
}else{
    $errores[4]=$fnac;
}
if(!empty($direccion)){
    //el campo dirección puede ser NULL en la BBDD
    $errores[5]=urlencode($direccion);
}
if(empty($usuario)){
    $errores[6]=true;
}else {
    $errores[6]=urlencode($usuario);
}
if(empty($pass)){
    $errores[7]=true;
}else{
    $errores[7]=false;
}
header('Refresh:0; url=usuarios-administracion.php?nombre='.$errores[0].'&apellidos='.$errores[1].'&email='.$errores[2].'&telefono='.$errores[3].'&fnac='.$errores[4].'&direccion='.$errores[5].'&usuario='.$errores[6].'&pass='.$errores[7]);
?>