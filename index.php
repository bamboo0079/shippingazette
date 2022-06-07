<?php
require "src/helper/config.php";
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/src/view/front_end/home.php';
        break;
    case '' :
        require __DIR__ . '/src/view/front_end/home.php';
        break;
    case '/about' :
        require __DIR__ . '/src/view/front_end/about.php';
        break;
    case '/auth/login' :
        require __DIR__ . '/src/view/backend/login.php';
        break;
    case '/addmin/dashboard':
        require __DIR__ . '/src/view/backend/dashboard.php';
        break;
    default:
        if(isset($routers[$request])) {
            require __DIR__ . '/src/view/backend/dashboard.php';
            break;
        }
        http_response_code(404);
        require __DIR__ . '/src/view/404.php';
        break;
}
?>