<?php

require_once __DIR__ . '/../../../common/functions.php';
require_once __DIR__ . '/../../../common/dbFunctions.php';
require_once __DIR__ . '/../../../classes/Session.php';
require_once __DIR__ . '/../../../classes/Validation.php';


$validator = new Validation;

$validator->existsValidate('categories', 'id', $_POST['category_id']);

if (!is_null($validator->error)) {
    Session::setSession('errors', $validator->error);
    redirect('dashboard/products/create.php');
    die();
}

createProduct(
    name: $_POST['name'],
    description: $_POST['description'],
    price: $_POST['price'],
    category_id: $_POST['category_id']
);

// setSession('success', 'Product created successfully');
Session::setSession('success', 'Product created successfully');

redirect('dashboard/products/create.php');
