<?php
session_start();
if(isset($_SESSION['login'])){
    echo (json_encode(['status'=>'succes', 'login' => $_SESSION['login']]));
    exit();
}

echo (json_encode(['status'=>'error']));