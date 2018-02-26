<?php
include_once("./php/file_manager/checkName.php");
/**
 * @param $newName
 * @param $currDir
 * @return bool
 * Ф-ция создания новой папки
 */
function newFolder($newName, $currDir)
{
    return !checkName($newName, $currDir)
    ? false
    : mkdir($currDir . $newName);
}