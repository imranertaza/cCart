<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MinifyHtml implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $contentType = $response->getHeaderLine('Content-Type');

        if (strpos($contentType, 'text/html') === false) {
            return $response;
        }

        $output = $response->getBody();

        // Remove HTML comments (except IE conditionals)
        $output = preg_replace('/<!--(?!\[if).*?-->/', '', $output);

        // Minify inline CSS
        $output = preg_replace_callback('/<style\b[^>]*>(.*?)<\/style>/is', function ($matches) {
            $css = $matches[1];
            $css = preg_replace('!/\*.*?\*/!s', '', $css);
            $css = preg_replace('/\s+/', ' ', $css);
            $css = preg_replace('/\s*([:;{},])\s*/', '$1', $css);
            $css = str_replace(';}', '}', $css);
            return '<style>' . trim($css) . '</style>';
        }, $output);

        // Minify inline JavaScript safely
        $output = preg_replace_callback('/<script\b[^>]*>(.*?)<\/script>/is', function ($matches) {
            $js = $matches[1];
            $js = preg_replace('/\s+/', ' ', $js);
            return '<script>' . trim($js) . '</script>';
        }, $output);

        // Minify HTML structure
        $output = preg_replace('/>\s+</', '><', $output);
        $output = preg_replace('/\s{2,}/', ' ', $output);
        $output = preg_replace('/\n|\r/', '', $output);

        $response->setBody($output);
        return $response;
    }
}
