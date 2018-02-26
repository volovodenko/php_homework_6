<?php
/**
 * @param $dir
 * @return bool
 * Если папка пустая, возвращает true, если нет - false
 */
function emptyDir($dir)
{
    $dir .= "/";
    $dh = opendir($dir);
    $empty = true;

    while ($f = readdir($dh)) { //проверка пустая ли директория
        if ($f != '.' && $f != '..') {
            $empty = false;
            return $empty;
        }
    }
    return $empty;
}
