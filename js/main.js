$('.btn-default').on('click', function (e) {
    e.preventDefault();
    var formData = new FormData($('.form-horizontal')[0]);
    if ($('input[type=file]')[0]) {
        formData.append('file', $('input[type=file]')[0].files[0]);
    }
    $.ajax({
        url: '',
        type: 'POST',
        data: formData, // Данные которые мы передаем
        cache: false, // В запросах POST отключено по умолчанию, но перестрахуемся
        contentType: false, // Тип кодирования данных мы задали в форме, это отключим
        processData: false
        // data: $('.form-horizontal').serialize()
        //dataType:'json'
    }).done(function (resultat) {
        //console.log(resultat);
        switch (resultat) {
            case 'not empty':
                $('#outmessage').html('Не все поля заполнены!');
                break;
            case 'error img':
                $('#outmessage').html('Не верный формат картинки!');
                break;
            case 'error login':
                $('#outmessage').html('Пользователь с таким логином уже есть!');
                break;
            case 'data update':
                $('#outmessage').html('Данные обновлены!');
                break;
            case 'user add':
                $('#outmessage').html('Пользователь добавлен!');
                break;
            case 'wrong delete file':
                $('#outmessage').html('Ошыбка при удалении файла!');
                break;
            case 'not img':
                $('#outmessage').html('Картинка не выбрана!');
                break;
            case 'password error':
                $('#outmessage').html('Пароли не совпадают!');
                break;
            case 'registration':
                $('#outmessage').html('Регистрация успешна!');
                break;
            case 'autorisation':
                $('#outmessage').html('Авторизация успешна!');
                break;
            case 'message':
                $('#outmessage').html('Сообщение отправлено!');
                break;
            case 'No user':
                $('#outmessage').html('Нет такого пользователя!');
                break;
            case 'logged':
                $('#outmessage').html('Авторизация успешна!');
                break;
            default:
                break;
        }
    })
});
