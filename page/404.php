<?php
/**
 * This is 404 page.
 */
//here starts part of code for preparing data for view
$contentTitle = 'OOPS!';
$mainMessage = '404 Page not found. You might want to check that URL again or head over to our <a href="/">homepage</a>.';

$headTitle = '404 Page not found';
$contentViewType = '2l';
$contentTemplatePath = generateBlockTemplatePath('cms/404.phtml');

require_once generateBlockTemplatePath('page.phtml');
