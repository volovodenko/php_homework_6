<?php
/**
 * @param $currDir
 * @param $name
 * Ф-ция отображает наименование класса (папка или файл)
 */

function showClass($currDir, $name)
{
    echo (is_dir($currDir . $name)) ? "dir" : "file";
}