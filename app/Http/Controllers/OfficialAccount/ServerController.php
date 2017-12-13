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
            'secret' => '5950e505a3b38df6225d02e4f6fcc91a',
            'aes_key' => 'tOihYdEo0SRv0b6RrkxjxIRjxKM8uCe5xrEevtCDhJf',
            'token' => 'yinxce',
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
