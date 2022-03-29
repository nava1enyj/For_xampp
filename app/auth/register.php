<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/config/connection.php';

function register($login, $email, $password, $confirm_password, $lastname, $name, $patronymic)
{

    $error_fields = [];

    if (strlen($login) < 4 || strlen($login) > 48|| preg_match('/[А-Яа-яЁё_ -]/iu', $login)) {
        $error_fields[] = 'login';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if (strlen($password) < 8 || strlen($password) > 48 ||  preg_match('/[А-Яа-яЁё_ -]/iu', $password)) {
        $error_fields[] = 'password_reg';
    }

    if (strlen($lastname) < 2 || strlen($lastname) > 48) {
        $error_fields[] = 'lastname';
    }

    if (strlen($name) < 2 || strlen($name) > 48) {
        $error_fields[] = 'name';
    }

    if (strlen($patronymic) < 2 || strlen($patronymic) > 48) {
        $error_fields[] = 'patronymic';
    }

    if(!isset($_FILES['avatar'])){
        $error_fields[] = 'avatar';
    }



    if (!empty($error_fields)) {
        $response = [
            'status' => false,
            'type' => 1,//ошибка валидации
            'message' => 'Проверьте правильность полей',
            'fields' => $error_fields
        ];

        echo json_encode($response);

        die();
    }



    if($password !== $confirm_password){
        $response = [
            'status' => false,
            'type' => 2,//пароли не совпадают
            'message' => 'Пароли не свопадают'
        ];

        echo json_encode($response);

        die();
    }

    $login_user = R::findOne('users' ,'login = ?' , [$login]);

    if($login_user){
        $response = [
            'status' => false,
            'type' => 3,//Логин занят
            'message' => 'Логин занят'
        ];

        echo json_encode($response);

        die();
    }

    $email_user = R::findOne('users' ,'email = ?' , [$email]);

    if($email_user){
        $response = [
            'status' => false,
            'type' => 4,//Емайл существет
            'message' => 'Email уже существует'
        ];

        echo json_encode($response);

        die();
    }

    $path = 'uploads/' .time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path);


    $user = \R::dispense('users');
    $user->login = $login;
    $user->password = password_hash($password,PASSWORD_DEFAULT);
    $user->email= $email;
    $user->name = $name;
    $user->lastname = $lastname;
    $user->patronymic = $patronymic;
    $user->avatar = $path;
    $user->group = '1'; // 1-пользователь , 2 - админ
    \R::store($user);

    session_start();

    $_SESSION['user']=[
        'id' => $user->id,
        'login' => $user->login,
        'email' => $user->email,
        'name' => $user->name,
        'patronymic' => $user->patronymic,
        'lastname' => $user->lastname,
        'avatar' => $user->avatar,
        'group' => $user->group
    ];

    $response = [
        'status' => true,
    ];

    echo json_encode($response);

    die();

}

register($_POST['login'],
    $_POST['email'],
    $_POST['password'],
    $_POST['confirm_password'],
    $_POST['lastname'],
    $_POST['name'],
    $_POST['patronymic']
);
