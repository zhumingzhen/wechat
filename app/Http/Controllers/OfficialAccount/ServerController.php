<?php

namespace App\Http\Controllers\OfficialAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;

class ServerController extends Controller
{
    public function index()
    {
        $config = [
          'app_id' => 'wxe6bd61546e337818',
          'seccret' => '1a6c491ccf0e0bb41641d0cfaec6e128',
          'token' => 'yinxce'
        ];

        $app = Factory::officialAccount($config);

        $app->server->push(function ($message){
            return '你好!';
        });
        $response = $app->server->serve();

        return $response;
    }
}
