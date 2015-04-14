<?php
/**
 * This is 404 page.
 */
//here starts part of code for preparing data for view 
$mainMessage = 'Requested page didn\'t exist!';

//here we output data by phtml template
require_once ($baseDir . '/template/phtml/404.phtml');