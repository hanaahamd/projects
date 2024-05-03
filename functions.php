<?php
session_start();

define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
// define('ROOT', $_SERVER['DOCUMENT_ROOT']);

function route($path = '')
{
    return URL . $path;
}


function redirect($path)
{
    header('Location: ' . route($path));
}

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key)
{
    $value = $_SESSION[$key];

    unset($_SESSION[$key]);

    return $value;
}

function checkSession($key)
{
    return isset($_SESSION[$key]);
}

function setSessions($sessions)
{
    foreach ($sessions as $key => $value) {
        $_SESSION[$key] = $value;
    }
}


function success($value)
{
    $_SESSION['success'] = 'Category created successfully';
}
