<?php
/*
====================================================
Instituto Profesional IACC
Asignatura : Programación Web II
Semana      : 6
Proyecto    : Tienda Online

Archivo     : index.php

Descripción:
Página principal de la tienda.
====================================================
*/
?>

<?php include("includes/navbar.php"); ?>

<!-- Banner Principal -->
<section class="bg-primary text-white text-center py-5">

    <div class="container">

        <h1 class="display-4 fw-bold">
            Bienvenido a Tienda Online
        </h1>

        <p class="lead">
            Encuentra los mejores productos tecnológicos al mejor precio.
        </p>

        <a href="productos.php" class="btn btn-light btn-lg">
            Ver Productos
        </a>

    </div>

</section>

<!-- Productos destacados -->

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Productos Destacados
    </h2>

    <div class="row">

        <!-- Producto 1 -->
        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <img src="assets/img/mouse.jpg"
                     class="card-img-top"
                     alt="Mouse Gamer">

                <div class="card-body">

                    <h5 class="card-title">
                        Mouse Gamer RGB
                    </h5>

                    <p class="card-text">
                        Mouse ergonómico con iluminación RGB y alta precisión.
                    </p>

                    <h4 class="text-primary">
                        $19.990
                    </h4>

                </div>

            </div>

        </div>

        <!-- Producto 2 -->

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <img src="assets/img/teclado.jpg"
                     class="card-img-top"
                     alt="Teclado">

                <div class="card-body">

                    <h5 class="card-title">
                        Teclado Mecánico
                    </h5>

                    <p class="card-text">
                        Switch Blue, iluminación LED y conexión USB.
                    </p>

                    <h4 class="text-primary">
                        $45.990
                    </h4>

                </div>

            </div>

        </div>

        <!-- Producto 3 -->

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <img src="assets/img/monitor.jpg"
                     class="card-img-top"
                     alt="Monitor">

                <div class="card-body">

                    <h5 class="card-title">
                        Monitor 24"
                    </h5>

                    <p class="card-text">
                        Monitor Full HD ideal para estudio y trabajo.
                    </p>

                    <h4 class="text-primary">
                        $139.990
                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Beneficios -->

<section class="container mt-5">

    <h2 class="text-center mb-4">

        ¿Por qué elegirnos?

    </h2>

    <div class="row text-center">

        <div class="col-md-4">

            <h3>🚚</h3>

            <h5>Envíos rápidos</h5>

            <p>
                Despachamos a todo Chile.
            </p>

        </div>

        <div class="col-md-4">

            <h3>🔒</h3>

            <h5>Compra segura</h5>

            <p>
                Protegemos la información de nuestros clientes.
            </p>

        </div>

        <div class="col-md-4">

            <h3>⭐</h3>

            <h5>Calidad garantizada</h5>

            <p>
                Productos tecnológicos de excelente calidad.
            </p>

        </div>

    </div>

</section>

<?php include("includes/footer.php"); ?>

</body>
</html>