<?php


if(isset($_SESSION['user'])){
    header("Location: /main/views/profile.php");
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/main/config/connection.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/header.php';
?>
<main class="flex-grow-1">
    <div class="container-xxl ps-5 pe-5">
        <div class="border rounded mt-3">
            <form>
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Вход</h3>
                        <a href="/main/views/register.php" class="link link-primary">Регистрация</a>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Введите email или логин</label>
                        <input type="text" class="form-control" id="entrance_field" aria-describedby="">
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="text-danger text-center mb-3" id="msg-reg"></div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-25" id="btn-entrance">Вход</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/footer.php';
?>
