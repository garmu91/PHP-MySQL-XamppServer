<?php
//archivo para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error
include ("../errores.php");

header('Refresh:0; url=registro.php?nombre='.$errores[0].'&apellidos='.$errores[1].'&email='.$errores[2].'&telefono='.$errores[3].'&fnac='.$errores[4].'&direccion='.$errores[5].'&sexo='.$errores[6].'&usuario='.$errores[7].'&pass='.$errores[8]);
?>