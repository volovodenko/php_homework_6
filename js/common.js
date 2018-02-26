var elemsDel = document.getElementsByClassName('del'),
    elemsEdit = document.getElementsByClassName('edit'),
    delConfirm = document.getElementById('delConfirm'),
    delConfirmNo = document.getElementById('delConfirmNo'),
    alertClass = document.getElementsByClassName('alert'),
    newFolder = document.getElementById('newFolder'),
    upload = document.getElementById('upload');

for (i = 0; i < elemsDel.length; i++) { //каждому del назначаем событие при клике
    elemsDel[i].onclick = function () {
        var name = confirm('Вы подтверждаете удаление?');
        if (!!name) {
            var val = event.currentTarget.value; //текущее название копки(она же папка(файл))
            document.getElementById('del').value = val;
            return true;
        }
        return false;
    };
}

for (i = 0; i < elemsEdit.length; i++) { //каждому edit назначаем событие при клике
    elemsEdit[i].onclick = function () {
        var name = prompt("Редактировать имя", event.currentTarget.value);

        if (!!name) { //если нажато ОК
            if (name == event.currentTarget.value) { //если введенное имя совпадает с существующим
                return false;
            } else {
                var val = event.currentTarget.value; //текущее название копки(она же папка(файл))
                document.getElementById('edit').value = val + "|" + name;
                return true;
            }
        } else { //если нажато Отмена
            return false;
        }
    };
}

if (!!delConfirm) {
    delConfirm.onclick = function () { //назначаем клик на кпоку удалить
        event.currentTarget.value = 1;
    }
}

if (!!delConfirmNo) {
    delConfirmNo.onclick = function () { //назначаем клик на кпоку подтверждения удалить
        document.getElementById('del').value = "";
    }
}


if (!!newFolder) {
    newFolder.onclick = function () { ////назначаем клик на кпоку новая папка
        var name = prompt("Введите имя папки");
        if (!!name) {
            document.getElementById('newFolder').value = name;
        } else {
            return false;
        }

    }
}

if (!!upload) {
    upload.onclick = function () { //назначаем клик на кпоку загрузки файлов
        document.getElementById('upload').value = 1;
    }
}


document.addEventListener("DOMContentLoaded", function () { //если вдруг появляюся алерты
    var a = alertClass[0].innerHTML.trim();
    if (!!a) { //если алерт есть
        alertClass[0].style.display = 'block'; //отображаем его
    }
});