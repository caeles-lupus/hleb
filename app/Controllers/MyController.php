<?php
namespace App\Controllers;
class MyController extends \MainController
{
    function index(): array
    {
        $content = file_get_contents('php://input');
        $req = json_decode($content);

        $id = $req->id;
        if (empty($id)) $id = 0;
        $MySQLTime = date("H:i:s");
        $UnixTime = date('U');
        $data = ["SQLTimeNOW" => $MySQLTime, "UnixTime" => $UnixTime];
        $json_resp = json_encode(["jsonrpc" => "2.0", "result" => $data, "id" => $id]);
        return view('/MyView', ['resp' => $json_resp]);
    }
}

