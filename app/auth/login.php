<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/config/connection.php';
function login($entrance_field, $password){

    $user = '';

    $login_user = R::findOne('users' ,'login = ?' , [$entrance_field]);

    $email_user = R::findOne('users' ,'email = ?' , [$entrance_field]);

    if($login_user){
        $user = $login_user;
    }
    elseif ($email_user){
        $user = $email_user;
    }
    else{
        $response = [
            'status' => false,
            'type' => 1 ,//Неверный логин или email
            'message' => 'Неверный логин или email'
        ];
        echo json_encode($response);
        die();
    }


    if(password_verify($password, $user->password)){
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

    }else{
        $response = [
            'status' => false,
            'type' => 2 ,//Неверный пароль
            'message' => 'Неверный пароль'
        ];
        echo json_encode($response);
        die();
    }
}

login($_POST['entrance_field'] , $_POST['password']);