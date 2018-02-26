<?php
/**
 * @param $currDir
 * @param $name
 * Ф-ция отображает удобочитанемые отрибуты файла/папки
 * стырино с нета
 */
function showAtributes($currDir, $name)
{
    $perms = fileperms($currDir . $name);

    switch ($perms & 0xF000) {
        case 0xC000: // сокет
            $info = 's';
            break;
        case 0xA000: // символическая ссылка
            $info = 'l';
            break;
        case 0x8000: // обычный
            $info = 'r';
            break;
        case 0x6000: // файл блочного устройства
            $info = 'b';
            break;
        case 0x4000: // каталог
            $info = 'd';
            break;
        case 0x2000: // файл символьного устройства
            $info = 'c';
            break;
        case 0x1000: // FIFO канал
            $info = 'p';
            break;
        default: // неизвестный
            $info = 'u';
    }

// Владелец
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
        (($perms & 0x0800) ? 's' : 'x') :
        (($perms & 0x0800) ? 'S' : '-'));

// Группа
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
        (($perms & 0x0400) ? 's' : 'x') :
        (($perms & 0x0400) ? 'S' : '-'));

// Мир
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
        (($perms & 0x0200) ? 't' : 'x') :
        (($perms & 0x0200) ? 'T' : '-'));

    echo $info;
}