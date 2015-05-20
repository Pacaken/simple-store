<?php
$headTitle = 'Category View';
$contentViewType = '2l';
//prepare path to block with registration form
$categoryId = NULL;
$categoryView = null;

if (isset($_GET['category_id'])){
    $categoryView = $_GET['category_id'];
}

if ($categoryView){
    openConnection();
    $categoryId = loadCategoryName($categoryView);
}

if (!$categoryId){
    require_once ('page/404.php');
}

$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/category_view.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');