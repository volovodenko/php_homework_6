<?php

function showOperations($name)
{
    if ($name != ".."):
        ?>
        <button title="Редактировать имя" class="action edit" value="<?=$name?>">
            <i class="fa fa-pencil fa-lg"></i>
        </button>
        <button title="Удалить" class="danger del" value="<?=$name?>">
            <i class="fa fa-trash-o fa-lg"></i>
        </button>
        <?php
    endif;
}
?>
