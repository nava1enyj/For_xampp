<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/main/rb/rb.php';

R::setup('mysql:host=127.0.0.1;dbname=main', 'root','');

if(!R::testConnection()){
    die('Нет подключения к бд');
}