<?php

$errores = [false,false,false,false,false,false,false,false,false];

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
if(!empty($sexo)){
    $errores[6]=implode($sexo);
}
if(empty($usuario)){
    $errores[7]=true;
}else {
    $errores[7]=urlencode($usuario);
}
if(empty($pass)){
    $errores[8]=true;
}else{
    $errores[8]=false;
}

?>