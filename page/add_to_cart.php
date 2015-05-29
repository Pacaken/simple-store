<?php
/**
  * 1) =Создать контроллер add_to_cart где в параметрах передается  айди добавляемого поодукта напооимер  ?page=add_to_cart&product_id. В самом контроллере пооверять существует ли такой продукт.
 * Если продукт существует, то добавляем в сессию переменную quote_products (type = array) где будут хранится все айдишники добавленных поодуктов. Возможно для этой перемнной нужно будет исоользовать serialize/unserialize.
 * 2)  =Создать таблицу quote со следующими полями entity_id(auto_incr),total_qty, total_price(float), create_time(time), update_time(data-time), has_order(mini-int/bool)
 * 3) В тотже контроллер дописать следующую возможность. При успешном добавлении добавлять в таблицу квота новую запись(пока можно без количества и цены) + Добавить в сессию переменную quote_id равная квоте в таблице квоты
 * Пусть будет страница этого контроллера 2l при успешном показывать надпись - продукт добавлен в корзину! При не успешном- продукт не добавлен в корзину.
 *
 * 4) =Добавить кнопку add to cart на странице просмотра товара. HTML. в юрл укзать add_to_cart
 *
 *
 * 1) Исправить кнопку Add to cart & make commit
 * 2) Добавить виртуальный хост admin.simple-store.com:
 *          - edit by sudo /etc/hosts
 *          - by sudo add new configuration file admin.simple-store.com.conf
 *          - взять из другого конфига текст конфига и скопироваьь его в новый конфиг + исправить его
 *          - make a2ensite admin.simple-store.com or admin.simple-store.com.conf
 *          - restart apache
 *          - add new folder in www
 *          - add new index.php for testing
 *
 *
 */
$headTitle = 'Add to cart';
$contentViewType = '2l';

$productId = NULL;
$message = '';
$quote_products = array();
$quote = null;

if (isset($_SESSION['quote_products'])) {
    $quote_products = $_SESSION['quote_products'];
}

if (isset($_REQUEST['product_id'])){
    $productId = $_REQUEST['product_id'];
}

openConnection();

if ($productId && loadProductNameById($productId)) {
    $_SESSION['quote_products'][]= $productId;

    $quoteId = loadQuote();
    $_SESSION['quote_id']= $quoteId;

    $message = 'product added to cart!';
} else {
    $message = 'wrong product!';
}

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/add_to_cart.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
