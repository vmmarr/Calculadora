<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        require 'auxiliar.php';

        const OP = ['+', '-', '*', '/'];
        const PAR = ['op' => '+', 'num1' => '0', 'num2' => '0'];

        $error = [];

        // Comprobacion de parametros
        extract(comprebaParametros(PAR, $error));

        if (empty($error)) {
            // Comprobación de valores:
            compruebaValores($num1, $num2, $op, OP, $error);
        }

        // Dibuja el formulario
        formulario($num1, $num2, $op, OP);

        // Muestra resultado
        if (empty($error)) {
            mostrarResultado($num1, $num2, $op);
        } else {
            // Muestra errores
            muestraErrores($error);
        } ?>
    </body>
</html>
