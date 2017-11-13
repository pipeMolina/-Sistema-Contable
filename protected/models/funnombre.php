<?php
function nombrevalido($nombre){
	
	$permitidos="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú ";
	for($i=0; $i<strlen($nombre); $i++){
		if(strpos($permitidos,substr($nombre,$i,1))===false){
			//no es valido
			return false;
		}
	}
	//si estoy aqui es que todos los caracteres son validos
	return true;
}