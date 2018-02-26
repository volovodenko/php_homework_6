<?php
/**
 * @param $string - наименование переменной
 * @return string
 * выборка переменной $string из массива _POST
 */
function getPOST($name)
{
    return isset($_POST[$name])
        ? $_POST[$name]
        : "";
}