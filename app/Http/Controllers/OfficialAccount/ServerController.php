<?php


namespace App\Http\Controllers\OfficialAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;

class ServerController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $config = [
            'app_id' => 'wx9d25fceff6d170a4',
            'secret' => 'ed6e18820efb9cd34c85aaab253d0633',
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
