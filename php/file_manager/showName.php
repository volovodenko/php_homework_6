<?php
include_once ("./php/file_manager/stringSlice.php");
/**
 * @param $currDir
 * @param $name
 * Ф-ция отображает имя файла или папки с иконками
 */
function showName($currDir, $name)
{
    if (is_dir($currDir . $name)) { //если это директория
        echo "<button name='dirName' value='$name'>";
        echo ($name == "..")
            ? "<i class='fa fa-level-up fa-flip-horizontal'></i>" . "[" . $name . "]" //иконка вверх + название папки
            : "<i class='fa fa-folder-o'></i>" . "[" . $name . "]"; //иконка файл + название папки
        echo "</button>";
    } else { //иначе файл
        $array = stringSlice($name); //получаем массив из [0] - имя файла [1] - тип файла
        echo $array[0]; //отображаем имя файла
    }
}
