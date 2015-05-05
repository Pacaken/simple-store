<?php
$headTitle = 'Process registration';
$contentViewType = '2r';
//prepare path to block with registration form
$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/process_registration.phtml');
//add page.phtml
require_once generateBlockTemplatePath('page.phtml');
