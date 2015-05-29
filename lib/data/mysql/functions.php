<?php
//load mysql config:
require_once $baseDir . "/lib/data/mysql/config.php";

CONST PRODUCT_IMAGE_PATH = 'media/product';
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
/*
 * Load Category products
 *
 */
function loadCategoryProducts($categoryId)
{
    $result = array();
    $query = mysql_query("SELECT * FROM `products` AS `pr` JOIN `category_products` AS `cat` ON cat.product_id = pr.entity_id AND cat.category_id = {$categoryId}");
    while($row = mysql_fetch_assoc($query)) {
        $result[] = $row;
    }

    return $result;
}
/*
 * Load product  by id Дописать loadProductNameById так чтобы в данных было название картинки. Дописать запрос спомощью join
 */

function loadProductNameById($productId)
{
    $name = '';
    $query = mysql_query("SELECT `name` FROM `products` WHERE entity_id={$productId}");
    $data = mysql_fetch_assoc($query);
    if (isset ($data['name'])) {
        $name = $data['name'];
    }
    return $name;
 }
//SELECT `entity_id`, `sku`, `name`, `describtion`, `qty`, `price`, `visible` FROM `products` WHERE entity_id={$productId}
function loadProductById($productId)
{
    $result = array();
    $query = mysql_query("SELECT products.entity_id, products.sku, products.name, products.describtion, products.qty, products.price, products.visible, product_image.image_path
                        FROM products
                        INNER JOIN product_image
                        ON products.entity_id = product_image.product_id WHERE entity_id={$productId}");
    $result =  mysql_fetch_assoc($query);

    return $result;
}

//http://local.simple-store.com/media/product/sample.jpg

function getProductImageUrl($imageName)
{
    return getBaseUrl() . '/media/product/'. $imageName;
}

function loadQuote()
{
    $query = mysql_query("INSERT INTO `quote`(`entity_id`) VALUES ('Auto_increment')");
    $result =  mysql_insert_id();
    return $result;
}
//INSERT INTO `quote`(`entity_id`) VALUES ('Auto_increment')