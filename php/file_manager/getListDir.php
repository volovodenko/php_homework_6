<?php
/**
 * @param $dirname
 * @return array
 * Ф-ция возвращает массив (для передачи в ф-цию listDir) с названием папок в директории $dirname
 */
function getListDir($dirname)
{
    $array = scandir($dirname);
    $arrayDir = []; //массив папок
    $arrayFile = []; //массив файлов

    foreach ($array as $value) {
        if (is_dir($dirname . $value)) { //если это папка
            if (is_readable($dirname . $value)) { //и читаемая
                $arrayDir[] = ($value == "." || $value == "..") ? Null : $value; //записываем в массив
            }
        } elseif (is_file($dirname . $value)) { //если это файл
            $arrayFile[] = $value;
        }

    }

    //устанавливаем имя папки для перехода в верхнюю папку
    //если корень системы то не отображаем ничего
    //выделяем отдельно и добавляем в начало массива иначе сортируется неправильно
    $up = ($dirname == "/") ? Null : "..";

    $arrayDir = array_filter($arrayDir); //убираем Null
    $arrayFile = array_filter($arrayFile);

    sort($arrayDir, SORT_STRING | SORT_FLAG_CASE); //сортируем по наименованию
    sort($arrayFile, SORT_STRING | SORT_FLAG_CASE);

    //добавляем символ перехода в верхнюю папаку в начало массива, объединяем массивы
    $array = $up ? array_merge([$up], $arrayDir, $arrayFile) : array_merge($arrayDir, $arrayFile);

    return $array;
}