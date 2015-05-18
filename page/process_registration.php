<?php
$headTitle = 'Process registration';
$contentViewType = '2l';
//prepare path to block with registration form
$firstName = NULL;
$lastName = NULL;
$email = null;
$password = null;
$result = false;
$message = '';
$isCustomerLogin = false;

if (isset($_SESSION['is_customer_login'])) {
    $isCustomerLogin = $_SESSION['is_customer_login'];
}

if (isset ($_POST['first_name'])) {
    $firstName = $_POST['first_name'];
}

if (isset ($_POST['last_name'])) {
    $lastName = $_POST['last_name'];
}

if (isset ($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset ($_POST['password'])) {
    $password = $_POST['password'];
}

if ($firstName && $lastName && $email && $password) {
    openConnection();
    //check is filled email exist in db
        if (isCustomerExist($email)) {
            $message = "Wrong, this user exist!";
        } else {
            $result = saveCustomer($firstName, $lastName, $email, $password);
   }
} else {
    $message = "Some field doesn't filled!";
}

if ($result) {
    $message = 'Success!';
    $_SESSION['is_customer_login'] = true;
} else {
    $_SESSION['is_customer_login'] = false;
}

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/process_registration.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
