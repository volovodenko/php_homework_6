<?php
include_once ("./php/file_manager/stringSlice.php");
/**
 * @param $currDir
 * @param $name
 * Ф-ция отображает тип файла
 */
function showType($currDir, $name)
{
    if (is_dir($currDir . $name)) { //если это папка
        echo "";
    } else { //иначе файл
        $array = stringSlice($name); //получаем массив из [0] - имя файла [1] - тип файла
        echo $array[1]; //отображаем тип
    }
}
