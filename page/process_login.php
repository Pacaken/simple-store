<?php
$isCustomerLogin = false;
if (isset($_SESSION['is_customer_login'])) {
    $isCustomerLogin = $_SESSION['is_customer_login'];
}

$name='Sergey';
$password='qa123123';
$headTitle = 'Process login';
$contentViewType = '2l';
//prepare path to block with registration form

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/process_login.phtml');
if ($isCustomerLogin) {
    $loginResult = "Already logged!";
} else {
    if ($name==$_POST['login'] && $password==$_POST['password']) {
        $loginResult = 'You have Success login!';
        $_SESSION['is_customer_login'] = true;
    } else {
        $loginResult = "Wrong name or password!";
        $_SESSION['is_customer_login'] = false;
    }
}
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
