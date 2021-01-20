<?php
session_start();

require_once "db.php";

$dataBase = new Database();

$connection = $dataBase->getConnection();

    $data = json_decode(file_get_contents("php://input"));

    $login = htmlspecialchars(strip_tags($data->login));
    $pass  =htmlspecialchars(strip_tags($data->password));
    $stmt = $connection->prepare("SELECT * FROM users WHERE login = :login");

    $stmt->bindParam(':login', $login);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pass, $row['password']))
        {
            $_SESSION['login'] = $row['login'];
            echo (json_encode(['status'=>'succes']));
            exit();
        }
    }
    echo (json_encode(['status'=>'error']));
