<?php
/**
 * @param $dirName
 * @return array
 * Ф-ция разбивает имя файла на имя и тип(после псоледней точки)
 */
function stringSlice($dirName) {
    $pos = 0;
    $item = "";
    $array = [];

    for ( $i = mb_strlen($dirName)-1; $i>=0 ; $i-- ) { //ище последнюю точку в имени файла
        $item = mb_substr($dirName, $i, 1, "UTF-8"); //считываем посимвольно сзади
        if ($item == ".") { //нашли
            $pos = $i;
            break;
        }
    }

    if ($pos !=0 ) { //если позициия не нулевая
        $array[] = mb_substr($dirName, 0, $pos, "UTF-8"); //имя файла
        $array[] = mb_substr($dirName, $pos+1, mb_strlen($dirName), "UTF-8"); //тип
    } else {
        $array[] = $dirName; //имя файла
        $array[] = ""; //тип
    }

    return $array;
}
