<?php
include("./php/file_manager/emptyDir.php");
include("./php/file_manager/deleteAllInDir.php");
/**
 * @param $currDir - текущая директория
 * @param $delName - текущее имя файла/папки для удаления
 * @param $delConfirm - потдтверждение удаления группы файлов
 * @return string
 * Если удаление произошло успешно - возвращаеться пустая строка
 * Если нужно подтверждение на групповове удаление - возвращаеться имя файла/папки в которой удаляеться группа
 * Если произошла ошибка удаление - возвращаеться пустая строка
 */
function delete($currDir, $delName, $delConfirm)
{
    $file = $currDir . $delName;

    if (is_file($file)) { //если это файл
        if (is_writable($file)) { //если можно стереть
            unlink($file);
            return "";
        } else {
            echo "<span>Вы не имеете прав доступа к файлу $file !</span><br><hr>";
            return "";
        }

    } elseif (is_dir($file)) { //если это директория

        if (!emptyDir($file) && !$delConfirm) { //если не пустая и нет подтверждения удаления

            //вставка value реализована в js
            ?>
            <span>
            Каталог содержит файлы или подкаталоги.
            Вы действительно хотите удалить его целиком, со всеми файлами и подкаталогами?
            </span>
            <button id='delConfirm' name='delConfirm' value=''>Да</button>
            <button id='delConfirmNo'>Нет</button>
            <br>
            <hr>
            <?php
            return $delName; //возвращаем имя папки для удаления в ней всех файлов на следующем этапе

        } elseif (!emptyDir($file) && $delConfirm) { //если не пустая и есть подтверждение удаления

            delAllInDir($file); //удаляем все внутри папки
            emptyDir($file) ? rmdir($file) : ""; //если папка пустая, удаляем
            return "";

        } else { //если пустая папка

            rmdir($file);
            return "";
        }
    }
}