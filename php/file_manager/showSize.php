<?php

function reSize($filesize)
{

    if ($filesize > 1024) {
        $filesize = ($filesize / 1024);
        // Если размер файла больше Килобайта
        // то лучше отобразить его в Мегабайтах. Пересчитываем в Мб
        if ($filesize > 1024) {
            $filesize = ($filesize / 1024);
            // А уж если файл больше 1 Мегабайта, то проверяем
            // Не больше ли он 1 Гигабайта
            if ($filesize > 1024) {
                $filesize = ($filesize / 1024);
                $filesize = round($filesize, 1);
                return $filesize . " Гб";
            } else {
                $filesize = round($filesize, 1);
                return $filesize . " Mб";
            }
        } else {
            $filesize = round($filesize, 1);
            return $filesize . " Кб";
        }
    } else {
        $filesize = round($filesize, 1);
        return $filesize . " байт";
    }


}


function showSize($currDir, $name)
{

    if (is_dir($currDir . $name)) {
        echo "&#60;Папка&#62;";
    } else {
        echo reSize(filesize($currDir . $name));
    }


}