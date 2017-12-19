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
            'secret' => 'a4c7347a2500c0e76d806f6c463dd0db',
            'token' => 'yinxce',
            'response_type'=>'collection',
            'log' => [
                'level' => 'debug',
                'file' => storage_path().'/logs/wechat.log',
            ],
        ];

        $app = Factory::officialAccount($config);

        $app->server->push(function ($message){
            return '你好!';
        });

        $response = $app->server->serve();

        return $response;
    }
}
