<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
            $num1 = isset($_GET['num1']) ? trim($_GET['num1']) : '0';
            $num2 = isset($_GET['num2']) ? trim($_GET['num2']) : '0';
            $op = isset($_GET['op']) ? trim($_GET['op']) : '+';
            $resultado = '';
        ?>

        <form action="" method="get">
            <label for="num1">Primer operando</label>
            <input type="text" id="num1" name="num1" value="<?= $num1 ?>"><br>

            <label for="num2">Segundo operando</label>
            <input type="text" id="num2" name="num2" value="<?= $num2 ?>"><br>

            <label for="op">Operacion</label>
            <input type="text" id="op" name="op" value="<?= $op ?>"><br>

            <input type="submit" value="Calcular">
        </form>


        <?php

            switch ($op) {
                case '+':
                    $resultado = suma($num1, $num2);
                    break;

                case '-':
                    $resultado = resta($num1, $num2);
                    break;

                case '*':
                    $resultado = multiplicar($num1, $num2);
                    break;

                case '/':
                    $resultado = dividir($num1, $num2);
                    break;
            }

            function suma($a, $b) {
                return $a+$b;
            }

            function resta($a, $b) {
                return $a-$b;
            }

            function multiplicar($a, $b) {
                return $a*$b;
            }

            function dividir($a, $b) {
                return $a/$b;
            }
        ?>

        <h3>Resultado: <?= $resultado ?></h3>
    </body>
</html>
