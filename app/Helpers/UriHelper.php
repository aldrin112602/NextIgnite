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
    // Check if the provided URI is valid
    if (!filter_var($uri, FILTER_VALIDATE_URL)) {
        throw new \Exception('Invalid URI');
    }

    // Extract the query string from the URI
    $params = parse_url($uri, PHP_URL_QUERY);

    // Parse the query string into an associative array
    parse_str($params, $paramsArray);

    // Return the associative array of parameters
    return $paramsArray;
}


    /**
 * This function removes parameters from a given URI.
 *
 * @param string $uri The URI from which to remove parameters.
 * @return string The URI without any parameters.
 *
 * @throws \Exception If the provided URI is not valid.
 */
public static function removeParams($uri)
{
    // Parse the provided URI into its components
    $parsedUrl = parse_url($uri);

    // Extract the path component from the parsed URL
    $url = $parsedUrl['path'];

    // Return the URI without any parameters
    return $url;
}
}
