<?php 

//Comprobacion de que el formulario ha sido enviado con todas las variables que hayamos fijado en el index.view.php
if (isset($_POST['enviar'])){

    $editor = $_POST['editor'];
	$titulo = $_POST['titulo'];
	$paginas = $_POST['paginas'];
	$precio = $_POST['precio'];
    $autor = $_POST['autor'];
    $capitulos = $_POST['capitulos'];
    

    //Control de errores 
	$errores = "";
	$enviado=true;


    //control de errores editor
	if(!empty($editor)){
		//limpiamos o verificamos que es una cadena
		$editor = filter_var($editor, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor selecciona un editor.". '\n';
		$enviado = false;
	}

	//Control de errores titulo
	if(!empty($titulo)){
		//limpiamos o verificamos que es una cadena
		$titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un titulo.". '\n';
		$enviado = false;
	}


    //Control de errores paginas
	if(!empty($paginas) && (is_numeric($paginas))){
		$paginas = filter_var($paginas, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el numero de paginas.". '\n';
		$enviado = false;
    }

	
	//Control de errores precio
	if(!empty($precio) && (is_numeric($precio))){
		$precio = filter_var($precio, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el precio.". '\n';
		$enviado = false;
    }


    //Control de errores autor
	if(!empty($autor)){
		//limpiamos o verificamos que es una cadena
		$autor = filter_var($autor, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el nombre del autor.". '\n';
		$enviado = false;
	}
    
    //Control de errores capitulos
	if(!empty($capitulos) && (is_numeric($capitulos))){
		$capitulos = filter_var($capitulos, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el capitulos.". '\n';
		$enviado = false;
    }



	//Mensaje de errores
	if($enviado == false){
		//echo $errores;
		echo "<script>alert('$errores'); </script>";

	

	} else {

			include "conexion.php";

            $sql_rm = "SELECT * FROM readingmaterial ORDER BY Id";
			$sql_book = "SELECT * FROM book ORDER BY Id_Rm"; //Se traen los elementos de la base de datos
			$connect1 = $conexion->query($sql_rm); //La conexion se ejecuta
            $connect2 = $conexion->query($sql_book);

			$control_titulo = true; // variable para el control de errores del mail ya registrado

			//El metodo fetch_assoc trae la informacion del elemento de cada fila que queramos
			while ($fila = $connect1->fetch_assoc()){

				// comprobacion de si el email introducido ya se encuentra en la BBDD
				if ($fila['Titulo'] == $titulo) {

					$control_titulo=false; // control de errores
				}
			}

			if ($control_titulo == false){ // sacamos el mensaje si se ha encontrado el mail

				echo "<script>alert('Libro registrado. Intente con otro titulo.'); </script>";

			} else { // en caso de que no se encuentre, se continua con el registro

                /*
				//Con prepare statements los usuarios no podrán inyectar nada en nuestra base de datos, es más seguro
				//Ahora en vez de escribir directamente los valores ponemos 3 signos de interrogación
				$statement = $conexion->prepare("INSERT INTO Productos (Id, titulo, titulo, direccion$direccion, paginas, precio, Precio, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?, $imagen)");
				//La variable statement es igual a la conexión ejecutando el método prepare: Prepara una inserción de un nuevo Usuario en la tabla que va a tener 3 valores
				
				// Remplazamos los placeholder ? con los valores que queremos usar.
				$statement->bind_param('issssiib', $id, $titulo, $titulo, $direccion, $paginas, $precio, $precio, $imagen); //Método bind_param nos dice qué valores vamos a poner en los signos de interrgogación. 
				
				$id = NULL;

				// Ejecutamos la sentencia.
                $statement->execute();
                */
                

                $query1 = "INSERT INTO readingmaterial  (Id, Titulo, Paginas, Precio, Id_editor) 
						VALUES (null, '$titulo', '$paginas', '$precio', '$editor')";
                // consulta para hacer la inserccion en la base de datos de libro
				$query2 = "SELECT Id FROM readingmaterial WHERE Titulo = '$titulo' ORDER BY Id DESC";
				
				
				

                $resultado1 = $conexion->query($query1); //La conexion se ejecuta

                if($resultado1 == true){
					
					$resultado2 = $conexion->query($query2);

                    while ($fila = $resultado2->fetch_row()) {
                        $id_rm =  $fila[0];
                    }

                    $query3 = "INSERT INTO book (Id_book, Autor, Capitulos, Id_Rm) 
                         VALUES (null, '$autor', '$capitulos', '$id_rm' )";

					$resultado3 = $conexion->query($query3);

                	if ($resultado3 == true){
                     // Saludo de todo correcto
                        echo "<script>alert('Libro registrado:  $titulo '); </script>";
                	}
					
                                        
                } else {
                    // Aviso de fallo en el registro
					echo "<script>alert('Registro fallido. Vuelva a intentarlo.'); </script>";
                }
			}
		
	}
}

//Llamamos a la web en html
require 'libro_view.php';

 ?>