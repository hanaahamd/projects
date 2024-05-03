<?php 


$user_name = 'root';
$password = 'root';
$localhost = 'localhost';

$conn = new mysqli($localhost, $user_name, $password);

$sql = 'CREATE DATABASE IF NOT EXISTS `pms`';

$conn->query($sql);
$conn->close();