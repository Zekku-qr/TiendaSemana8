<?php

// =====================================================
// consultas.php
// Módulo de consultas del sistema TiendaOnline
//
// Permite visualizar información relacionada
// entre clientes, productos y compras.
//
// Programación Web II - Semana 6
// =====================================================


// Importar conexión a la base de datos

require_once("includes/conexion.php");




// =====================================================
// CONSULTA CLIENTES
// =====================================================


// Obtener todos los clientes registrados

$sqlClientes = "SELECT * FROM cliente";

$resultadoClientes = $conexion->query($sqlClientes);




// =====================================================
// CONSULTA PRODUCTOS
// =====================================================


// Obtener productos disponibles

$sqlProductos = "SELECT * FROM producto";

$resultadoProductos = $conexion->query($sqlProductos);





// =====================================================
// CONSULTA COMPRAS CON INNER JOIN
// =====================================================


// Se relacionan las tablas:
// compra
// cliente
// producto


$sqlCompras = "

SELECT

compra.id_compra,

cliente.nombre AS cliente,

producto.nombre AS producto,

compra.cantidad,

compra.total,

compra.fecha


FROM compra


INNER JOIN cliente

ON compra.id_cliente = cliente.id_cliente


INNER JOIN producto

ON compra.id_producto = producto.id_producto


";



$resultadoCompras = $conexion->query($sqlCompras);

// =====================================================
// CONSULTA AVANZADA
// Clientes con más de dos compras registradas
// =====================================================

$sqlClientesCompras = "

SELECT

cliente.nombre,

cliente.correo,

COUNT(compra.id_compra) AS cantidad_compras


FROM cliente


INNER JOIN compra

ON cliente.id_cliente = compra.id_cliente


GROUP BY cliente.id_cliente


HAVING COUNT(compra.id_compra) > 2

";


$resultadoClientesCompras = $conexion->query($sqlClientesCompras);

?>



<!DOCTYPE html>

<html lang="es">


<head>


<meta charset="UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Consultas - TiendaOnline
</title>



<link rel="stylesheet" href="assets/css/estilos.css">


</head>



<body>



<?php

// Cargar menú de navegación

require_once("includes/navbar.php");

?>





<main>



<h1>
Consultas del Sistema
</h1>





<!-- =====================================================
     CONSULTA CLIENTES
     ===================================================== -->


<section class="contenedor">


<h2>
Clientes Registrados
</h2>



<table>


<thead>


<tr>

<th>ID</th>

<th>Nombre</th>

<th>Correo</th>

<th>Dirección</th>


</tr>


</thead>



<tbody>



<?php


while($cliente = $resultadoClientes->fetch_assoc()){


?>


<tr>


<td>
<?php echo $cliente["id_cliente"]; ?>
</td>


<td>
<?php echo $cliente["nombre"]; ?>
</td>


<td>
<?php echo $cliente["correo"]; ?>
</td>


<td>
<?php echo $cliente["direccion"]; ?>
</td>


</tr>



<?php


}


?>



</tbody>


</table>


</section>








<!-- =====================================================
     CONSULTA PRODUCTOS
     ===================================================== -->


<section class="contenedor">


<h2>
Productos Disponibles
</h2>



<table>


<thead>


<tr>

<th>ID</th>

<th>Nombre</th>

<th>Precio</th>

<th>Stock</th>


</tr>


</thead>



<tbody>



<?php


while($producto = $resultadoProductos->fetch_assoc()){


?>


<tr>


<td>
<?php echo $producto["id_producto"]; ?>
</td>


<td>
<?php echo $producto["nombre"]; ?>
</td>


<td>
$
<?php echo $producto["precio"]; ?>
</td>


<td>
<?php echo $producto["stock"]; ?>
</td>


</tr>



<?php


}


?>



</tbody>


</table>


</section>








<!-- =====================================================
     CONSULTA COMPRAS
     ===================================================== -->


<section class="contenedor">


<h2>
Historial de Compras
</h2>



<table>


<thead>


<tr>


<th>
ID
</th>


<th>
Cliente
</th>


<th>
Producto
</th>


<th>
Cantidad
</th>


<th>
Total
</th>


<th>
Fecha
</th>


</tr>


</thead>



<tbody>



<?php


if($resultadoCompras->num_rows > 0){



while($compra = $resultadoCompras->fetch_assoc()){


?>


<tr>


<td>
<?php echo $compra["id_compra"]; ?>
</td>


<td>
<?php echo $compra["cliente"]; ?>
</td>


<td>
<?php echo $compra["producto"]; ?>
</td>


<td>
<?php echo $compra["cantidad"]; ?>
</td>


<td>
$
<?php echo $compra["total"]; ?>
</td>


<td>
<?php echo $compra["fecha"]; ?>
</td>


</tr>



<?php


}


}

else{


?>


<tr>

<td colspan="6">

No existen compras registradas.

</td>

</tr>



<?php


}


?>



</tbody>


</table>



</section>

<section class="contenedor">


<h2>
Clientes con más de dos compras
</h2>


<table>


<thead>

<tr>

<th>
Cliente
</th>

<th>
Correo
</th>

<th>
Cantidad de compras
</th>

</tr>

</thead>


<tbody>


<?php


if($resultadoClientesCompras->num_rows > 0){


while($cliente = $resultadoClientesCompras->fetch_assoc()){


?>


<tr>


<td>
<?php echo $cliente["nombre"]; ?>
</td>


<td>
<?php echo $cliente["correo"]; ?>
</td>


<td>
<?php echo $cliente["cantidad_compras"]; ?>
</td>


</tr>


<?php

}

}
else{


?>

<tr>

<td colspan="3">

No existen clientes con más de dos compras.

</td>

</tr>


<?php

}

?>


</tbody>


</table>


</section>


</main>





<?php

// Cargar pie de página

require_once("includes/footer.php");


?>




</body>


</html>



<?php

// Cerrar conexión

$conexion->close();

?>