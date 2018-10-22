<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
            require 'auxiliar.php';

            const OP = ["+", "-", "*", "/"];
            const PAR = ['op', 'num1', 'num2'];

            $num1 = $num2 = $op = null;
            $error = [];

            // Comprobacion de parametros:

            $par = array_keys($_GET);
            sort($par);

            if (empty($_GET)) {
                $num1 = 0;
                $num2 = 0;
                $op = '+';
            } elseif ($par == PAR) {
                $num1 = trim($_GET['num1']);
                $num2 = trim($_GET['num2']);
                $op = trim($_GET['op']);
            } else {
                $error[] = "Los parametros recibidos no son los correctos";
            }

            if (empty($error)) {
                // Comprobaciobn de valores:

                if (!is_numeric($num1)) {
                    $error[] = "El primer operando no es un numero";
                }

                if (!is_numeric($num1)) {
                    $error[] = "El segundo operando no es un numero";
                }

                if (!in_array($op, OP)) {
                    $error[] = "El operador no es valido";
                }
            }

            formulario($num1, $num2, $op, OP);

            if (empty($error)) {
                $resultado = '';
                switch ($op) {
                    case '+':
                        $resultado = $num1 + $num2;
                        break;

                    case '-':
                        $resultado = $num1 - $num2;
                        break;

                    case '*':
                        $resultado = $num1 * $num2;
                        break;

                    case '/':
                        $resultado = $num1 / $num2;
                        break;
                } ?>
                <h3>Resultado: <?= $resultado ?></h3>
            <?php } else {
                foreach ($error as $err) { ?>
                    <h3>Error: <?= $err ?></h3>
                <?php }
            }
        ?>

    </body>
</html>
