<?php

require_once __DIR__ . '/../../../common/functions.php';
require_once __DIR__ . '/../../../common/dbFunctions.php';
require_once __DIR__ . '/../../../classes/Session.php';
require_once __DIR__ . '/../../../classes/Validation.php';
require_once __DIR__ . '/../../../classes/Database.php';
require_once __DIR__ . '/../../../classes/Category.php';

$nameInput = $_POST['name_testing'];

$validator = new Validation;

$validator->requiredValidation('name', $nameInput);
$validator->maxValidation('name', $nameInput, 4);
$validator->minValidation('name', $nameInput, 15);

if (!is_null($validator->error)) {
    Session::setSession('errors', $validator->error);
    redirect('dashboard/categories/create.php');
    die();
}

// createCategory($name);

// $db = new Database;

// $sql = "INSERT INTO `categories` (`name`) VALUES ('$nameInput')";

// $db->makeQuery($sql);

Category::createCategory($nameInput);

Session::setSession('success', 'Category created successfully');

// setSession('success', 'Category created successfully');

redirect('dashboard/categories/create.php');
