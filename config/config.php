<?php

/*SE ME OCURRIO CARGAR EN UN SOLO ARCHIVO TODA LA CONFIGURACION*/
/*DATOS DE CONFIGURACION DEL PROYECTO*/
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'es_ES.UTF8');
/*FIN DATOS DE CONFIGURACION DEL PROYECTO*/


$ambiente = 'TEST';
$version = '1.0';



/*AMBIENTE DE TESTING*/
if ($ambiente == 'TEST'){
    $servidor ='localhost';
    $usuario ='root';
    $clave = '';
    $base ='tpfinal_potrero';
}
/*END AMBIENTE DE TESTING*/



/*AMBIENTE DE PRODUCCION*/
if ($ambiente == 'PROD'){
    $servidor ='localhost';
    $usuario ='root';
    $clave = '';
    $base ='tpfinal_potrero';
}
/*FIN AMBIENTE DE PRODUCCION*/


