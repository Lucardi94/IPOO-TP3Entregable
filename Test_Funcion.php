<?php
    include 'Funcion.php';
    include 'Cine.php';
    include 'Musical.php';
    $funcion1 = new Funcion("nodata",1,null, null);
    $funcion2 = new Cine("nodata",1,null,null,"nodata","nodata");
    $funcion3 = new Musical("nodata",1,null,null,"nodata",1);

    
    $funcion1->setNombre("El Funcional");
    $funcion2->setNombre("Matrix");
    $funcion3->setNombre("Cisne Negro");
    $funcion1->setPrecio(250);
    $funcion2->setPrecio(300);
    $funcion3->setPrecio(450);
    $funcion1->setInicio(new DateTime('2000-02-01 10:00'));
    $funcion2->setInicio(new DateTime('2000-02-01 11:01'));
    $funcion3->setInicio(new DateTime('2000-02-01 18:59'));
    $funcion1->setDuracion(array ("hora" => 1, "minuto" => 00));
    $funcion2->setDuracion(array ("hora" => 0, "minuto" => 30));
    $funcion3->setDuracion(array ("hora" => 1, "minuto" => 40));
    $funcion2->setGenero("Terror");
    $funcion2->setPaisOrigen("Honduras");
    $funcion3->setDirector("Struder");
    $funcion3->setCantidadPersonas(50);

    echo "\n".$funcion1->darCosto();
    echo "\n".$funcion2->darCosto();
    echo "\n".$funcion3->darCosto();

    $a = $funcion1->calcularFin();
    echo $a->format('H:i');
    
    echo "\n".$funcion1;
    echo "\n";
    echo "\n".$funcion2;
    echo "\n";
    echo "\n".$funcion3;

    if ($funcion1->funcionPosible($funcion2)){
        echo "Posible";
    } else echo "No posible";

    

