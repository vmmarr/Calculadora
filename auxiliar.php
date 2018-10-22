<?php function selected($num1, $num2) {
    return $num1 == $num2 ? "selected" : "";
}

function formulario($num1, $num2, $op, $ops){ ?>
    <form action="" method="get">
        <label for="num1">Primer operando</label>
        <input type="text" id="num1" name="num1" value="<?= $num1 ?>"><br>

        <label for="num2">Segundo operando</label>
        <input type="text" id="num2" name="num2" value="<?= $num2 ?>"><br>

        <label for="op">Operacion</label>
        <select name="op">
            <?php foreach ($ops as $o) { ?>
                <option value= "<?= $o ?>" <?= selected($op, $o ) ?> > <?= $o ?> </option>
            <?php } ?>
        </select><br>

        <input type="submit" value="Calcular">
    </form>
<?php } ?>
