<?php
include("./php/file_manager/getListDir.php");
/**
 * @param $dirname
 * @return array
 * Ф-ция возвращает массив с названием папок в директории $dirname
 * также ф-ция обрабатывает ошибки
 */
function listDir($dirname)
{
    $error = [];
    $error[] = false; //первый элемент - статус ошибки
    $dirname = trim($dirname); //обрезаем пробелы спереди и сзади

    switch ($dirname) {
        case false:
            $error[] = "Некорректное название директории"; //второй элемент - название ошибки
            return $error;
        case is_dir($dirname): //если это директория
            return getListDir($dirname);
        default:
            $error[] = "Директории \"$dirname\" не существует"; //второй элемент - название ошибки
            return $error;
    }
}