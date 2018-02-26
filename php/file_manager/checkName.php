<?php
/**
 * @param $name
 * @param $currDir
 * @return bool
 * Ф-ция проверяет имя файла на
 * - недопустимые символы
 * - максимальную длину
 * - наличие файла с таким же именем
 */
function checkName($name, $currDir)
{
    //массив недопустимых символов в имени папки/файла
    $array = ["\\", "<", ">", "/", "*", ":", "?", "\"", "|", "~", "#", "%", "{", "}", ";", "&", "'"];

    foreach ($array as $value) {
        if (stripos($name, $value) !== false) { //если в имени есть недопустимый символ
            return false;
        }
    }

    if (strlen($name) > 200) { //ограничиваем длину названия папки/файла
        return false;
    }

    $array = array_map(function ($val) { //массив файлов/папок в текущей директории $file
        return (($val == ".") || ($val == "..")) ? Null : $val;
    }, scandir($currDir));

    $array = array_filter($array); //фильтруем Null

    foreach ($array as $value) {
        if ($value == $name) { //если такое имя уже есть
            return false;
        }
    }

    return true;
}