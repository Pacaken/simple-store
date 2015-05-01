<?php
/**
 * Created by PhpStorm.
 * User: vitalik21
 * Date: 29.04.15
 * Time: 20:35
 */
/**
 * Here is a controller for displaying registration form
 */
$headTitle = 'Registration Page';
$contentViewType = '2l';
//prepare path to block with registration form
$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/registration.phtml');

//add page.phtml
require_once generateBlockTemplatePath('page.phtml');