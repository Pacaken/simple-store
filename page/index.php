<?php
/**
 * This is main page.
 */
//here starts part of code for preparing data for view
$wlcMessage = 'Hello!';
$extPageLink = generateUrl( array('page'=>'sample', 'other_sample_parameter' =>'sample') );
$nonExtPageLink = generateUrl( array('page'=>'not_exist_sample_page') );

//there is a main standard variables that uses in displaying all PAGE blocks:
$headTitle = 'Main Page';
$contentViewType = '2l';
$leftMenu = '';
$contentTemplatePath = generateBlockTemplatePath('cms/index.phtml');
$rightMenu = '';
require_once generateBlockTemplatePath('page.phtml');
