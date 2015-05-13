<?php
$mail = NULL;
$isCustomerLogin = false;
if (isset($_SESSION['is_customer_login'])) {
    $isCustomerLogin = $_SESSION['is_customer_login'];
}

if (isset($_POST['login'])) {
    $mail = $_POST['login'];
}

if (!$mail) {
    $loginResult = 'Please write mail!';
}

$headTitle = 'Process login';
$contentViewType = '2l';
//prepare path to block with registration form

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/process_login.phtml');
if ($isCustomerLogin) {
    $loginResult = "Already logged!";
} elseif ($mail) {
    openConnection();
    $password = getCustomerPasswordByMail($mail);
    if ($password == $_POST['password']) {
        $loginResult = 'You have Success login!';
        $_SESSION['is_customer_login'] = true;
    } else {
        $loginResult = "Wrong name or password!";
        $_SESSION['is_customer_login'] = false;
    }
}
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
