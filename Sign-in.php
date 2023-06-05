<?php
$username = $_POST["username"];
$password = $_POST["password"];

$pdo = new PDO("sqlite:../database.sqlite");

$statement = $pdo->prepare("SELECT password FROM users WHERE username = :username");
$statement->bindValue(":username", $username);
$statement->execute();
$hashed_password = $statement->fetchColumn();

if (password_verify($password, $hashed_password)) {
	header("Location: Home.php");
}
else {
	header("Location: Index.php");
}
?>
