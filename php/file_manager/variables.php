<?php
// Переменные

$baseDir = "./1/";
$path = mb_substr(getPOST("path"), 1); //текущий относительный путь пользователя (обрезаем слеш)

$delName = getPOST("del"); //название папки для удаления
$delConfirm = getPOST("delConfirm"); //подтверждение группового удаления
$editName = getPOST("edit"); //новое имя | старое имя файла/папки для редактирования
$newFolder = getPOST("newFolder"); //создать папку
$upload = getPOST("upload"); //создать папку
$files = getFile("filename");  //загруженные файлы

$currDir = currDir($baseDir, $path)[0]; //текущая глобальная директория
$path = currDir($baseDir, $path)[1]; //текущий относительный путь для пользлователя