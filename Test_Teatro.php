<?php 
    include 'Teatro.php';
    include 'Funcion.php';
    include 'Cine.php';
    include 'Musical.php';

    /*$fecha= new DateTime('2000-01-01 18:59:00');
    $fecha->add(new DateInterval('PT1H1M'));
    $h = $fecha->format('H');
    echo $h;*/

    $funcion = array ();
    $funcion[0]= new Funcion("Funcion CambioNombre", 1, new DateTime('2000-02-01 18:59'), array ("hora" => 1, "minuto" => 58));
    $funcion[1]= new Funcion("Funcion Mediodia", 2000, new DateTime('2000-02-01 18:59'), array ("hora" => 1, "minuto" => 58));
    $funcion[2]= new Funcion("Funcion Tarde", 3000, new DateTime('2000-02-01 18:59'), array ("hora" => 1, "minuto" => 58));
    $funcion[3]= new Funcion("Funcion Ultima", 4000, new DateTime('2000-02-01 18:59'), array ("hora" => 1, "minuto" => 58));
    $funcion[4]= new Cine("Pelicula Primera",4000,new DateTime('2000-01-01 18:59'), array("hora" =>1, "minuto" => 0),"Terror","Transylvania");
    $funcion[5]= new Cine("Pelicula Mediodia",3000,new DateTime('2000-01-01 18:59'), array("hora" =>1, "minuto" => 0),"Humor","Usbekiztanj");
    $funcion[6]= new Cine("Pelicula Tarde",2000,new DateTime('2000-01-01 18:59'), array("hora" =>1, "minuto" => 0),"Romance","Trinidad y Togabo");
    $funcion[7]= new Cine("Pelicula Ultima",1000,new DateTime('2000-01-01 18:59'), array("hora" =>1, "minuto" => 0),"Accion","Greciaa");
    $funcion[8]= new Musical("Musical Primero",3000,new DateTime('2000-01-01 18:59'), array ("hora" => 1, "minuto" => 40),"Spilbergo",250);
    $funcion[9]= new Musical("Musical Mediodia",2000,new DateTime('2000-01-01 18:59'), array ("hora" => 1, "minuto" => 40),"Tarintini",200);
    $funcion[10]= new Musical("Musical Tarde",1000,new DateTime('2000-01-01 18:59'), array ("hora" => 1, "minuto" => 40),"Gibsun",150);
    $funcion[11]= new Musical("Musical Ultima",4000,new DateTime('2000-01-01 18:59'), array ("hora" => 1, "minuto" => 40),"Campañera",100);
    $t = new Teatro("nodata","nodata",array());
    
    $t->cambiarNombre("Villas");
    $t->cambiarDireccion("Av Argentina 1000");
    $t->setListaObjFuncion($funcion);
    $t->cambiarNombreFuncion("Funcion Primera", 0);
    $t->cambiarPrecioFuncion(1000, 0);

    /*if ($t->cargarFucion()){
        echo "Carga Exitosa";
    } else echo "No se pudo";*/

    echo "Bienvenido al sistema del teatro ".$t->getNombre();
    do {
        echo "Selecciones la opcion".
        "\n1. Cambiar nombre del teatro".
        "\n2. Cambiar direccion del teatro".
        "\n3. Cambiar nombre a una funcion".
        "\n4. Cambiar precio a una funcion".
        "\n5. Cargar nueva funcion".
        "\n6. Mostrar informacion de las funciones".
        "\n7. Mostrar informacion del teatro".
        "\n8. Costo mensual del mes...".
        "\ne. Para salir ";
        $respuesta = trim(fgets(STDIN));

        switch ($respuesta){
            case 1: 
                echo "Ingrese nuevo nombre ";
                $nNombre = trim(fgets(STDIN));
                $t->cambiarNombre($nNombre);
                break;
            case 2:
                echo "Ingrese nueva direccion ";
                $nDireccion = trim(fgets(STDIN));
                $t->cambiarDireccion($nDireccion);
                break;
            case 3:
                echo $t->mostrarFunciones()."\nIngrese el numero de funcion a cambiar ";
                $indice = trim(fgets(STDIN)) - 1;
                echo "Ingrese nuevo nombre ";
                $nNombre = trim(fgets(STDIN));
                $t->cambiarNombreFuncion($nNombre, $indice);
                break;
            case 4:
                echo $t->mostrarFunciones()."\nIngrese el numero de funcion a cambiar ";
                $indice = trim(fgets(STDIN)) - 1;
                echo "Ingrese nuevo precio ";
                $nPrecio = trim(fgets(STDIN));
                $t->cambiarNombreFuncion($nPrecio, $indice);
                break;
            case 5:
                if ($t->cargarFucion()){
                    echo "Carga Exitosa";
                } else echo "Horario no disponible";
                break;
            case 6: 
                echo $t->mostrarFunciones();
                break;
            case 7: 
                echo $t;
                break;
            case 8:
                echo "Ingrese el mes (en entero) de la consulta ";
                $mes = trim(fgets(STDIN));
                $costoMensual = $t->darCostoMensual($mes);
                echo "El costo mensual del mes ".$mes." fue de ".$costoMensual."$\n";
        }

    } while ($respuesta!="e");
    