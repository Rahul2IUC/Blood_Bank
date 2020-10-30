<?php
// include core files
require_once __DIR__ . '/app/application/core.php';
require_once __DIR__ . '/app/controllers/Controller.php';
require_once __DIR__ . '/app/controllers/PagesController.php';
require_once __DIR__ . '/app/controllers/ReceiverController.php';
require_once __DIR__ . '/app/controllers/LoginController.php';
require_once __DIR__ . '/app/controllers/LogoutController.php';
require_once __DIR__ . '/app/controllers/SignupController.php';
require_once __DIR__ . '/app/controllers/HospitalController.php';


$routes = require_once __DIR__ . "/routes.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (!array_key_exists($path, $routes[$requestMethod])) {
    http_response_code(404);
    echo "404 not found";
    echo '<h1>404 - Not Found"</h1>';
    return;
}
$controllerName = explode('@', $routes[$requestMethod][$path])[0];
$methodName = explode('@', $routes[$requestMethod][$path])[1];
$controller = new $controllerName($conn);

$response = $controller->{$methodName}();

return $response;
