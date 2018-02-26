<?php
/**
 * @param $dirName
 * @return string
 * Ф-ция отсекает последнее название папки в пути $dirName
 */
function getUpDir($dirName) {
    $pos = 0;

    for ( $i = mb_strlen($dirName)-2; $i>=0 ; $i-- ) { //ищем позицию предпоследнего слеша
        $item = mb_substr($dirName, $i, 1, "UTF-8"); //считываем посимвольно сзади
        if ($item == "/") { //слеш найден
            $pos = $i;
            break;
        }
    }

    return mb_substr($dirName, 0, $pos+1, "UTF-8"); //отсекаем с предпоследним слешом
}