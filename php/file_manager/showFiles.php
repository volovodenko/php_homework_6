<?php
include("./php/file_manager/listDir.php");
include("./php/file_manager/showName.php");
include("./php/file_manager/showType.php");
include("./php/file_manager/showSize.php");
include("./php/file_manager/showDate.php");
include("./php/file_manager/showAtributes.php");
include("./php/file_manager/showClass.php");
include("./php/file_manager/showOperations.php");
/**
 * @param $currDir
 * Ф-ция отображает список из файлов и директорий
 */
function showFiles($currDir)
{
    if (is_dir($currDir)) {  //если такая директория есть
        $listDir = getListDir($currDir);
    } else {
        return; //если такой директории нет  - ничего не отображаем
    }

    foreach ($listDir as $value) :
        ?>
        <ul class="filemanager_table-files">
            <li class="<?php showClass($currDir, $value); ?>"><?php showName($currDir, $value); ?></li>
            <li><?php showType($currDir, $value); ?></li>
            <li><?php showSize($currDir, $value); ?></li>
            <li><?php showDate($currDir, $value); ?></li>
            <li><?php showAtributes($currDir, $value); ?></li>
            <li><?php showOperations($value); ?></li>
        </ul>
        <?php
    endforeach;
}

?>
