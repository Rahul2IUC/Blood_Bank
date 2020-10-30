<?php
function view($filename, $data = [])
{
    extract($data);
    require __DIR__ . '/../views/' . str_replace('.', '/', $filename) . '.php';
}

function errorHandler($url, $msg)
{
    $_SESSION['errors'] = array();
    array_push($_SESSION['errors'], $msg);
    header("Location: " . $url);
}
