<?php
if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', "on");
error_reporting(E_ALL);
include __DIR__ . '/connection.php';
include_once __DIR__ . '/../helpers.php';
