<?php
$tamanios = ['personal' => 'Personal (8")', 'mediana' => 'Mediana (12")', 'familiar' => 'Familiar (16")', 'gigante' => 'Gigante (20")'];

$imgRespaldo = 'data:image/svg+xml;utf8,' . rawurlencode(
    '<svg xmlns="http://www.w3.org/2000/svg" width="600" height="440"><rect width="100%" height="100%" fill="#F8D49B"/><text x="50%" y="50%" font-family="sans-serif" font-size="28" fill="#24485C" text-anchor="middle">Bella Nápoli</text></svg>'
);

$catalogo = [

    'pizzas_clasicas' => [
        'titulo' => 'Pizzas Clásicas',
        'icono'  => 'bi-pie-chart-fill',
        'descripcion' => 'Las recetas de siempre, horneadas en leña.',
        'tipo'   => 'pizza',
        'productos' => [
            ['nombre' => 'Margarita', 'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyyH-TA918tQjBOKHT8vdoIce7qDNcxa8onRRuXxpuA6XajjWspuURW12u&s=10',
             'ingredientes' => 'Pomodoro, mozzarella fresca y albahaca',
             'precios' => ['personal' => 85, 'mediana' => 150, 'familiar' => 210, 'gigante' => 310]],
            ['nombre' => 'Pepperoni', 'imagen' => 'https://s3.us-east-1.amazonaws.com/static.grupocomidas.hn/images/MD-PH/CATEGORIAS/PIZZAS/PANPIZ.png',
             'ingredientes' => 'Salsa pomodoro, mozzarella y pepperoni',
             'precios' => ['personal' => 100, 'mediana' => 170, 'familiar' => 235, 'gigante' => 340]],
            ['nombre' => 'Hawaiana', 'imagen' => 'https://nuestrasrecetas.es/wp-content/uploads/2015/05/hawaiana.jpg',
             'ingredientes' => 'Salsa pomodoro, mozzarella, jamón y piña',
             'precios' => ['personal' => 100, 'mediana' => 170, 'familiar' => 235, 'gigante' => 340]],
            ['nombre' => 'Cuatro Quesos', 'imagen' => 'https://imag.bonviveur.com/foto-portada-pizza-cuatro-quesos.jpg',
             'ingredientes' => 'Mozzarella, gorgonzola, parmesano y provolone',
             'precios' => ['personal' => 115, 'mediana' => 190, 'familiar' => 260, 'gigante' => 370]],
        ],
    ],

    'pizzas_gourmet' => [
        'titulo' => 'Pizzas Gourmet de la Casa',
        'icono'  => 'bi-stars',
        'descripcion' => 'Creaciones de nuestros maestros pizzeros.',
        'tipo'   => 'pizza',
        'productos' => [
            ['nombre' => 'Prosciutto di Parma', 'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3sEh2tb8jAdJgQKq7XfS2TI8uxlYZtX6JCKRPPwhKSw&s',
             'ingredientes' => 'Prosciutto, rúcula y parmesano',
             'precios' => ['personal' => 135, 'mediana' => 220, 'familiar' => 295, 'gigante' => 420]],
            ['nombre' => 'Trufada Napolitana', 'imagen' => 'https://petitfitbycris.com/wp-content/uploads/2021/09/PIZZA-NAPOLITANA-TRUFADA-CON-PROVOLONE-Y-JAMON-IBERICO_2.jpg',
             'ingredientes' => 'Crema de trufa, mozzarella, champiñones y parmesano',
             'precios' => ['personal' => 145, 'mediana' => 235, 'familiar' => 315, 'gigante' => 445]],
            ['nombre' => 'Frutti di Mare', 'imagen' => 'https://eat.de/wp-content/uploads/2023/09/pizza-frutti-di-mare-3140-1536x1024.jpg',
             'ingredientes' => 'Camarones, calamar, mejillones, ajo y perejil',
             'precios' => ['personal' => 150, 'mediana' => 245, 'familiar' => 325, 'gigante' => 460]],
            ['nombre' => 'Carnívora Suprema', 'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlsvbAhvsQD2N5hN8xgFHzsZRpprnSaIMUNDUoiFhbpzKoKM8ySHQA1-w&s=10',
             'ingredientes' => 'Pepperoni, tocineta, carne y jamón',
             'precios' => ['personal' => 140, 'mediana' => 230, 'familiar' => 305, 'gigante' => 435]],
        ],
    ],

    'calzones_horno' => [
        'titulo' => 'Calzones y Especialidades al Horno',
        'icono'  => 'bi-fire',
        'descripcion' => 'Masa rellena y focaccias recién salidas del horno de leña.',
        'tipo'   => 'unico',
        'productos' => [
            ['nombre' => 'Calzone de Carnes', 'imagen' => 'https://1.bp.blogspot.com/-ob6MouIHCGs/TtipHl4OA9I/AAAAAAAAAMA/iH_8oQLNkXo/s1600/Calzone-10.jpg',
             'ingredientes' => 'Mozzarella, jamón, pepperoni y carne molida', 'precio' => 165],
            ['nombre' => 'Calzone Vegetariano', 'imagen' => 'https://queapetito.com/wp-content/uploads/2019/03/calzonevegeportada.jpg',
             'ingredientes' => 'Ricotta, espinaca, champiñones y pimientos', 'precio' => 150],
            ['nombre' => 'Focaccia con Romero', 'imagen' => 'https://haceloconhuevos.com/wp-content/uploads/2022/02/FOCACCIA-CON-ROMERO.jpg',
             'ingredientes' => 'Aceite de oliva, romero fresco y sal de mar', 'precio' => 95],
        ],
    ],

    'bebidas_postres' => [
        'titulo' => 'Bebidas y Postres Italianos',
        'icono'  => 'bi-cup-straw',
        'descripcion' => 'El cierre perfecto para tu pizza.',
        'tipo'   => 'unico',
        'productos' => [
            ['nombre' => 'Tiramisú casero', 'imagen' => 'https://www.paulinacocina.net/wp-content/uploads/2020/01/receta-de-tiramisu-facil-y-economico-1740483918.jpg',
             'ingredientes' => 'Mascarpone, café espresso, bizcocho y cacao', 'precio' => 85],
            ['nombre' => 'Cannoli sicilianos', 'imagen' => 'https://eccellenzemeridionali.it/wp-content/uploads/2022/09/eccellenze-meridionali-cannoli-siciliani-la-ricetta-originale-di-uno-dei-dolci-piu-buoni-al-mondo.jpg',
             'ingredientes' => 'Crema de ricotta, chispas de chocolate y pistacho', 'precio' => 75],
            ['nombre' => 'Bebidas gaseosas', 'imagen' => 'https://www.japonya.cl/carta/liquidos/lata.jpg',
             'ingredientes' => 'Variedad de sabores, lata 355 ml', 'precio' => 30],
            ['nombre' => 'Refrescos naturales', 'imagen' => 'https://2.bp.blogspot.com/-7rWm_wIStBE/WdMxgtm1EDI/AAAAAAAAFXo/3SSM8BTmipIUA2hgesCUbW6ZWTPKYcytACLcBGAs/s1600/bebidasnicasrecetas.jpg',
             'ingredientes' => 'Limonada, horchata o fresco de frutas del día', 'precio' => 45],
        ],
    ],

];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú | Pizzería Bella Nápoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color:#FCF3E4; color:#24485C;">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-3" style="background-color: #62C4C3;">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="index.html" style="color:#24485C;">
                <i class="bi bi-fire me-2"></i>
                <span class="me-2">Pizzería Bella Nápoli</span>
                <span class="badge" style="background-color: #F8E6CB; color:#24485C;">Corazón Catracho</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacion" aria-controls="menuNavegacion" aria-expanded="false" aria-label="Abrir navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-bold" style="color:#24485C;" href="catalogo.php">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="armar.php">Arma tu Pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="contacto.php">Contáctanos</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <header class="py-5" style="background-color:#F8E6CB;">
        <div class="container text-center py-lg-3">
            <span class="badge rounded-pill px-3 py-2 text-uppercase fw-bold" style="background-color:#62C4C3; color:#24485C;">Catálogo de especialidades</span>
            <h1 class="display-5 fw-bold mt-3" style="color:#24485C;">Nuestro Menú</h1>
            <p class="lead mb-4">Masa artesanal fermentada 48 horas, horneada en leña. Elige tu favorita.</p>

            <div class="d-flex flex-wrap justify-content-center gap-2">
                <?php foreach ($catalogo as $clave => $categoria): ?>
                    <a class="btn rounded-pill px-4 fw-bold" style="background-color:#24485C; color:#F8E6CB;" href="#<?= $clave ?>">
                        <i class="bi <?= $categoria['icono'] ?>"></i> <?= htmlspecialchars($categoria['titulo']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </header>


    <?php $i = 0; ?>
    <?php foreach ($catalogo as $clave => $categoria): ?>
        <?php $fondo = ($i % 2 === 0) ? '#FCF3E4' : '#F8E6CB'; $i++; ?>

        <section id="<?= $clave ?>" class="py-5" style="background-color:<?= $fondo ?>;">
            <div class="container py-lg-4">

                <div class="text-center mb-5">
                    <span class="badge rounded-pill px-3 py-2 text-uppercase fw-bold" style="background-color:#62C4C3; color:#24485C;">
                        <i class="bi <?= $categoria['icono'] ?>"></i> Categoría
                    </span>
                    <h2 class="display-6 fw-bold mt-3" style="color:#24485C;"><?= htmlspecialchars($categoria['titulo']) ?></h2>
                    <p><?= htmlspecialchars($categoria['descripcion']) ?></p>
                </div>

                <div class="row g-4">
                    <?php foreach ($categoria['productos'] as $producto): ?>
                        <div class="col-12 col-md-6 col-lg-<?= $categoria['tipo'] === 'pizza' ? '6' : '4' ?> <?= ($categoria['tipo'] === 'unico' && count($categoria['productos']) === 4) ? 'col-xl-3' : '' ?>">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden" style="background-color:<?= $fondo === '#FCF3E4' ? '#F8E6CB' : '#FCF3E4' ?>; color:#24485C;">

                                <img class="card-img-top" style="height: 220px; object-fit: cover;"
                                     src="<?= htmlspecialchars($producto['imagen']) ?>"
                                     alt="<?= htmlspecialchars($producto['nombre']) ?>"
                                     onerror="this.onerror=null; this.src='<?= $imgRespaldo ?>';">

                                <div class="card-body d-flex flex-column p-4">
                                    <h4 class="card-title fw-bold mb-2" style="color:#24485C;"><?= htmlspecialchars($producto['nombre']) ?></h4>
                                    <p class="card-text small flex-grow-1" style="color:#24485C;">
                                        <?= htmlspecialchars($producto['ingredientes']) ?>
                                    </p>

                                    <?php if ($categoria['tipo'] === 'pizza'): ?>
                                        <div class="border-top pt-3 mt-3" style="border-color:#F8D49B !important;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-borderless text-center align-middle mb-0" style="color:#24485C; --bs-table-bg: transparent;">
                                                    <thead>
                                                        <tr class="small">
                                                            <?php foreach ($tamanios as $etiqueta): ?>
                                                                <th class="fw-bold"><?= $etiqueta ?></th>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php foreach ($tamanios as $codigo => $etiqueta): ?>
                                                                <td class="fw-bold">Lps. <?= number_format($producto['precios'][$codigo], 2) ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="border-top pt-3 mt-3 d-flex justify-content-between align-items-center" style="border-color:#F8D49B !important;">
                                            <span class="fw-bold">Precio</span>
                                            <span class="fs-5 fw-bold">Lps. <?= number_format($producto['precio'], 2) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

    <?php endforeach; ?>


    <footer class="py-5 mt-auto border-top" style="background-color:#24485C; color:#F8E6CB;">
        <div class="container">
            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-3">
                    <h5 style="color:#F8D49B;">Pizzería Bella Nápoli</h5>
                    <p>
                        Pioneros en pizza napolitana en Tegucigalpa. Comprometidos con el sabor auténtico, los ingredientes locales y la generación de empleo en nuestra comunidad.
                    </p>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <h6 style="color:#F8D49B;">Horario de cocina</h6>
                    <ul class="list-unstyled">
                        <li>Lunes a jueves 11:00 a.m.-9:30 p.m.</li>
                        <li>Viernes y sábado 11:00 a.m.-11:00 p.m.</li>
                        <li>Domingo 12:00 m.-9:00 p.m.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <h6 style="color:#F8D49B;">Redes Sociales</h6>
                    <a class="fs-4 me-3" style="color:#F8E6CB;" href="https://www.facebook.com/" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a class="fs-4 me-3" style="color:#F8E6CB;" href="https://www.instagram.com/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a class="fs-4" style="color:#F8E6CB;" href="https://x.com/" target="_blank" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <h6 style="color:#F8D49B;">Contexto Académico UNAH</h6>
                    <p>
                        <strong>ISC-305 Programación Web III PAC 2026</strong><br>
                        Laboratorio 2
                    </p>
                </div>

            </div>

            <div class="text-center mt-4">
                &copy; 2026 Pizzería Bella Nápoli. Todos los derechos reservados.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>