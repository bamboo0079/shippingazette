<?php
session_start();
include_once 'config.php';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}


function getString($str) {

    $lang = "vn";
    if(isset($_SESSION['lang']) && $_SESSION['lang'] != "") {
        $lang = $_SESSION['lang'];
    }

    $handle = fopen("./lib/lang/".$lang.'.conf', "r");
    $data_lang = array();
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $spl_ln = explode(":", $line);
            $key = $spl_ln[0];
            $data_lang[$key] = $spl_ln[1];
        }

        fclose($handle);
    }
    if(isset($data_lang[$str])) {
        return $data_lang[$str];
    }
    return $str;
}
