<?php

// =====================================================
// guardar_compra.php
// Archivo encargado de registrar una compra
//
// Sistema TiendaOnline
// Programación Web II - Semana 6
// =====================================================



// Importar conexión a la base de datos
// Se utiliza ../ porque estamos dentro de acciones/

require_once("../includes/conexion.php");




// =====================================================
// RECEPCIÓN DE DATOS
// =====================================================


// Obtener datos enviados desde compras.php

$id_cliente = $_POST["id_cliente"];

$id_producto = $_POST["id_producto"];

$cantidad = $_POST["cantidad"];





// =====================================================
// OBTENER PRECIO DEL PRODUCTO
// =====================================================


// Consultar el precio del producto seleccionado

$sqlPrecio = "

SELECT precio

FROM producto

WHERE id_producto = '$id_producto'

";



$resultadoPrecio = $conexion->query($sqlPrecio);




// Obtener el precio encontrado

$producto = $resultadoPrecio->fetch_assoc();


$precio = $producto["precio"];






// =====================================================
// CALCULAR TOTAL DE LA COMPRA
// =====================================================


// El total se obtiene multiplicando:
// cantidad x precio


$total = $cantidad * $precio;





// Obtener fecha actual del sistema

$fecha = date("Y-m-d");






// =====================================================
// INSERTAR COMPRA
// =====================================================


// Registrar la compra en la tabla compra


$sql = "

INSERT INTO compra

(
cantidad,
total,
fecha,
id_producto,
id_cliente
)

VALUES

(
'$cantidad',
'$total',
'$fecha',
'$id_producto',
'$id_cliente'
)

";





$resultado = $conexion->query($sql);






// =====================================================
// VALIDACIÓN DEL REGISTRO
// =====================================================



if($resultado){


    echo "

    <script>

    alert('Compra registrada correctamente');

    window.location='../compras.php';

    </script>

    ";


}

else{


    echo "

    <script>

    alert('Error al registrar la compra');

    window.location='../compras.php';

    </script>

    ";


}





// Cerrar conexión

$conexion->close();



?>