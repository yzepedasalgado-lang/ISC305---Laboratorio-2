<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vaciar'])){
    unset($_SESSION['pedidos']);
    header('Location: contacto.php');
    exit;
}

$pedidos  = $_SESSION['pedidos'] ?? [];
$sucursales=[
    [
    'nombre' => 'sucursal Tegucigalpa',
    'direccion' => 'Boulevard Morazan, Tegucigalpa, Francisco Morazan',
    'telefono' => '+504 2280-2230',
    'horario' => 'Lunes a jueves de 8 am a 9 pm',
    'icono' => 'bi-building'
],  
[
    'nombre' => 'Sucursal San pedro sula',
    'direccion' => 'Barrio Guamilito, san pedro sula, cortez',
    'telefono' => '+504 2210-9210',
    'horario' => 'Lunes a jueves de 8 am a 9 pm',
    'icono' => 'bi-shop'
],
[
    'nombre' => 'Sucursal La ceiba',
    'direccion' => 'centro de la ceiba, Atlantida',
    'telefono' => '+504 2200-2960',
    'horario' => 'Lunes a jueves de 8 am a 9 pm',
    'icono' => 'bi-geo-alt'
]
];
function e($valor)
{
 return htmlspecialchars((string)$valor, ENT_QUOTES,'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzería Bella Nápoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color:#FCF3E4; color:#24485C;">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-3" style="background-color: #62C4C3;">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="index.php" style="color:#24485C;">
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
                        <a class="nav-link px-3 fw-bold" style="color:#24485C;" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="catalogo.php">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="armar.php">Arma tu Pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="facturacion.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="contacto.php">Contáctanos</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


 <div class="container my-5">
        <div class="text-center mb-5">
        <span class="badge rounded-pill px-3 py-2 text-uppercase fw-bold" style="background-color:#62C4C3; color:#24485C;">Estamos cerca de ti</span>
        <h1 class="h2 fw-bold mt-2">Nuestras Sucursales</h1>
        <p class="small">Visítanos o llámanos en cualquiera de nuestras sedes en Honduras</p>
        </div>

    <div class="row g-4 mb-5">
        <?php foreach ($sucursales as $sucursal): ?>
            <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi <?= e($sucursal['icono']) ?> fs-2 me-3" style="color:#62C4C3;"></i>
                     <h2 class="h5 fw-bold mb-0"><?= e($sucursal['nombre']) ?></h2>
                    </div>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i><?= e($sucursal['direccion']) ?></p>
                    <p class="mb-2"><i class="bi bi-telephone-fill me-2"></i><?= e($sucursal['telefono']) ?></p>
                    <p class="mb-0"><i class="bi bi-clock-fill me-2"></i><?= e($sucursal['horario']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="card shadow border-0 rounded-4 p-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <h2 class="h4 fw-bold mb-0"><i class="bi bi-clipboard-data me-2"></i>Panel de ordenes en Sesión</h2>
        <?php if (!empty($pedidos)): ?>
        <form method="POST" action="contacto.php" onsubmit="return confirm('¿Seguro que deseas vaciar todos los pedidos de la sesión?');">
            <button type="submit" name="vaciar" value="1" class="btn fw-bold rounded-pill px-4" style="background-color:#24485C; color:#F8E6CB;">
                <i class="bi bi-trash3"></i> Vaciar / Reiniciar Sesión
            </button>
        </form>
        <?php endif; ?>
    </div>

    <?php if (empty($pedidos)): ?>
        <div class="alert alert-warning d-flex align-items-center mb-0" role="alert">
            <span class="badge text-bg-warning me-3">Sin pedidos</span>
            <div>Aun no se han registrado órdenes durante esta sesión.</div>
        </div>
     <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead style="background-color:#24485C; color:#F8E6CB;">
                    <tr>
                        <th>Folio</th>
                        <th>Cliente</th>
                        <th>Telefono</th>
                        <th>Detalle de Pizzas</th>
                        <th class="text-end">Total en Lempiras</th>
                        <th>Estado</th>
                    </tr>
                 </thead>
        <tbody>
            <?php foreach ($pedidos as $orden): ?>
                <?php
                $detalle = $orden['detalle'] ?? '';
                if (is_array($detalle)) {
                     $detalle = implode(', ', $detalle);
                }
                $estado = $orden['estado'] ?? 'Recibido';
                    $total = (float)($orden['total'] ?? 0);
                        ?>
                    <tr>
                        <td class="fw-bold"><?= e($orden['folio'] ?? '') ?></td>
                        <td><?= e($orden['cliente'] ?? '') ?></td>
                        <td><?= e($orden['telefono'] ?? '') ?></td>
                        <td><?= e($detalle) ?></td>
                        <td class="text-end fw-bold">L. <?= number_format($total, 2) ?></td>
                        <td><span class="badge rounded-pill" style="background-color:#62C4C3; color:#24485C;"><?= e($estado) ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    

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
                        <li>Lunes a jueves 11:00 a.m.–9:30 p.m.</li>
                        <li>Viernes y sábado 11:00 a.m.–11:00 p.m.</li>
                        <li>Domingo 12:00 m.–9:00 p.m.</li>
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
