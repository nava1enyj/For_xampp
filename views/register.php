<?php

if(isset($_SESSION['user'])){
    header("Location: /main/views/profile.php");
}

require_once $_SERVER['DOCUMENT_ROOT'] .  '/main/config/connection.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/header.php';
?>
<main class="flex-grow-1">
    <div class="container-xxl ps-5 pe-5">
        <div class="border rounded mt-3">
            <form>
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Регистрация</h3>
                        <a href="/main/views/login.php" class="link link-primary">Вход</a>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" aria-describedby="">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password_reg">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Еще раз</label>
                        <input type="password" class="form-control" id="confirm_password">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Аватар</label>
                        <input type="file" class="form-control" id="avatar">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="patronymic">
                    </div>
                    <div class="text-danger text-center mb-2" id="msg-reg"></div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-25" id="btn-reg">Создать аккаунт</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/footer.php';
?>
