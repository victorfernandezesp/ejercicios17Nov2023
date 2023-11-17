<?php
function factorizaNumero($numero)
{
    $factores = array();
    $resultadosParciales = array();

    for ($i = 2; $i <= $numero; $i++) {
        while ($numero % $i == 0) {
            $factores[] = $i;
            $resultadosParciales[] = $numero /= $i;
        }
    }

    // Si queda un número mayor que 1, añadirlo como último factor
    if ($numero > 1) {
        $factores[] = $numero;
        $resultadosParciales[] = $numero;
    }

    return array('factores' => $factores, 'resultados_parciales' => $resultadosParciales);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factoriza Numero</title>
</head>

<body>
    <h2>Factoriza Numero</h2>

    <?php
if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];

    if (is_numeric($numero) && $numero > 0) {
        $factorizacion = factorizaNumero($numero);
        $factores = $factorizacion['factores'];
        $resultadosParciales = $factorizacion['resultados_parciales'];

        
        echo '<div>';
        echo '<p>Numero: ' . $numero . '</p>';
        echo '<p>Factorización:</p>';
        
        $resultadoTemporal = $numero;
        
        foreach ($factores as $factor) {
            echo '<p>' . $resultadoTemporal . ' | ' . $factor;
            $resultadoTemporal /= $factor;
            echo '</p>';
        }
        
        echo '</div>';
        
        
    } else {
        echo '<p>El valor pasado en la URL no es un número válido o es menor o igual a cero.</p>';
    }
} else {
    echo '<p>Falta el parámetro "numero" en la URL.</p>';
}
?>

</body>

</html>