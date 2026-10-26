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
                        <a class="nav-link px-3 fw-bold" style="color:#24485C;" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" style="color:#24485C;" href="catalogo.php">Menú</a>
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <div class= "text-center mb-4">
                        <span class="badge rounded-pill px-3 py-2 text-uppercase fw-bold" style="background-color:#62C4C3; color:#24485C;">Módulo Interactivo</span>
                        <h1 class="h2 fw-bold mt-2" style="color:#24485C;">Arma tu Pizza a Medida</h1>
                        <p class="small text-muted" style="color:#24485C !important;">Selecciona cada elemento para construir tu creación.</p>
                    </div>

                    <form action="facturacion.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label fw-bold">1. Seleccione el tamaño de la pizza:</label>
                            <select name="tamano" class="form-select" required>
                                <option value="Personal">Personal (8") - L. 120.00 </option>
                                <option value="Mediana" selected> Mediana (12") - L. 220.00 </option>
                                <option value="Familiar"> Familiar (16") - L.320.00 </option>
                                <option value="Gigante"> Gigante (20") - L.420.00 </option>
                                </select>
                        </div>

                        <div class="mb-4">
                            <label class= "form-label fw-bold">2.Seleccione un tipo de masa: </label>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check">
                                   <input class="form-check-input" type="radio" name="masa" id="masa1" value="Tradicional italiana" checked>
                                   <label class="form-check-label" for="masa1">Tradicional italiana </label>
                                </div>
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="masa" id="masa2" value="Delgada y crujiente">
                                  <label class="form-check-label" for="masa2">Delgada y crujiente </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="masa" id="masa3" value="Orilla rellena de queso">
                                    <label class="form-check-label" for="masa3">Orilla rellena de queso (Con recargo adicional) </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class= "form-label fw-bold">2.Seleccione su salsa base: </label>
                            <select name="salsa" class="form-select">
                                <option value="Pomodoro clásica" selected>Pomodoro clásica</option>
                                <option value="Salsa blanca Alfredo">Salsa blanca Alfredo</option>
                                <option value="Salsa Pesto">Salsa Pesto </option>
                                <option value="Barbacoa dulce">Barbacoa dulce</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class= "form-label fw-bold">2.Seleccione queso : </label>
                            <select name="queso" class="form-select">
                                <option value="Mozzarella fresco" selected>Mozzarella fresco</option>
                                <option value="Queso parmesano">Queso parmesano </option>
                                <option value="Queso provolone">Queso provolone</option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="form-label fw-bold">5. Ingredientes Adicionales (L. 25.00 c/u):</label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Pepperoni" id="ing1">
                                        <label class="form-check-label" for="ing1">Pepperoni (L. 25.00)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Jamón de pavo" id="ing2">
                                        <label class="form-check-label" for="ing2">Jamón de pavo (L. 25.00)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Jamon de cerdo" id="ing3">
                                        <label class="form-check-label" for="ing3">Jamon de cerdo(L. 25.00)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Aceitunas" id="ing4">
                                        <label class="form-check-label" for="ing4">Aceitunas  (L. 25.00)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Hongos" id="ing5">
                                        <label class="form-check-label" for="ing5">Hongos (L. 25.00)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Albahaca fresca" id="ing6">
                                        <label class="form-check-label" for="ing6">Albahaca fresca (L. 25.00)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Tocino" id="ing7">
                                        <label class="form-check-label" for="ing7">Tocino  (L. 25.00)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="Extra queso" id="ing8">
                                        <label class="form-check-label" for="ing8"> Extra queso (L. 25.00)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">6. Cantidad de Pizzas:</label>
                            <input type="number" name="cantidad" class="form-control" value="1" min="1" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg fw-bold px-5 rounded-pill shadow" style="background-color:#24485C; color:#F8E6CB;">
                                <i class="bi bi-arrow-right-circle"></i> Enviar orden
                            </button>
                        </div>



                    </form>
                </div>
            </div>
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
