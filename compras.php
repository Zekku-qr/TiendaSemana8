<?php

// =====================================================
// compras.php
// Módulo encargado de registrar y visualizar compras
//
// Sistema TiendaOnline
// Programación Web II - Semana 6
// =====================================================


// Importar conexión

require_once("includes/conexion.php");



// =====================================================
// CONSULTAR CLIENTES
// =====================================================


// Obtener clientes para llenar el formulario

$sqlClientes = "SELECT * FROM cliente";

$resultadoClientes = $conexion->query($sqlClientes);




// =====================================================
// CONSULTAR PRODUCTOS
// =====================================================


// Obtener productos disponibles

$sqlProductos = "SELECT * FROM producto";

$resultadoProductos = $conexion->query($sqlProductos);





// =====================================================
// CONSULTAR COMPRAS REALIZADAS
// =====================================================


// Se utiliza INNER JOIN para relacionar
// compra, cliente y producto


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



?>



<!DOCTYPE html>

<html lang="es">


<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Compras - TiendaOnline
</title>


<link rel="stylesheet" href="assets/css/estilos.css">


</head>



<body>



<?php

// Cargar barra de navegación

require_once("includes/navbar.php");

?>





<main>



<section class="contenedor">


<h1>
Gestión de Pedidos
</h1>

<div class="alerta-info">
    <strong>Nueva funcionalidad:</strong> Este módulo corresponde a la gestión inicial de pedidos de la tienda online y será utilizado para administrar las compras realizadas por los clientes.
</div>

<form action="acciones/guardar_compra.php" method="POST">



<label>
Cliente:
</label>



<select name="id_cliente" required>


<option value="">
Seleccione cliente
</option>



<?php


while($cliente = $resultadoClientes->fetch_assoc()){


?>


<option value="<?php echo $cliente["id_cliente"]; ?>">


<?php echo $cliente["nombre"]; ?>


</option>



<?php

}

?>


</select>





<label>
Producto:
</label>



<select name="id_producto" required>


<option value="">
Seleccione producto
</option>



<?php


while($producto = $resultadoProductos->fetch_assoc()){


?>


<option value="<?php echo $producto["id_producto"]; ?>">


<?php echo $producto["nombre"]; ?>


</option>



<?php

}

?>


</select>






<label>
Cantidad:
</label>


<input

type="number"

name="cantidad"

min="1"

required

>






<button type="submit">

Registrar Compra

</button>



</form>



</section>







<section class="contenedor">


<h2>
Compras Registradas
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

$<?php echo $compra["total"]; ?>

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