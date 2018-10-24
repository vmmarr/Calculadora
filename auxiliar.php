<?php
function comprebaParametros($par, &$error) {
    if (!empty($_GET)) {
        if (empty(array_diff_key($_GET, $par)) &&
            empty(array_diff_key($par, $_GET))) {
            return array_map('trim', $_GET);
        } else {
            $error[] = "Los parámetros recibidos no son los correctos.";
        }
    }
    return $par;
}

function muestraErrores($error) {
    foreach ($error as $err) { ?>
        <h3>Error: <?= $err ?></h3>
    <?php }
}

function mostrarResultado($num1, $num2, $op) { ?>
    <h3>Resultado: <?= calcula($num1, $num2, $op) ?></h3>
<?php }

function compruebaValores($num1, $num2, $op, $ops, &$error) {
    if (!is_numeric($num1)) {
        $error[] = "El primer operando no es un número.";
    }
    if (!is_numeric($num2)) {
        $error[] = "El segundo operando no es un número.";
    }
    if (!in_array($op, $ops)) {
        $error[] = "El operador no es válido.";
    }
}

function selected($num1, $num2)
{
    return $num1 == $num2 ? "selected" : "";
}

function formulario($num1, $num2, $op, $ops)
{
?>
    <form action="" method="get">
        <label for="num1">Primer operando:</label>
        <input id="num1" type="text" name="num1" value="<?= $num1 ?>"><br/>
        <label for="num2">Segundo operando:</label>
        <input id="num2" type="text" name="num2" value="<?= $num2 ?>"><br/>
        <label for="op">Operación:</label>
        <select name="op">
            <?php foreach ($ops as $o): ?>
                <option value="<?= $o ?>" <?= selected($op, $o) ?> >
                    <?= $o ?>
                </option>
            <?php endforeach ?>
        </select><br/>
        <input type="submit" value="Calcular">
    </form>
<?php
}

function calcula($num1, $num2, $op)
{
    switch ($op) {
        case '+':
            $res = $num1 + $num2;
            break;
        case '-':
            $res = $num1 - $num2;
            break;
        case '*':
            $res = $num1 * $num2;
            break;
        case '/':
            $res = $num1 / $num2;
            break;
    }

    return $res;
}
