<?php
include_once("./php/file_manager/checkName.php");
/**
 * @param $name
 * @param $currDir
 * @return bool
 * Ф-ция переименовывает файл
 */
function renameFile($name, $currDir)
{
    $oldName = stristr($name, "|", true); //вырезаем старое название файла
    $newName = mb_substr(stristr($name, "|"), 1); //вырезаем новое название файла

    return !checkName($newName, $currDir)
        ? false
        : rename($currDir . $oldName, $currDir . $newName);
}