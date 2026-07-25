<?php

// =====================================================
// guardar_cliente.php
// Archivo encargado de recibir los datos del formulario
// clientes.php y almacenarlos en la base de datos
//
// Sistema TiendaOnline
// Programación Web II - Semana 6
// =====================================================


// Importar conexión a la base de datos
// Se utiliza ../ porque este archivo está dentro
// de la carpeta acciones

require_once("../includes/conexion.php");



// =====================================================
// RECEPCIÓN DE DATOS
// =====================================================


// Capturar los valores enviados mediante método POST

$nombre = $_POST["nombre"];

$correo = $_POST["correo"];

$direccion = $_POST["direccion"];




// =====================================================
// INSERCIÓN EN BASE DE DATOS
// =====================================================


// Consulta SQL para insertar un nuevo cliente
// en la tabla cliente

$sql = "INSERT INTO cliente
        (nombre, correo, direccion)
        VALUES
        ('$nombre', '$correo', '$direccion')";



// Ejecutar consulta

$resultado = $conexion->query($sql);



// =====================================================
// VALIDACIÓN DEL RESULTADO
// =====================================================


// Si la inserción fue correcta,
// se muestra mensaje y se vuelve al módulo clientes

if ($resultado) {


    echo "

    <script>

        alert('Cliente registrado correctamente');

        window.location='../clientes.php';

    </script>

    ";



} else {


    echo "

    <script>

        alert('Error al registrar cliente');

        window.location='../clientes.php';

    </script>

    ";



}




// Cerrar conexión con la base de datos

$conexion->close();



?>