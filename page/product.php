<?php
/**
 * 1)= Доработь стааницу поодукта. Написать и использовать функцию loadProductById(). Те выводиьь все данные о поодукте (можно спомощью var_dump)
 * 2)= Создать таблицу product_image. которая будет состояьь из 2х столбоцов product_id & image_path(string) - путь к картинке
 * 3)= Создаь папки media/product где будут хранится картинки
 * 4)= добавить картинки на первые 4 товара в папку
 * 5) =в таблице соединить продукты с их картинками. Например 1 = 'toyota.jpg'
 * 6) =Написать функцию, которая будет возвращать URL продуктовой картинки получая через параметры название картинки getProductImageUrl($imageName)
 * 7) =Дописать loadProductNameById так чтобы в данных было название картинки. Дописать запрос спомощью join
 * 8) =На странице продукта, также выводить карииинку используя ранее написанные функции.
 */

/**
 * Задание 2:
 *
 * 1) Создать контроллер add_to_cart где в параметрах передается  айди добавляемого поодукта напооимер  ?page=add_to_cart&product_id. В самом контроллере пооверять существует ли такой продукт.
 * Если продукт существует, то добавляем в сессию переменную quote_products (type = array) где будут хранится все айдишники добавленных поодуктов. Возможно для этой перемнной нужно будет исоользовать serialize/unserialize.
 * 2)  =Создать таблицу quote со следующими полями entity_id(auto_incr),total_qty, total_price(float), create_time(time), update_time(data-time), has_order(mini-int/bool)
 * 3) В тотже контроллер дописать следующую возможность. При успешном добавлении добавлять в таблицу квота новую запись(пока можно без количества и цены) + Добавить в сессию переменную quote_id равная квоте в таблице квоты
 * Пусть будет страница этого контроллера 2l при успешном показывать надпись - продукт добавлен в корзину! При не успешном- продукт не добавлен в корзину.
 *
 * 4) Добавить кнопку add to cart на странице просмотра товара. HTML. в юрл укзать add_to_cart
 *
 */
$headTitle = 'Product';
$contentViewType = '2l';
//prepare path to block with registration form
$productId = NULL;
$product = null;
$image = null;
//$products = array();

if (isset($_REQUEST['product_id'])){
    $productId = $_REQUEST['product_id'];
}

if ($productId){
    openConnection();
    $product = loadProductById($productId);
        if (isset($product['image_path'])) {
            $imageName = $product['image_path'];
            $image = getProductImageUrl($imageName);
        }
    }

if (!$productId){
    require_once ('page/404.php');
}

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/product.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');