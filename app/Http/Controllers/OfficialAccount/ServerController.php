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
            'app_id' => 'wxddb850a3ccde494a',
            'secret' => 'b52217e68b0f518f56bb9f0589ef4328',
            'aes_key' => 'tOihYdEo0SRv0b6RrkxjxIRjxKM8uCe5xrEevtCDhJf',
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

        dd($app);

        $response = $app->server->serve();

        return $response;
    }
}
