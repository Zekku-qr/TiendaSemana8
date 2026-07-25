<?php
/*
=========================================
Programación Web II
Semana 6
Proyecto: Tienda Online

Archivo:
conexion.php

Descripción:
Conecta PHP con MySQL mediante MySQLi.
=========================================
*/

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "TIENDA";

$conexion = new mysqli($host,$usuario,$password,$bd);

if($conexion->connect_error){

    die("Error de conexión: ".$conexion->connect_error);

}

$conexion->set_charset("utf8");