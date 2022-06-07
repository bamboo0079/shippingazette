<?php
    $host = 'localhost';
    $db = 'shipping';
    $user = 'root';
    $password = '';

    $routers = array(
        "/addmin/dashboard?page=user-list" => '/src/view/backend/dashboard.php',
        "/addmin/dashboard?page=ship" => '/src/view/backend/ship.php', // Hãng tàu
        "/addmin/dashboard?page=add-ship" => '/src/view/backend/add_ship.php',
        "/addmin/dashboard?page=edit-ship" => '/src/view/backend/edit_ship.php',
        "/addmin/dashboard?page=port" => '/src/view/backend/port.php',
        "/addmin/dashboard?page=add-port" => '/src/view/backend/add_port.php',
        "/addmin/dashboard?page=edit-port" => '/src/view/backend/edit_port.php',
        "/addmin/dashboard?page=agent" => '/src/view/backend/agent.php',
    );
?>