<?php
/*
====================================================
Instituto Profesional IACC
Asignatura : Programación Web II
Semana      : 6
Proyecto    : Tienda Online

Archivo     : productos.php

Descripción:
Permite registrar y visualizar productos.
====================================================
*/

include "includes/conexion.php";

if(isset($_GET["mensaje"])){

    if($_GET["mensaje"]=="ok"){

        echo '
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show">
                Producto registrado correctamente.
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>';

    }

    if($_GET["mensaje"]=="error"){

        echo '
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show">
                Error al registrar el producto.
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>';

    }

    if($_GET["mensaje"]=="datos"){

        echo '
        <div class="container mt-3">
            <div class="alert alert-warning alert-dismissible fade show">
                Debe completar correctamente todos los campos.
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>';

    }

}

// Obtener todos los productos
$sql = "SELECT * FROM producto ORDER BY id_producto DESC";
$resultado = $conexion->query($sql);
?>

<?php include "includes/navbar.php"; ?>

<div class="container mt-5">

    <div class="row">

        <!-- FORMULARIO -->
        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4>Registrar Producto</h4>

                </div>

                <div class="card-body">

                    <form action="acciones/guardar_producto.php"
                          method="POST"
                          onsubmit="return validarProducto();">

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="nombre"
                                id="nombre">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea
                                class="form-control"
                                name="descripcion"
                                id="descripcion"
                                rows="3"></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Precio
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                name="precio"
                                id="precio">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Stock
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                name="stock"
                                id="stock">

                        </div>

                        <button
                            class="btn btn-primary w-100">

                            Guardar Producto

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- TABLA -->

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4>Productos Registrados</h4>

                </div>

                <div class="card-body">

                    <table class="table table-hover table-bordered">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>

                                <th>Nombre</th>

                                <th>Descripción</th>

                                <th>Precio</th>

                                <th>Stock</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php
                        if($resultado->num_rows>0){

                            while($fila=$resultado->fetch_assoc()){
                        ?>

                            <tr>

                                <td><?= $fila["id_producto"] ?></td>

                                <td><?= $fila["nombre"] ?></td>

                                <td><?= $fila["descripcion"] ?></td>

                                <td>$<?= number_format($fila["precio"],0,",",".") ?></td>

                                <td><?= $fila["stock"] ?></td>

                            </tr>

                        <?php
                            }

                        }else{
                        ?>

                            <tr>

                                <td colspan="5" class="text-center">

                                    No existen productos registrados.

                                </td>

                            </tr>

                        <?php
                        }
                        ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
// validar que los campos del formulario no estén vacíos
function validarProducto(){

    let nombre=document.getElementById("nombre").value.trim();

    let descripcion=document.getElementById("descripcion").value.trim();

    let precio=document.getElementById("precio").value;

    let stock=document.getElementById("stock").value;

    if(nombre==""){

        alert("Ingrese el nombre del producto");

        return false;

    }

    if(descripcion==""){

        alert("Ingrese la descripción");

        return false;

    }

    if(precio=="" || precio<=0){

        alert("Ingrese un precio válido");

        return false;

    }

    if(stock=="" || stock<0){

        alert("Ingrese un stock válido");

        return false;

    }

    return true;

}

</script>

<?php include "includes/footer.php"; ?>