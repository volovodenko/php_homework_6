<?php
/**
 * @param $baseDir
 * @param $path
 * @return array
 * Возвращает текущую директорию $currDir и относительный путь $path
 */
function currDir($baseDir, $path)
{
    $nextDirName = getPOST("dirName");
    $array = [];

    if (stripos($path, ".") !== false) { //если кто то пытается хакнуть и выйти выше $baseDir
        $path = ""; //в корень его
        $nextDirName = "";
    }

    if (!is_dir($baseDir . $path)) { //если хакер задает неправильную директорию
        $path = ""; //в корень его
        $nextDirName = "";
    }

    if ($nextDirName) { //если есть имя следующей папки
        if ($nextDirName == "..") { //если переход в папку выше
            if ($path == "") { //если дошли до корня $baseDir
                $currDir = $baseDir . $path; //не пускать выше $baseDir
                $path = "/";
            } else {
                $currDir = getUpDir($baseDir . $path);
                $path = getUpDir("/" . $path);
            }
        } else { //если переход в папку ниже
            $currDir = $baseDir . $path . $nextDirName . "/";
            $path = "/" . $path . $nextDirName . "/";
        }
    } else { //если имени следующей папки еще нет (начальные условия работы или нажата кнопка операций с файлами)
        if ($path == "") { //начальные условия работы, стартовая страница
            $path = "/";
            $currDir = $baseDir;
        } else { //если нажали на кнопку операций с файлами
            $currDir = $baseDir . $path . "/"; //остаемся в текущей папке
            $path = "/" . $path;
        }

    }

    $array[] = $currDir;
    $array[] = $path;
    return $array;
}