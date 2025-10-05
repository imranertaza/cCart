<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MinifyHtml implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Nothing to do before
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Only minify HTML responses
        $contentType = $response->getHeaderLine('Content-Type');

        if (strpos($contentType, 'text/html') === false) {
            return $response;
        }

        $output = $response->getBody();

        // ---- Remove HTML comments (except IE conditionals) ----
        $output = preg_replace('/<!--(?!\[if).*?-->/', '', $output);

        // ---- Minify inline CSS ----
        $output = preg_replace_callback('/<style\b[^>]*>(.*?)<\/style>/is', function ($matches) {
            $css = $matches[1];
            // Remove comments, newlines, tabs, and extra spaces
            $css = preg_replace('!/\*.*?\*/!s', '', $css);
            $css = preg_replace('/\n|\r|\t/', '', $css);
            $css = preg_replace('/\s{2,}/', ' ', $css);
            $css = preg_replace('/\s*([:;{},])\s*/', '$1', $css);
            $css = str_replace(';}', '}', $css);
            return '<style>' . trim($css) . '</style>';
        }, $output);

        // ---- Minify inline JavaScript ----
        $output = preg_replace_callback('/<script\b[^>]*>(.*?)<\/script>/is', function ($matches) {
            $js = $matches[1];
            // Remove comments
            $js = preg_replace('/\/\/[^\n\r]*/', '', $js);
            $js = preg_replace('!/\*.*?\*/!s', '', $js);
            // Remove newlines, tabs, extra spaces
            $js = preg_replace('/\n|\r|\t/', '', $js);
            $js = preg_replace('/\s{2,}/', ' ', $js);
            return '<script>' . trim($js) . '</script>';
        }, $output);

        // ---- Minify HTML structure ----
        $output = preg_replace('/>\s+</', '><', $output);  // Remove spaces between tags
        $output = preg_replace('/\s{2,}/', ' ', $output);  // Collapse multiple spaces
        $output = preg_replace('/\n|\r/', '', $output);    // Remove line breaks

        $response->setBody($output);
        return $response;
    }
}
