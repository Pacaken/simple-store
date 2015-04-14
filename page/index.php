<?php
/**
 * This is main page.
 */
//here starts part of code for preparing data for view
$wlcMessage = 'Hello!';
$extPageLink = generateUrl( array('page'=>'sample', 'other_sample_parameter' =>'sample') );
$nonExtPageLink = generateUrl( array('page'=>'not_exist_sample_page') );

//here we output data by phtml template
require_once ($baseDir . '/template/phtml/index.phtml');
