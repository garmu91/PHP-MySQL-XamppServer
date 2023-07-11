<?php
//archivo para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error

//se declara un array con todos los valores false
$errores = [false,false,false,false,false];

//si la variable está vacía, la posición correspondiente en el array cambia a true
if(empty($titulo)){
    $errores[0]=true;
}else{
    //línea de código para que al enviar el formulario devuelva el valor escrito en el input
    //urlencode para codificar el string tomando en cuenta los caracteres especiales
    $errores[0]=urlencode($titulo);
}
if(empty($fechaPubli)){
    $errores[1]=true;
}else{
    $errores[1]=$fechaPubli;
}
if(empty($texto)){
    $errores[2]=true;
} else{
    $errores[2]=urlencode($texto);
}
if(empty($foto)){
    $errores[3]=true;
}else{
    $errores[3]=urlencode($foto);
}
if(empty($nombre)){
    $errores[4]=true;
}else{
    $errores[4]=urlencode($nombre);
}
//pasa a la página "noticias-administracion.php" las variables con los valores del array a través de la URL
header('Refresh:0; url=noticias-administracion.php?titulo='.$errores[0].'&fechaPubli='.$errores[1].'&texto='.$errores[2].'&foto='.$errores[3].'&nombre='.$errores[4]);
?>