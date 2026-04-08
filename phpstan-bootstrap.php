<?php
// Define missing constants
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'development');
}
if (!defined('APPPATH')) {
    define('APPPATH', __DIR__ . '/app/');
}
if (!defined('BASEPATH')) {
    define('BASEPATH', __DIR__ . '/system/');
}

// Define stubs for CodeIgniter functions used in views/helpers
if (!function_exists('base_url')) {
    function base_url(string $uri = ''): string {
        return 'http://localhost/' . ltrim($uri, '/');
    }
}


require __DIR__ . '/system/Helpers/url_helper.php';
