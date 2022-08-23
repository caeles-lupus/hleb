<?php

namespace App\Middleware\Before;

class DefaultMiddlewareBefore extends \MainMiddleware
{
    public function index() {
        $content = file_get_contents('php://input');
        $req = json_decode($content);

        if (!isset($req) || !key_exists("jsonrpc", $req) ||
        !key_exists("method", $req) || !key_exists("params", $req) ||
            !key_exists("id", $req)) {
            redirect(getUrlByName('404'));
            return false;
        };

//        $json_resp = json_encode(["jsonrpc" => "2.0", "error" => ["code" => 666,
//            "message" => "Request is bad"], "id" => "0"]);
    }

}

