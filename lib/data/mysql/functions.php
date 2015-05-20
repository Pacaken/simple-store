<?php
//load mysql config:
require_once $baseDir . "/lib/data/mysql/config.php";
/**
 * Make connection to db.
 *
 * @return null|resource
 */
function openConnection()
{
    global $dbHost, $dbUser, $dbPassword, $dbName, $dbConnector;

    if ($dbConnector) {
        return $dbConnector;
    }
    $dbConnector = mysql_connect($dbHost, $dbUser, $dbPassword) or die('Could not connect to server.' );
    mysql_select_db($dbName) or die('Could not select database.');
    return $dbConnector;
}

/**
 * Load customer by entityId from db
 *
 * @param $entityId
 * @return array
 */
function loadCustomer($entityId)
{
    $data = mysql_query("SELECT * FROM `customers` WHERE entity_id={$entityId}");
    $customer = mysql_fetch_assoc($data);
    return $customer;
}

/**
 * Retrieve customer password by mail
 *
 * @param $mail
 * @return mixed
 */
function getCustomerPasswordByMail($mail)
{
    $pwd = '';
    $name = mysql_query("SELECT `password` FROM `customers` WHERE mail=\"{$mail}\"");
    $result = mysql_fetch_assoc($name);

    if (isset($result['password'])) {
        $pwd = $result['password'];
    }
    return $pwd;
}
/**
 * Load  first_name, last_name, mail, password to the db
 *
 */
function saveCustomer($firstName, $lastName, $email, $password)
{
    $result = mysql_query("INSERT INTO `simple-store`.`customers` (`first_name`, `last_name`, `mail`, `password`) VALUES ('$firstName', '$lastName', '$email', '$password');");
    return $result;
}
/**
 * Retrieve customer email
 */
function isCustomerExist($email)
{
    $result = false;
    $name= mysql_query("SELECT `mail` FROM `customers` WHERE mail='{$email}'");
    $result = mysql_fetch_assoc($name);
    if (isset($result['mail'])) {
        $result  = true;
    }
    return $result;
}
/*
 * Load category id
 *
 * @param $categoryId
 * @return mixed
 */
function loadCategoryName($categoryId)
{
    $name = '';
    $query = mysql_query("SELECT `name` FROM `categories` WHERE entity_id={$categoryId}");
    $data = mysql_fetch_assoc($query);
    if (isset ($data['name'])) {
        $name = $data['name'];
    }
    return $name;
}