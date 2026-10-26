<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = array();
}

$errores = array();
$factura = null;

$precios_base = array(
    'Margarita' => array('personal' => 85.00, 'mediana' => 150.00, 'familiar' => 210.00, 'gigante' => 310.00),
    'Pepperoni' => array('personal' => 100.00, 'mediana' => 170.00, 'familiar' => 235.00, 'gigante' => 340.00),
    'Hawaiana' => array('personal' => 100.00, 'mediana' => 170.00, 'familiar' => 235.00, 'gigante' => 340.00),
    'Cuatro Quesos' => array('personal' => 115.00, 'mediana' => 190.00, 'familiar' => 260.00, 'gigante' => 370.00),
    'Prosciutto di Parma' => array('personal' => 135.00, 'mediana' => 220.00, 'familiar' => 295.00, 'gigante' => 420.00),
    'Trufada Napolitana' => array('personal' => 145.00, 'mediana' => 235.00, 'familiar' => 315.00, 'gigante' => 445.00),
    'Frutti di Mare' => array('personal' => 150.00, 'mediana' => 245.00, 'familiar' => 325.00, 'gigante' => 460.00),
    'Carnívora Suprema' => array('personal' => 140.00, 'mediana' => 230.00, 'familiar' => 305.00, 'gigante' => 435.00)
);


$nombres_tamanios = array(
    'personal' => 'Personal (8")',
    'mediana' => 'Mediana (12")',
    'familiar' => 'Familiar (16")',
    'gigante' => 'Gigante (20")'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_pedido'])) {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''), ENT_QUOTES, 'UTF-8');
    $rtn = htmlspecialchars(trim($_POST['rtn'] ?? ''), ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $direccion = htmlspecialchars(trim($_POST['direccion'] ?? ''), ENT_QUOTES, 'UTF-8');
    
    $pizza = htmlspecialchars($_POST['pizza'] ?? '', ENT_QUOTES, 'UTF-8');
    $tamano = htmlspecialchars($_POST['tamano'] ?? '', ENT_QUOTES, 'UTF-8');
    $cantidad = filter_var($_POST['cantidad'] ?? 0, FILTER_VALIDATE_INT);

    $modalidad = htmlspecialchars($_POST['modalidad'] ?? '', ENT_QUOTES, 'UTF-8');
    $metodo_pago = htmlspecialchars($_POST['metodo_pago'] ?? '', ENT_QUOTES, 'UTF-8');

    if (empty($nombre) || mb_strlen($nombre) < 5) $errores[] = "El Nombre y Apellido es obligatorio y debe tener al menos 5 caracteres.";
    if (!preg_match('/^[0-9]{14}$/', $rtn)) $errores[] = "El RTN debe contener exactamente 14 dígitos numéricos.";
    if (!preg_match('/^[0-9]{8}$/', $telefono)) $errores[] = "El teléfono debe ser un número válido de exactamente 8 dígitos.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Ingrese un correo electrónico válido.";
    if (empty($direccion)) $errores[] = "La Dirección de Entrega y Referencia es obligatoria.";
    if (!array_key_exists($pizza, $precios_base) || !isset($precios_base[$pizza][$tamano])) $errores[] = "Seleccione una pizza y un tamaño válidos de nuestro menú.";
    if ($cantidad === false || $cantidad <= 0) $errores[] = "La cantidad debe ser mayor a 0.";
    if (!in_array($modalidad, array('Restaurante', 'Pick-Up', 'Delivery')) || !in_array($metodo_pago, array('Efectivo', 'Tarjeta', 'Transferencia ACH'))) {
        $errores[] = "Seleccione una modalidad de entrega y un método de pago válidos.";
    }

    if (empty($errores)) {
        $precio_unitario = $precios_base[$pizza][$tamano];

        $subtotal_bruto = $precio_unitario * $cantidad;
        $descuento = ($cantidad >= 3) ? ($subtotal_bruto * 0.10) : 0.00;
        $subtotal_neto = $subtotal_bruto - $descuento;
        $isv = $subtotal_neto * 0.15; // 15% ISV Honduras
        $costo_envio = ($modalidad === 'Delivery') ? 45.00 : 0.00;
        $total_pagar = $subtotal_neto + $isv + $costo_envio;

        $folio = "ORD-NAP-" . rand(10000, 99999);
        $fecha_hora = date('d/m/Y h:i A');

        $orden = array(
            'folio' => $folio, 'fecha' => $fecha_hora, 'cliente' => $nombre, 'rtn' => $rtn,
            'telefono' => $telefono, 'email' => $email, 'direccion' => $direccion,
            'pizza' => $pizza, 'tamano' => $nombres_tamanios[$tamano] ?? $tamano, 'cantidad' => $cantidad,
            'modalidad' => $modalidad, 'metodo_pago' => $metodo_pago,
            'subtotal_bruto' => $subtotal_bruto, 'descuento' => $descuento,
            'subtotal_neto' => $subtotal_neto, 'isv' => $isv, 'costo_envio' => $costo_envio,
            'total_pagar' => $total_pagar
        );

        $_SESSION['pedidos'][] = $orden;
        $factura = $orden;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Pizzería Bella Nápoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-3" style="background-color: #62C4C3;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="index.php" style="color:#24485C;">
                <i class="bi bi-fire me-2"></i>
                <span class="me-2">Pizzería Bella Nápoli</span>
                <span class="badge" style="background-color: #F8E6CB; color:#24485C;">Corazón Catracho</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacion" aria-controls="menuNavegacion" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="catalogo.php">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="armar.php">Arma tu Pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-bold" style="color:#24485C;" href="facturacion.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="contacto.php">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5" id="seccion-pedidos">
        
        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <h5 class="alert-heading fw-bold">⚠️ Errores en la validación:</h5>
                <ul class="mb-0">
                    <?php foreach ($errores as $err): ?>
                        <li><?php echo $err; ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($factura): ?>
            <div class="card border-success shadow mb-5">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📄 Comprobante Fiscal Digital </h5>
                    <span class="badge bg-light text-dark fw-bold"><?php echo $factura['folio']; ?></span>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Emisor:</strong> Pizzería Bella Nápoli S. de R.L.</p>
                            <p class="mb-1"><strong>RTN:</strong> 08011990123456</p>
                            <p class="mb-0"><strong>Fecha:</strong> <?php echo $factura['fecha']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Cliente:</strong> <?php echo $factura['cliente']; ?></p>
                            <p class="mb-1"><strong>RTN Cliente:</strong> <?php echo $factura['rtn']; ?></p>
                            <p class="mb-0"><strong>Modalidad:</strong> <?php echo $factura['modalidad']; ?> (Pago: <?php echo $factura['metodo_pago']; ?>)</p>
                        </div>
                    </div>

                    <table class="table table-sm table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Descripción</th>
                                <th>Tamaño</th>
                                <th class="text-center">Cant.</th>
                                <th class="text-end">Subtotal Parcial</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Pizza <?php echo $factura['pizza']; ?></strong></td>
                                <td><?php echo $factura['tamano']; ?></td>
                                <td class="text-center"><?php echo $factura['cantidad']; ?></td>
                                <td class="text-end">Lps. <?php echo number_format($factura['subtotal_bruto'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <ul class="list-group list-group-flush">
                                <?php if ($factura['descuento'] > 0): ?>
                                    <li class="list-group-item d-flex justify-content-between text-success">
                                        Descuento por Volumen (10%): <span>- Lps. <?php echo number_format($factura['descuento'], 2); ?></span>
                                    </li>
                                <?php endif; ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    Subtotal Neto Gravable: <span>Lps. <?php echo number_format($factura['subtotal_neto'], 2); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    ISV (15%): <span>Lps. <?php echo number_format($factura['isv'], 2); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    Costo de Envío: <span>Lps. <?php echo number_format($factura['costo_envio'], 2); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold fs-5 bg-light">
                                    Total a Pagar: <span class="text-danger">Lps. <?php echo number_format($factura['total_pagar'], 2); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm mb-5">
            <div class="card-header text-white" style="background-color: #24485C;">
                <h5 class="mb-0">🛒 Módulo de Pedidos y Facturación Digital</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    
                    <h6 class="text-secondary border-bottom pb-2 mb-3">1. Datos del Cliente</h6>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre y Apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>" placeholder="Ej. Patricia Blandin" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">RTN del Cliente (14 dígitos) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="rtn" maxlength="14" value="<?php echo htmlspecialchars($_POST['rtn'] ?? ''); ?>" placeholder="Ej. 080152006123456" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teléfono de Contacto (8 dígitos) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="telefono" maxlength="8" value="<?php echo htmlspecialchars($_POST['telefono'] ?? ''); ?>" placeholder="Ej. 32136541" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" placeholder="patrii1@correo.com" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Dirección de Entrega y Referencia <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="direccion" rows="2" placeholder="Col. Villa Nueva, frente al Hotel, casa #1234" required><?php echo htmlspecialchars($_POST['direccion'] ?? ''); ?></textarea>
                        </div>
                    </div>

                    <h6 class="text-secondary border-bottom pb-2 mb-3">2. Selección de Productos del Menú</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label class="form-label">Especialidad de Pizza <span class="text-danger">*</span></label>
                            <select class="form-select" name="pizza" required>
                                <option value="" disabled selected>-- Seleccione una especialidad --</option>
                                <optgroup label="Pizzas Clásicas">
                                    <option value="Margarita">Margarita</option>
                                    <option value="Pepperoni">Pepperoni</option>
                                    <option value="Hawaiana">Hawaiana</option>
                                    <option value="Cuatro Quesos">Cuatro Quesos</option>
                                </optgroup>
                                <optgroup label="Pizzas Gourmet">
                                    <option value="Prosciutto di Parma">Prosciutto di Parma</option>
                                    <option value="Trufada Napolitana">Trufada Napolitana</option>
                                    <option value="Frutti di Mare">Frutti di Mare</option>
                                    <option value="Carnívora Suprema">Carnívora Suprema</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tamaño <span class="text-danger">*</span></label>
                            <select class="form-select" name="tamano" required>
                                <option value="" disabled selected>-- Seleccione Tamaño --</option>
                                <option value="personal">Personal (8")</option>
                                <option value="mediana">Mediana (12")</option>
                                <option value="familiar">Familiar (16")</option>
                                <option value="gigante">Gigante (20")</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="cantidad" min="1" value="1" required>
                        </div>
                    </div>

                    <h6 class="text-secondary border-bottom pb-2 mb-3">3. Envío y Método de Pago</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Modalidad de Entrega <span class="text-danger">*</span></label>
                            <select class="form-select" name="modalidad" required>
                                <option value="" disabled selected>-- Modalidad --</option>
                                <option value="Restaurante">Para Comer en Restaurante (Lps. 0.00)</option>
                                <option value="Pick-Up">Para Llevar / Pick-Up (Lps. 0.00)</option>
                                <option value="Delivery">Envío a Domicilio / Delivery (+Lps. 45.00)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Método de Pago <span class="text-danger">*</span></label>
                            <select class="form-select" name="metodo_pago" required>
                                <option value="" disabled selected>-- Pago --</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta de Crédito / Débito</option>
                                <option value="Transferencia ACH">Transferencia ACH</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid col-md-6 mx-auto">
                        <button type="submit" name="enviar_pedido" class="btn text-white fw-bold" style="background-color: #24485C;">Enviar Pedido y Facturar</button>
                    </div>
                </form>
            </div>
        </div>

      
        <div class="card shadow-sm mb-5">
            <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #24485C;">
                <h5 class="mb-0">📊 Backend PHP: Registro Gerencial en Sesión</h5>
                <span class="badge bg-light text-dark"><?php echo count($_SESSION['pedidos']); ?> Órdenes</span>
            </div>
            <div class="card-body">
                <?php if (empty($_SESSION['pedidos'])): ?>
                    <p class="text-muted text-center mb-0">No hay órdenes registradas en esta sesión de servidor.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>RTN</th>
                                    <th>Pizza / Cant.</th>
                                    <th>Modalidad</th>
                                    <th>Total (HNL)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['pedidos'] as $ord): ?>
                                    <tr>
                                        <td><strong><?php echo $ord['folio']; ?></strong></td>
                                        <td><small><?php echo $ord['fecha']; ?></small></td>
                                        <td><?php echo $ord['cliente']; ?></td>
                                        <td><code><?php echo $ord['rtn']; ?></code></td>
                                        <td><?php echo $ord['cantidad']; ?>x <?php echo $ord['pizza']; ?> (<?php echo $ord['tamano']; ?>)</td>
                                        <td><span class="badge bg-secondary"><?php echo $ord['modalidad']; ?></span></td>
                                        <td class="fw-bold text-danger">Lps. <?php echo number_format($ord['total_pagar'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>