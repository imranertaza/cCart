<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\Exceptions\BadRequestException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CustomInvalidChars implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //Blocked characters (customize)
        $pattern = '/[<>{}[\]"\'`;|\\\\^]/';

        //Query string (GET)
        foreach ($request->getGet() as $key => $value) {
            if (preg_match($pattern, (string) $value)) {
                return service('response')->setStatusCode(429);
            }
        }

        //POST / FORM
        foreach ($request->getPost() as $key => $value) {
            if (preg_match($pattern, (string) $value)) {
                return service('response')->setStatusCode(429);
            }
        }

        //JSON body (API)
        $json = $request->getJSON(true);

        if (is_array($json)) {
            array_walk_recursive($json, function ($val) use ($pattern) {
                if (preg_match($pattern, (string) $val)) {
                    throw new BadRequestException('Invalid characters detected (JSON)');
                }
            });
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing
    }
}
