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