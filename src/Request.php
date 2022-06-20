<?php

declare(strict_types=1);

namespace Lilith\HttpFoundation;

use Lilith\Http\HttpMethodsEnum;
use Lilith\Http\Message\RequestInterface;
use Lilith\Http\Message\Request as NativeRequest;

class Request
{
    protected static function getRequestHeaders(): array
    {
        $headers = [];
        foreach($_SERVER as $key => $value) {
            if (!str_starts_with($key, 'HTTP_')) {
                continue;
            }

            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }

        return $headers;
    }

    public static function createFromGlobals(): RequestInterface
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $headers = static::getRequestHeaders();
        $uri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $body = file_get_contents('php://input');
        unset($_SERVER['HTTPS']);

        return new NativeRequest(HttpMethodsEnum::from($method), $uri, $headers, $body);
    }
}
