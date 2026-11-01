<?php
// ===== Datos del menú =====
$nombre  = "Jhoana Aucancela";
$tarea   = "Semana 1 - Web personal con HTML, CSS y PHP";
$anio    = date("Y");

$opciones = [
    [
        "titulo"      => "Mi CV",
        "descripcion" => "Información personal, estudios, experiencia y conocimientos técnicos.",
        "enlace"      => "cv.html",
        "icono"       => "👩‍💻",
        "etiqueta"    => "HTML + CSS",
    ],
    [
        "titulo"      => "Calculadora",
        "descripcion" => "Operaciones básicas procesadas en el servidor con PHP.",
        "enlace"      => "calculadora.php",
        "icono"       => "🧮",
        "etiqueta"    => "PHP",
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - <?php echo $nombre; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="menu">
        <header class="menu-encabezado">
            <h1><?php echo $nombre; ?></h1>
            <p><?php echo $tarea; ?></p>
        </header>

        <nav class="menu-opciones">
            <?php foreach ($opciones as $opcion): ?>
                <a href="<?php echo $opcion["enlace"]; ?>" class="menu-tarjeta">
                    <span class="menu-icono"><?php echo $opcion["icono"]; ?></span>
                    <h2><?php echo $opcion["titulo"]; ?></h2>
                    <p><?php echo $opcion["descripcion"]; ?></p>
                    <span class="menu-etiqueta"><?php echo $opcion["etiqueta"]; ?></span>
                    <span class="menu-ir">Entrar →</span>
                </a>
            <?php endforeach; ?>
        </nav>

    </main>
</body>
</html>
