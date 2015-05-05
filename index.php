<?php
/*
 * This is main gate to all pages
 *
 * Get parameters from request and try to find page.
 */
session_start();
$page = '';
$baseDir = $_SERVER['DOCUMENT_ROOT'];
$baseUrl = $_SERVER['SERVER_NAME'];

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = 'page/' . $_GET['page'] . '.php'; //todo: need add checking is ".php" also added to the parameter value

    if (!file_exists($page)) {
        $page = 'page/404.php';
    }
} else {
    $page = 'page/index.php';
}

if (!empty($page)) {
    require_once('lib/functions.php');
    require_once($page);
}
