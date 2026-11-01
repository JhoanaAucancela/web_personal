<?php
session_start();

// ===== Variables de la calculadora =====
$numero1   = "";
$numero2   = "";
$operacion = "";
$resultado = null;
$error     = "";

$operaciones = [
    "suma"           => "+",
    "resta"          => "−",
    "multiplicacion" => "×",
    "division"       => "÷",
    "potencia"       => "^",
    "modulo"         => "%",
];

// Historial guardado en la sesión
if (!isset($_SESSION["historial"])) {
    $_SESSION["historial"] = [];
}

// Redondeo de decimales
function formatear($n) {
    return rtrim(rtrim(number_format($n, 4, ".", ""), "0"), ".");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Botón para limpiar el historial
    if (isset($_POST["limpiar"])) {
        $_SESSION["historial"] = [];
    } else {
        $numero1   = $_POST["numero1"] ?? "";
        $numero2   = $_POST["numero2"] ?? "";
        $operacion = $_POST["operacion"] ?? "";

        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            $error = "Ingresa dos números válidos";
        } elseif (!array_key_exists($operacion, $operaciones)) {
            $error = "Operación no válida";
        } else {
            $a = (float) $numero1;
            $b = (float) $numero2;

            switch ($operacion) {
                case "suma":
                    $resultado = $a + $b;
                    break;
                case "resta":
                    $resultado = $a - $b;
                    break;
                case "multiplicacion":
                    $resultado = $a * $b;
                    break;
                case "division":
                    if ($b == 0) {
                        $error = "No se puede dividir para 0";
                    } else {
                        $resultado = $a / $b;
                    }
                    break;
                case "potencia":
                    $resultado = pow($a, $b);
                    break;
                case "modulo":
                    if ($b == 0) {
                        $error = "No se puede sacar módulo de 0";
                    } else {
                        $resultado = fmod($a, $b);
                    }
                    break;
            }

            // Guarda la operación en el historial (máximo 5)
            if ($resultado !== null) {
                $texto = formatear($a) . " " . $operaciones[$operacion] . " " . formatear($b)
                       . " = " . formatear($resultado);
                array_unshift($_SESSION["historial"], $texto);
                $_SESSION["historial"] = array_slice($_SESSION["historial"], 0, 5);
            }
        }
    }
}

$historial = $_SESSION["historial"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP - Jhoana Aucancela</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="volver">← Volver al menú</a>

    <main class="calc">
        <h1 class="calc-titulo">Calculadora <span>PHP</span></h1>

        <!-- Pantalla -->
        <div class="calc-pantalla">
            <div class="calc-operacion">
                <?php
                if ($operacion !== "" && $error === "") {
                    echo formatear((float)$numero1) . " " . $operaciones[$operacion] . " " . formatear((float)$numero2);
                } else {
                    echo "&nbsp;";
                }
                ?>
            </div>
            <div class="calc-resultado <?php echo $error !== "" ? "calc-error" : ""; ?>">
                <?php
                if ($error !== "") {
                    echo $error;
                } elseif ($resultado !== null) {
                    echo formatear($resultado);
                } else {
                    echo "0";
                }
                ?>
            </div>
        </div>

        <!-- Formulario -->
        <form method="post" class="calc-form">
            <div class="calc-entradas">
                <label>
                    Número 1
                    <input type="number" step="any" name="numero1" required
                           value="<?php echo htmlspecialchars($numero1); ?>" placeholder="0">
                </label>
                <label>
                    Número 2
                    <input type="number" step="any" name="numero2" required
                           value="<?php echo htmlspecialchars($numero2); ?>" placeholder="0">
                </label>
            </div>

            <div class="calc-teclado">
                <?php foreach ($operaciones as $clave => $simbolo): ?>
                    <button type="submit" name="operacion" value="<?php echo $clave; ?>"
                            class="calc-tecla <?php echo $operacion === $clave ? "activa" : ""; ?>"
                            title="<?php echo ucfirst($clave); ?>">
                        <?php echo $simbolo; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>

        <!-- Historial -->
        <section class="calc-historial">
            <div class="calc-historial-cabecera">
                <h2>Historial</h2>
                <?php if (count($historial) > 0): ?>
                    <form method="post">
                        <button type="submit" name="limpiar" class="calc-limpiar">Limpiar</button>
                    </form>
                <?php endif; ?>
            </div>

            <?php if (count($historial) === 0): ?>
                <p class="calc-vacio">Aún no hay operaciones.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($historial as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
