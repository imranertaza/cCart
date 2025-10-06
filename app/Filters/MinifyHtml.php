<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MinifyHtml implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // nothing before
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $contentType = $response->getHeaderLine('Content-Type');

        if (strpos($contentType, 'text/html') === false) {
            return $response;
        }

        $output = $response->getBody();

        // Remove HTML comments (except IE)
        $output = preg_replace('/<!--(?!\[if).*?-->/', '', $output);

        // Minify inline CSS safely
        $output = preg_replace_callback('/<style\b[^>]*>(.*?)<\/style>/is', function ($matches) {
            $css = $matches[1];
            $css = preg_replace('!/\*.*?\*/!s', '', $css);
            $css = preg_replace('/\s+/', ' ', $css);
            $css = preg_replace('/\s*([:;{},])\s*/', '$1', $css);
            $css = str_replace(';}', '}', $css);
            return '<style>' . trim($css) . '</style>';
        }, $output);

        // ❌ Skip JS minify — too risky for inline scripts


        // Minify HTML structure only
        $output = preg_replace('/>\s+</', '><', $output); // remove spaces between tags

        // Remove spaces before/after tags
        $output = preg_replace(['/\>[^\S ]+/s', '/[^\S ]+\</s'], ['>', '<'], $output);


        $response->setBody($output);
        return $response;
    }
}
