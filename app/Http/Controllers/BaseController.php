<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function response(array $data , array $error = null , $code = 200 , $status = "success")
    {
        $result = [
            "data"   => $data ,
            "error"  => $error ,
            "status" => $status ,
            "code"   => $code ,
        ];
        return response()->json($result);
    }

    public function created()
    {
        $result = [
            "data"   => [] ,
            "error"  => "false" ,
            "status" => "success" ,
            "code"   => 201 ,
        ];
        return response()->json($result);
    }

    public function notFound()
    {
        $result = [
            "data"   => [] ,
            "error"  => "notFound" ,
            "status" => "false" ,
            "code"   => 404 ,
        ];
        return response()->json($result);
    }

    public function noContent()
    {
        $result = [
            "data"   => [] ,
            "error"  => "noContent" ,
            "status" => "success" ,
            "code"   => 204 ,
        ];
        return response()->json($result);
    }
}
