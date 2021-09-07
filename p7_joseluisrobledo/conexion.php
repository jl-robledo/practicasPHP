<?php

//Conexion con la base de datos que se llama Usuarios
$conexion = new mysqli ('localhost', 'root', '', 'Biblioteca' );

if ($conexion){
    
} else {
    echo "Lo siento, hubo un problema en la conexion con el Servidor.";
}


?>