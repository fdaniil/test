<?php
require_once "db.php";

$dataBase = new Database();

$connection = $dataBase->getConnection();

$data = json_decode(file_get_contents("php://input"));

$login = htmlspecialchars(strip_tags($data->login));
$email = htmlspecialchars(strip_tags($data->email));
$pass  = htmlspecialchars(strip_tags($data->password));


$stmt = $connection->prepare("INSERT INTO users (login, email, password) VALUES (:login, :email, :pass)");

$stmt->bindParam(':login', $login);
$stmt->bindParam(':email', $email);
$pass = password_hash($pass, PASSWORD_DEFAULT);
$stmt->bindParam(':pass',  $pass);

$resp = array('status'=>'error');

if($stmt->execute())
{
    $resp['status'] = 'succes';
}
//var_dump($data);
echo json_encode($resp);

