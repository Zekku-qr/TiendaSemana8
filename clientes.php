<?php

// =====================================================
// clientes.php
// Módulo de gestión de clientes
// Sistema TiendaOnline
// Programación Web II - Semana 6
// =====================================================


// Importar conexión a la base de datos
require_once("includes/conexion.php");


// Consulta para obtener todos los clientes registrados

$sql = "SELECT * FROM cliente";

$resultado = $conexion->query($sql);


// Validar que la consulta se ejecute correctamente

if (!$resultado) {

    die("Error al consultar clientes: " . $conexion->error);

}


?>


<!DOCTYPE html>

<html lang="es">


<head>

    <!-- Configuración del documento -->

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        Clientes - TiendaOnline
    </title>


    <!-- Archivo CSS principal -->

    <link rel="stylesheet" href="assets/css/estilos.css">


</head>



<body>



<?php

// Cargar menú de navegación reutilizable

require_once("includes/navbar.php");

?>




<main>



<section class="contenedor">


<h1>
    Gestión de Clientes
</h1>



<!-- =====================================================
     FORMULARIO REGISTRO CLIENTE
     ===================================================== -->


<h2>
    Registrar Cliente
</h2>



<form action="acciones/guardar_cliente.php" 
        method="POST"
        onsubmit="return validarCliente()">


    <!-- Campo nombre -->

    <label for="nombre">
        Nombre:
    </label>


    <input 
        type="text"
        id="nombre"
        name="nombre"
        placeholder="Ingrese nombre completo"
        required
    >





    <!-- Campo correo -->

    <label for="correo">
        Correo:
    </label>


    <input 
        type="email"
        id="correo"
        name="correo"
        placeholder="Ingrese correo electrónico"
        required
    >





    <!-- Campo dirección -->

    <label for="direccion">
        Dirección:
    </label>


    <input 
        type="text"
        id="direccion"
        name="direccion"
        placeholder="Ingrese dirección"
        required
    >





    <!-- Botón de envío -->

    <button type="submit">

        Guardar Cliente

    </button>



</form>



</section>






<section class="contenedor">


<!-- =====================================================
     LISTADO DE CLIENTES
     ===================================================== -->


<h2>
    Clientes Registrados
</h2>



<table>


<thead>


<tr>

    <th>
        ID
    </th>


    <th>
        Nombre
    </th>


    <th>
        Correo
    </th>


    <th>
        Dirección
    </th>


</tr>


</thead>




<tbody>


<?php


// Validar si existen clientes registrados

if ($resultado->num_rows > 0) {



    // Recorrer los registros obtenidos

    while ($cliente = $resultado->fetch_assoc()) {


?>


<tr>


<td>

<?php

// Mostrar ID del cliente

echo $cliente["id_cliente"];

?>

</td>




<td>

<?php

// Mostrar nombre

echo $cliente["nombre"];

?>

</td>




<td>

<?php

// Mostrar correo

echo $cliente["correo"];

?>

</td>




<td>

<?php

// Mostrar dirección

echo $cliente["direccion"];

?>

</td>



</tr>



<?php


    }


} else {


?>


<tr>

<td colspan="4">

No existen clientes registrados.

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

// Cargar pie de página reutilizable

require_once("includes/footer.php");

?>


<script>

// Validación básica del formulario clientes

function validarCliente(){


    let nombre = document.getElementById("nombre").value;

    let correo = document.getElementById("correo").value;

    let direccion = document.getElementById("direccion").value;



    if(nombre.trim() == ""){


        alert("Ingrese el nombre del cliente");

        return false;

    }



    if(correo.trim() == ""){


        alert("Ingrese un correo válido");

        return false;

    }



    if(direccion.trim() == ""){


        alert("Ingrese la dirección del cliente");

        return false;

    }



    return true;


}


</script>

</body>


</html>




<?php


// Cerrar conexión con la base de datos

$conexion->close();


?>