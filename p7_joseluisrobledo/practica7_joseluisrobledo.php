<?php 

include "practica6_joseluisrobledo.php";

// funcion para ver los libros
function verLibro (array $arr) {
    for ($i=0; $i < count($arr); $i++) { 
        echo 'LIBRO: ' . ($i+1) . 
            '<br>ID: ' . $arr[$i]->get_id() .
            '<br>Titulo: ' . $arr[$i]->get_title() .
            '<br>Autor: ' . $arr[$i]->get_author() .
            '<br>Paginas: ' . $arr[$i]->get_pages() .
            '<br>Capitulos: ' . $arr[$i]->get_chapters() .
            '<br>Precio: ' . $arr[$i]->get_price() . " €<br><br>"
        ;
    }
}

// funcion para ver las revistas
function verRevista (array $arr) {
    for ($i=0; $i < count($arr); $i++) { 
        echo 'REVISTA: ' . ($i+1) .
            '<br>ID: ' . $arr[$i]->get_id() .
            '<br>Titulo: ' . $arr[$i]->get_title() .
            '<br>Paginas: ' . $arr[$i]->get_pages() .
            '<br>Extras: ' . $arr[$i]->get_additionalResources() .
            '<br>Precio: ' . $arr[$i]->get_price() . " €<br><br>"
        ;
    }
}



// metodo de ordenacion de libros por PRECIO ascendente o descendente.
function bubbleSortPrecio (array $arr_libro, bool $ascendente){
    //fijamos el tamaño del array
    $tamaño = count($arr_libro);

    //bucle para recorrer el array
    for ($ultimo = $tamaño - 1 ; $ultimo > 0 ; $ultimo = $ultimo - 1){
        for ($actual = 0; $actual < $ultimo ; $actual = $actual + 1){
            if ($ascendente){
                if ($arr_libro[$actual]->get_price() > $arr_libro[$actual+1]->get_price()){
                    $temporal = $arr_libro[$actual];
                    $arr_libro[$actual] = $arr_libro[$actual+1];
                    $arr_libro[$actual+1] = $temporal;

                }
            } else {
                if ($arr_libro[$actual]->get_price() < $arr_libro[$actual+1]->get_price()) {
                    $temporal = $arr_libro[$actual];
                    $arr_libro[$actual] = $arr_libro[$actual+1];
                    $arr_libro[$actual+1] = $temporal;
                }
            }
        }
    }

    return $arr_libro;
}



// metodo de ordenacion de libros por TITULO ascendente o descendente
function bubbleSortTitulo (array $arr_libro, bool $ascendente){
    //fijamos el tamaño del array
    $tamaño = count($arr_libro);

    //bucle para recorrer el array
    for ($ultimo = $tamaño - 1 ; $ultimo > 0 ; $ultimo = $ultimo - 1){
        for ($actual = 0; $actual < $ultimo ; $actual = $actual + 1){
            if ($ascendente){
                if ($arr_libro[$actual]->get_title() > $arr_libro[$actual+1]->get_title()){
                    $temporal = $arr_libro[$actual];
                    $arr_libro[$actual] = $arr_libro[$actual+1];
                    $arr_libro[$actual+1] = $temporal;

                }
            } else {
                if ($arr_libro[$actual]->get_title() < $arr_libro[$actual+1]->get_title()) {
                    $temporal = $arr_libro[$actual];
                    $arr_libro[$actual] = $arr_libro[$actual+1];
                    $arr_libro[$actual+1] = $temporal;
                }
            }
        }
    }

    return $arr_libro;
}


// funcion sequentialSearch LIBRO
function sequentialSearchLibro (array $arr, string $title){
    $encontrado=false;
    for ($i=0; $i<count($arr); $i++){
        if($arr[$i]->get_title() == $title){
            $encontrado = true;
        }
    }

    if ($encontrado == true){
        echo "El libro \"" . $title . "\" esta en la Biblioteca<br>";
    } else {
        echo "El libro \"" . $title . "\" NO se ha encontrado<br>";
    }
}

// funcion sequentialSearch LIBRO AUTOR
function sequentialSearchLibroAutor (array $arr, string $author){
    $encontrado=false;
    for ($i=0; $i<count($arr); $i++){
        if($arr[$i]->get_author() == $author){
            $encontrado = true;
        }
    }

    if ($encontrado == true){
        echo "El autor \"" . $author . "\" esta en la Biblioteca<br>";
    } else {
        echo "El autor \"" . $author . "\" NO se ha encontrado<br>";
    }
}


// funcion sequentialSearch REVISTA
function sequentialSearchRevista (array $arr, string $title){
    $encontrado=false;
    for ($i=0; $i<count($arr); $i++){
        if($arr[$i]->get_title() == $title){
            $encontrado = true;
        }
    }

    if ($encontrado == true){
        echo "La revista \"" . $title . "\" esta en la Biblioteca<br>";
    } else {
        echo "La revista \"" . $title . "\" NO se ha encontrado<br>";
    }
}




//   ---   PRUEBAS   ---    //

// creo un primer objeto de la clase libro
$lib1 = new Book(10001, "La Historia Interminable", 780, 23, $ed1, 34, "Michael Ende"); 
// creo un segundo objeto de la clase libro
$lib2 = new Book(10002, "Las bicicletas son para el verano", 650, 50, $ed1, 34, "Fernando Fernan Gomez");
// creo un tercer objeto  de la clase libro
$lib3 = new Book(10003, "Platero y yo", 350, 19, $ed1, 15, "Juan Ramon Jimenez");
// creo un cuarto objeto  de la clase libro
$lib4 = new Book(10004, "El Capitan Alatriste", 450, 14, $ed1, 15, "Arturo Perez Reverte");
// creo un quinto objeto  de la clase libro
$lib5 = new Book(10005, "Reina Roja", 550, 25, $ed1, 15, "Juan Gomez Jurado");

// creo el array de los libros
$array_libro = array($lib1, $lib2, $lib3, $lib4, $lib5);


// creo un primer objeto de la clase revista
$rev1 = new Magazine(20001, "QUO", 100, 3, $ed1, "cd"); 
// creo un segundo objeto de la clase revista
$rev2 = new Magazine(20002, "El Jueves", 120, 3, $ed1, "poster");
// creo un tercer objeto  de la clase revista
$rev3 = new Magazine(20003, "National Geographic", 150, 4, $ed1, "mapa");
// creo un cuarto objeto  de la clase revista
$rev4 = new Magazine(20004, "Squire", 190, 5, $ed1, "recetas");
// creo un quinto objeto  de la clase revista
$rev5 = new Magazine(20005, "Mongolia", 110, 3, $ed1, "--");

// creo el array de las revistas
$array_revista = array($rev1, $rev2, $rev3, $rev4, $rev5);

// muestro los elementos del array libro 
//verLibro($array_libro);
//verRevista($array_revista);

echo '<br> ---------- ---------- ----------  EJERCICIO 1  ---------- ---------- ---------- ';
echo '<br> ----------  ----------  ----------   ----------  ----------  ----------  ---------- ---------- ';
echo '<br> ---------- ----------  ORDEN POR PRECIO  ---------- ----------<br> ';
// Array de libros ordenados por PRECIO de manera ascendente
echo '<br>--- ASCENDENTE ---<br>';
// orden descendente 
$ascendente= true;
$array_ordenPrecioAsc_libro = (bubbleSortPrecio($array_libro, $ascendente));

echo '<br>';

// muestro los elementos del array libro ordenado por precio Ascendente
verLibro($array_ordenPrecioAsc_libro);


// Array de libros ordenados por PRECIO de manera descendente
echo '<br>--- DESCENDENTE ---<br>';
// orden descendente 
$ascendente= false;
$array_ordenPrecioDesc_libro = (bubbleSortPrecio($array_libro, $ascendente));

echo '<br>';

// muestro los elementos del array libro ordenando por precio Descendente
verLibro($array_ordenPrecioDesc_libro);


echo '<br> ---------- ---------- ----------  EJERCICIO 2  ---------- ---------- ---------- ';
echo '<br> ----------  ----------  ----------   ----------  ----------  ----------  ---------- ---------- ';
echo '<br> ---------- ----------  ORDEN ALFABETICO  ---------- ---------- <br>';

// Array de libros ordenados por TITULO de manera ascendente
echo '<br>--- ASCENDENTE --- <br>';
// orden descendente 
$ascendente= true;
$array_ordenTituloAsc_libro = (bubbleSortTitulo($array_libro, $ascendente));

echo '<br>';

// muestro los elementos del array libro ordenando por titulo Ascendente
verLibro($array_ordenTituloAsc_libro);

// Array de libros ordenados por TITULO de manera descendente
echo '<br>--- DESCENDENTE --- <br>';
// orden descendente 
$ascendente= false;
$array_ordenTituloDesc_libro = (bubbleSortTitulo($array_libro, $ascendente));

echo '<br>';

// muestro los elementos del array libro ordenando por titulo Descendente
verLibro($array_ordenTituloDesc_libro);

echo '<br> ---------- ---------- ----------  EJERCICIO 3  ---------- ---------- ---------- ';
echo '<br> ----------  ----------  ----------   ----------  ----------  ----------  ---------- ---------- ';
echo '<br> ---------- ----------  BUSQUEDA SEQUENTIAL SEARCH  ---------- ---------- <br>';

echo '<br> ----- BUSQUEDA DE LIBROS POR AUTOR ----- <br><br>';
sequentialSearchLibroAutor($array_libro, "Juan Gomez Jurado");
sequentialSearchLibroAutor($array_libro, "Michael Ende");
sequentialSearchLibroAutor($array_libro, "Federico Garcia Lorca");
echo '<br>';
echo '<br> ----- BUSQUEDA DE LIBROS POR TITULO ----- <br><br>';
sequentialSearchLibro($array_libro, "Platero y yo");
sequentialSearchLibro($array_libro, "El Capitan Alatriste");
sequentialSearchLibro($array_libro, "Romancero Gitano");
echo '<br>';
echo '<br> ----- BUSQUEDA DE REVISTAS POR TITULO ----- <br><br>';
sequentialSearchRevista($array_revista, "QUO");
sequentialSearchRevista($array_revista, "National Geographic");
sequentialSearchRevista($array_revista, "HOLA");





?>