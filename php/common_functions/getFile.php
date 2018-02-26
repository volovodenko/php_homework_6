<?php
/**
 * @param $fileName
 * @return string
 * выборка файла $fileName из массива _FILES
 */
function getFile($fileName) {
    $default = [];
    $default["name"] = "";

    return isset($_FILES[$fileName]) ? $_FILES[$fileName] : $default;
}