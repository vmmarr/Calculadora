<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
            const OP = ["+", "-", "*", "/"];
            const PAR = ['op', 'num1', 'num2'];

            function selected($num1, $num2) {
                return $num1 == $num2 ? "selected" : "";
            }

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

            $resultado = '';

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
        ?>

        <form action="" method="get">
            <label for="num1">Primer operando</label>
            <input type="text" id="num1" name="num1" value="<?= $num1 ?>"><br>

            <label for="num2">Segundo operando</label>
            <input type="text" id="num2" name="num2" value="<?= $num2 ?>"><br>

            <label for="op">Operacion</label>
            <select name="op">
                <?php foreach (OP as $o) { ?>
                    <option value= "<?= $o ?>" <?= selected($o, $op ) ?> > <?= $o ?> </option>
                <?php } ?>
            </select><br>

            <input type="submit" value="Calcular">
        </form>


        <?php

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
            }
        ?>

        <h3>Resultado: <?= $resultado ?></h3>
    </body>
</html>
