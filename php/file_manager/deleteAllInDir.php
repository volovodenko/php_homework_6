<?php
/**
 * @param $file
 * @return bool
 * Функция удаляе все папки и файлы внутри директории $file
 */
function delAllInDir($file)
{
    $OK = true; //статус выполнения по рекурсии

    $array = array_map(function ($val) { //массив файлов/папок в текущей директории $file
        return (($val == ".") || ($val == "..")) ? Null : $val;
    }, scandir($file . "/"));

    $array = array_filter($array); //фильтруем Null

    foreach ($array as $f) {
        $buffer = $file . "/" . $f; //текущий файл/папка

        if (!$OK) {  //если произошла ошибка в какой то рекурсии
            return false; //останавливаем работу
        }

        if (is_dir($buffer)) { //если это директория
            //если директория не пустая
            //делаем рекурсию (удаляем все в этой директории)
            $OK = !emptyDir($buffer) ? delAllInDir($buffer) : $OK;
            emptyDir($buffer) ? rmdir($buffer) : ""; //если директория пустая - удаляем

        } else { //если это файл
            if (is_writable($buffer)) { //если можно стереть
                unlink($buffer); //стираем
            } else {
                echo "<span>Операция прервана! Вы не имеете прав доступа к файлу '" . $f . "' </span><br><hr>";
                return false;
            }
        }
    }
    return true;
}
