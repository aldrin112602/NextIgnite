<?php

namespace App\Helpers;

class UriHelper
{

    /**
 * This function extracts parameters from a given URI.
 *
 * @param string $uri The URI from which to extract parameters.
 * @return array An associative array containing the extracted parameters.
 *
 * @throws \Exception If the provided URI is not valid.
 */
public static function getParams($uri)
{
    if (!filter_var($uri, FILTER_VALIDATE_URL)) {
        throw new \Exception('Invalid URI');
    }

    $params = parse_url($uri, PHP_URL_QUERY);
    parse_str($params, $paramsArray);
    return $paramsArray;
}

    /**
 * This function removes parameters from a given URI.
 *
 * @param string $uri The URI from which to remove parameters.
 * @return string The URI without any parameters.
 * 
 *
 */
public static function removeParams($uri)
{
    
    $parsedUrl = parse_url($uri);
    $url = $parsedUrl['path'];
    return $url;
}
}
