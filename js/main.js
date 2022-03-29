let avatar = false;

$('input[id="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});

// Регистрация
$('#btn-reg').on('click', function (e) {
    e.preventDefault();
    $('#msg-reg').text('');
    $(`input`).removeClass('border border-danger');


    let login = document.getElementById('login').value,
        email = document.getElementById('email').value,
        password = document.getElementById('password_reg').value,
        confirm_password = document.getElementById('confirm_password').value,
        lastname = document.getElementById('lastname').value,
        name = document.getElementById('name').value,
        patronymic = document.getElementById('patronymic').value;

    let formData = new FormData();
    formData.append('login', login);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('confirm_password', confirm_password);
    formData.append('avatar', avatar);
    formData.append('lastname', lastname);
    formData.append('name', name);
    formData.append('patronymic', patronymic);


    $.ajax({
        url: '/main/app/auth/register.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            if (data.status) {
                document.location.href = 'profile.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[id = "${field}"]`).addClass('border border-danger');
                    });
                } else if (data.type === 2) {
                    $(`input[id = "confirm_password"]`).addClass('border border-danger');
                    $(`input[id = "password_reg"]`).addClass('border border-danger');
                } else if (data.type === 3) {
                    $(`input[id = "login"]`).addClass('border border-danger');
                } else if (data.type === 4) {
                    $(`input[id = "email"]`).addClass('border border-danger');
                }
                $('#msg-reg').text(data.message);
            }
        }
    });

});


//Вход
$('#btn-entrance').on('click', function (e) {
    e.preventDefault();
    $('#msg-reg').text('');
    $(`input`).removeClass('border border-danger');

    let entrance_field = document.getElementById('entrance_field').value,
        password = document.getElementById('password').value;

    $.ajax({
        url: '/main/app/auth/login.php',
        type: 'POST',
        dataType: 'json',
        data: {entrance_field: entrance_field, password: password},
        success(data) {
            if (data.status) {
                document.location.href = 'profile.php'
            }
            else {
                if (data.type === 1)
                {
                    $(`input[id = "entrance_field"]`).addClass('border border-danger');
                    $(`input[id = "password"]`).addClass('border border-danger');
                }
                if (data.type === 2)
                {
                    $(`input[id = "password"]`).addClass('border border-danger');
                }
                $('#msg-reg').text(data.message);
            }
        }
    })

});