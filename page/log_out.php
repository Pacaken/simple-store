<?php
$isCustomerLogin = false;
if (isset($_SESSION['is_customer_login'])) {
    $isCustomerLogin = $_SESSION['is_customer_login'];
}

$headTitle = 'Log out';
$contentViewType = '2l';
//prepare path to block with registration form

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/log_out.phtml');
if ($isCustomerLogin) {
    $_SESSION['is_customer_login'] = false;
    $logOutResult = "You're out";
}

//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
