<?php

require 'includes/app.php';
$db = conectarDb();

$email = 'gfranbm@gmail.com';
$password = '123546';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);




$query = "INSERT INTO admin (email, password) VALUES('${email}', '${passwordHash}');";

mysqli_query($db, $query);

?>