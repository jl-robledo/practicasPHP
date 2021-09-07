<?php

// -----  EDITOR  -----
if (isset($_POST['enviar'])){

	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
    $website = $_POST['website'];

	//Control de errores 
	$errores = "";
	$enviado=true;

	//Control de errores nombre
	if(!empty($nombre)){
		//limpiamos o verificamos que es una cadena
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un nombre de editor.". '\n';
		$enviado = false;
	}

	//control de errores direccion
	if(!empty($direccion)){
		//limpiamos o verificamos que es una cadena
		$direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa la direccion.". '\n';
		$enviado = false;
	}


	//Control de errores telefono
	if(!empty($telefono) && (is_numeric($telefono))){
		$telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un telefono." . '\n';
		$enviado = false;
    }
    
    //Control de errores website 
	if(!empty($website)){
		$website = filter_var($website, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa una website.". '\n';
		$enviado = false;
	}

	//Mensaje de errores
	if($enviado == false){
		//echo $errores;
		echo "<script>alert('$errores'); </script>";


	} else {
		
	
			include "conexion.php";

			$sql = "SELECT * FROM editor ORDER BY Id"; //Se traen los elementos de la base de datos
			$connect = $conexion->query($sql); //La conexion se ejecuta

			$control_nombre = true; // variable para el control de errores del nombre ya registrado
	
			//El metodo fetch_assoc trae la informacion del elemento de cada fila que queramos
			while ($fila = $connect->fetch_assoc()){

				// comprobacion de si el nombre introducido ya se encuentra en la BBDD
				if ($fila['Nombre'] == $nombre) {
					
					$control_nombre=false; // control de errores
				}
			}
	
			if ($control_nombre == false){ // sacamos el mensaje si se ha encontrado el nombre
					
				echo "<script>alert('Editor registrado.'); </script>";

			} else { // encaso de que no se encuentre, se continua con el registro
					/*
					//Con prepare statements los usuarios no podrán inyectar nada en nuestra base de datos, es más seguro
					//Ahora en vez de escribir directamente los valores ponemos 3 signos de interrogación
					$statement = $conexion->prepare("INSERT INTO editor (Id, Nombre, Direccion, Telefono, Website) VALUES (?, ?, ?, ?, ?)");
					//La variable statement es igual a la conexión ejecutando el método prepare: Prepara una inserción de un nuevo Usuario en la tabla que va a tener 3 valores
					
					// Remplazamos los placeholder ? con los valores que queremos usar.
					$statement->bind_param('issss', $id, $nombre, $direccion, $telefono, $website); //Método bind_param nos dice qué valores vamos a poner en los signos de interrgogación. 
					
					$id = NULL;

					// Ejecutamos la sentencia.
					$statement->execute();
					*/

				$sql = "INSERT INTO editor (Id, Nombre, Direccion, Telefono, Website) 
							VALUES (null, '$nombre', '$direccion', '$telefono', '$website')";
					
				$resultado = $conexion->query($sql); //La conexion se ejecuta

				//Si se ha insertado bien los datos en la BBDD, saludara y si no dara un aviso para que lo volvamos a intentar	
				if($resultado == true){
						
					// Saludo de todo correcto
					echo "<script>alert('Editor,  $nombre registrado.'); </script>";
					
										
				} else {

					// Aviso de fallo en el registro
					echo "<script>alert('Registro fallido. Vuelva a intentarlo.'); </script>";
				}
			}	
		
	}

}

require "editor_view.php";

?>