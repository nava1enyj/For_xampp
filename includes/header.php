<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/main/css/bootstrap.min.css">
    <link rel="stylesheet" href="/main/css/style.css">
    <title>Dima</title>
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 bg-gradient">
            <div class="container-xxl">
                <a class="navbar-brand" href="/main">
                    <img src="/main/img/Bootstrap.png" alt="" width="30" height="24">
                </a>
                <a class="navbar-brand" href="/main">Орлов Д.А.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/main">Главная</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user'])){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                   href="/main/views/profile.php">Профиль</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" aria-current="page" href="/main/app/auth/logout.php">Выйти</a>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/main/views/login.php">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                   href="/main/views/register.php">Регистрация</a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

