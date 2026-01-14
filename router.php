<?php
/**
 * Router script for PHP built-in server
 * Simulates Apache .htaccess URL rewriting
 */

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Remove leading slash
$path = ltrim($path, '/');

// If empty path, serve index.php
if ($path === '' || $path === '/') {
    require 'index.php';
    return;
}

// Check if the requested file exists
if (file_exists($path)) {
    // Let the server handle existing files (CSS, JS, images, etc.)
    return false;
}

// Check if directory exists
if (is_dir($path)) {
    return false;
}

// Try to find a PHP file with the given name
$phpFile = $path . '.php';

if (file_exists($phpFile)) {
    // Preserve query string
    if ($query) {
        $_SERVER['QUERY_STRING'] = $query;
        parse_str($query, $_GET);
    }
    require $phpFile;
    return;
}

// If nothing matches, return 404
http_response_code(404);
echo "404 - Page Not Found";
