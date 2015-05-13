<?php

/**
 * Returns Base URL
 *
 * @return string
 */
function getBaseUrl()
{
    return 'http://' . $_SERVER['SERVER_NAME'];
}

function getCssUrl($name, $theme = 'default-theme')
{
    return getBaseUrl() . '/template/css/' . $theme . '/' . $name . '.css';
}

function getImageUrl($name)
{
    return getBaseUrl() . '/template/image/'. $name;
}
/**
 * Generate url with params
 *
 * @param array $params
 * @return string
 */
function generateUrl(array $params)
{
    $url = getBaseUrl() . '/?';
    $generatedParams = array();

    foreach ($params as $name => $value) {
        $generatedParams[] = $name . '=' . $value;
    }
    $generatedParams = implode('&', $generatedParams);

    return $url . $generatedParams;
}

/**
 * Generates path for Content template
 *
 * @param $path
 * @return string - path
 */
function generateBlockTemplatePath($path)
{
    global $baseDir;
    return $baseDir . "/template/phtml/block/" . $path;
}

function checkVarsBeforeDisplay()
{
    global $headTitle, $headData, $headerData, $contentViewType, $leftMenu, $contentTemplatePath, $rightMenu, $footerData;
    !isset($headTitle) && $headTitle = 'Simple Store';
    $headData = getDefaultHeadData(isset($headData) ? $headData : array());
    !isset($headerData) && $headerData = '';
    !isset($contentViewType) && $contentViewType = 1;
    !isset($leftMenu) && $leftMenu = '';
    !isset($contentTemplatePath) && $contentTemplatePath = '';
    !isset($rightMenu) && $rightMenu = '';
    !isset($footerData) && $footerData = '';
}

/**
 * Adds to head all default js,ccs files.
 *
 * @param array $additional - paths of additional js,css.. files
 * @return string all paths to js, ccs, files in html view
 */
function getDefaultHeadData(array $additional)
{
    $html = '';

    //generate default part:
    $html = '<link rel="stylesheet" type="text/css" href="' . getCssUrl('main') . '"></link>';

    //add additional part:
    $html .= implode (' ',$additional);

    return $html;
}
