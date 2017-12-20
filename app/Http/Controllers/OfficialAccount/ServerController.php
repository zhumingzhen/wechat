<?php


namespace App\Http\Controllers\OfficialAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages;

class ServerController extends Controller
{
    public function index()
    {
        $config = [
            'app_id' => 'wxe6bd61546e337818',
            'secret' => 'a4c7347a2500c0e76d806f6c463dd0db',
            'aes_key' => 'tOihYdEo0SRv0b6RrkxjxIRjxKM8uCe5xrEevtCDhJf',
            'token' => 'yinxce',
            'log' => [
                'level' => 'debug',
                'file' => storage_path() . '/logs/wechat.log',
            ],
        ];

        $app = Factory::officialAccount($config);

        $app->server->push(function ($message) use ($app)[
            $user = $app->user->get($message['FromUserName']);
            return '你好!'.$user['nickname'].'你说了一句'.$message['Content'];
        ]);

        $response = $app->server->serve();

        return $response;

    }
}
//        $menu = [
//                    [
//                        "name"=>"扫码",
//                        "sub_button"=> [
//                            [
//                                "type"=> "scancode_waitmsg",
//                                "name"=> "扫码带提示",
//                                "key"=> "rselfmenu_0_0",
//                                "sub_button"=> [ ]
//                            ],
//                            [
//                                "type"=> "scancode_push",
//                                "name"=> "扫码推事件",
//                                "key"=> "rselfmenu_0_1",
//                                "sub_button"=> [ ]
//                            ]
//                        ]
//                    ],
//                    [
//                        "name"=> "发图",
//                        "sub_button"=> [
//                            [
//                                "type"=> "pic_sysphoto",
//                                "name"=> "系统拍照发图",
//                                "key"=> "rselfmenu_1_0",
//                               "sub_button"=> [ ]
//                             ],
//                            [
//                                "type"=> "pic_photo_or_album",
//                                "name"=> "拍照或者相册发图",
//                                "key"=> "rselfmenu_1_1",
//                                "sub_button"=> [ ]
//                            ],
//                            [
//                                "type"=> "pic_weixin",
//                                "name"=> "微信相册发图",
//                                "key"=>"rselfmenu_1_2",
//                                "sub_button"=> [ ]
//                            ]
//                        ]
//                    ],
//                    [
//                        "name"=> "发送位置",
//                        "type"=> "location_select",
//                        "key"=> "rselfmenu_2_0"
//                    ]
//                ];
//
//        $response = $app->menu->create($menu);