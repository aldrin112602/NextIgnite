<?php

require '../vendor/autoload.php';

use App\Helpers\UriHelper;


function extractRoute($basePath)
{
    if (substr($basePath, -1) !== '/') $basePath .= '/';
    $route = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
    $routeParts = array_filter(explode('/', $route));
    if (count($routeParts) == 0) $routeParts[] = '';
    return $routeParts;
}

$basePath = '/' . array_filter(explode('/', $_SERVER['REQUEST_URI']))[1] . '/';
$routeParts = extractRoute($basePath);
$uri = '/' . UriHelper::removeParams($routeParts[count($routeParts) - 1]);

// import router here
require_once '../app/routes/web.php';

$router->dispatch($uri);
