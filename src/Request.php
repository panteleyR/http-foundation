<?php

declare(strict_types=1);

namespace Lilith\HttpFoundation;

class Request
{
    public static function createFromGlobals()
    {
//        $request = self::createRequestFromFactory($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
//
//        if (str_starts_with($request->headers->get('CONTENT_TYPE', ''), 'application/x-www-form-urlencoded')
//            && \in_array(strtoupper($request->server->get('REQUEST_METHOD', 'GET')), ['PUT', 'DELETE', 'PATCH'])
//        ) {
//            parse_str($request->getContent(), $data);
//            $request->request = new InputBag($data);
//        }
//
//        return $request;
    }
}
