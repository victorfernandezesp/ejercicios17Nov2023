<?php
function calcularLetraNIF($dni) {
    $paresValores = array(
        0 => 'T', 1 => 'R', 2 => 'W', 3 => 'A', 4 => 'G', 5 => 'M', 6 => 'Y',
        7 => 'F', 8 => 'P', 9 => 'D', 10 => 'X', 11 => 'B', 12 => 'N', 13 => 'J',
        14 => 'Z', 15 => 'S', 16 => 'Q', 17 => 'V', 18 => 'H', 19 => 'L',
        20 => 'C', 21 => 'K', 22 => 'E'
    );

    $resto = $dni % 23;
    $letra = $paresValores[$resto];
    return $letra;
}

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];

    if (is_numeric($dni)) {
        $letraNIF = calcularLetraNIF($dni);

        echo "El DNI es: $dni$letraNIF";
    } else {
        echo "El DNI no es válido.";
    }
} else {
    echo "No hay DNI";
}
?>
