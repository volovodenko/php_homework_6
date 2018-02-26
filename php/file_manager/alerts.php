<?php
//если есть имя файла на удаление или подтверждение группового удаления
$delName = ($delName || $delConfirm) ? delete($currDir, $delName, $delConfirm) : "";

//если есть имя для переименования файла - переименовываем
if ($editName) {
    if (!renameFile($editName, $currDir)) {
        echo "Ошибка! Недопустимое имя";
    }
    $editName = "";
}

//если есть имя для создания папки
if ($newFolder) {
    if (!newFolder($newFolder, $currDir)) {
        echo "Ошибка! Такое имя уже существует или недопустимое имя";
    }
    $newFolder = "";
}

//загрузка файлов
if ($upload && !empty($files["name"][0])) {
    if (!upload($files, $currDir)) {
        echo "Ошибка загрузки или недопустимое имя файла!";
    }
    $files["name"][0] = "";
}