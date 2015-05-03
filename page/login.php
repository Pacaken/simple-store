<?php
$headTitle = 'Login Page';
$contentViewType = '2l';
//prepare path to block with registration form
$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/login.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');