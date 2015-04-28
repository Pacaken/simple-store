<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sergey
 * Date: 4/14/15
 * Time: 3:03 PM
 * To change this template use File | Settings | File Templates.
 */
$data = 'sample page';
$contentTemplatePath = generateBlockTemplatePath('cms/sample.phtml');
require_once generateBlockTemplatePath('page.phtml');
