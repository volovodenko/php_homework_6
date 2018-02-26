<?php
include_once("./php/file_manager/checkName.php");
/**
 * @param $files
 * @param $currDir
 * @return bool
 * Ф-ция загрузки файла/ов
 */
function upload($files, $currDir)
{
    foreach ($files["name"] as $key => $name) {
        $uploadfile = $currDir . basename($name);

        if (!checkName($name, $currDir)) {
            return false;
        }

        if (!copy($files["tmp_name"][$key], $uploadfile)) { //если файл не копируется в директорию
            return false;
        }
    }

    return true;
}