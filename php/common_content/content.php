<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Выполнение домашнего задания PHP от 19.02.2018</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/font-awesome/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="wrapper">

    <main class="filemanager">
        <form method="POST" enctype="multipart/form-data">

            <section class="alert">
                <?php
                include("./php/file_manager/alerts.php");
                ?>
            </section>

            <section class="filemanager_table">
                <input type="hidden" name="path" value="<?= $path ?>">
                <input type="hidden" id="del" name="del" value="<?= $delName ?>">
                <input type="hidden" id="edit" name="edit" value="<?= $editName ?>">

                <ul class="filemanager_table-input">
                    <li>
                        <input type="file" multiple name="filename[]">
                        <button type="submit" title="Загрузить файл" class="action" name="upload" id="upload" value="">
                            <i class="fa fa-upload fa-lg"></i>
                        </button>
                        <button type="submit" title="Создать папку" class="action" id="newFolder" name="newFolder"
                                value="">
                            <i class="fa fa-file-o fa-lg"></i>
                        </button>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

                <ul class="filemanager_table-path">
                    <li>Путь: <?= $path; ?></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

                <ul class="filemanager_table-title">
                    <li>Имя</li>
                    <li>Тип</li>
                    <li>Размер</li>
                    <li>Дата</li>
                    <li>Атрибуты</li>
                    <li>Операции</li>
                </ul>

                <?php
                showFiles($currDir);
                ?>

            </section
        </form>
    </main>
</div>

<script src="./js/common.js"></script>
</body>
</html>