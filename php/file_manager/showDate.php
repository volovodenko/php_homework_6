<?php
/**
 * @param $currDir
 * @param $name
 * Ф-ция отображает дату последнего изменения файла
 */
function showDate($currDir, $name)
{
    echo date("d.m.Y", filemtime($currDir . $name));
}