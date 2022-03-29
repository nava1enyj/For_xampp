<?php

require_once $_SERVER['DOCUMENT_ROOT'] .  '/main/config/connection.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/header.php';

?>
<main class="flex-grow-1">
    <div class="container-xxl ps-5 pe-5">
        <h3>Профиль</h3>
        <hr>
        <div class="border">
            <div class="p-5">
                <div class="d-flex">
                    <img src="../<?=$_SESSION['user']['avatar']?>" class="img-thumbnail avatar-profile" alt="...">
                    <div class="ms-3">
                        <h5 class="border-bottom">Логин: <?=$_SESSION['user']['login']?></h5>
                        <p>Почта: <?=$_SESSION['user']['email']?></p>
                        <p>Имя: <?=$_SESSION['user']['name']?></p>
                        <p>Фамилия: <?=$_SESSION['user']['lastname']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/includes/footer.php';
?>
