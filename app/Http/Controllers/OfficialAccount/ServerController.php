<?php


namespace App\Http\Controllers\OfficialAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;

class ServerController extends Controller
{
    private $app;
    public function __construct()
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

        $this->app = Factory::officialAccount($config);
    }

    public function index()
    {

        $app = $this->app;
        $app->server->push(function ($message) use ($app) {
            $user = $app->user->get($message['FromUserName']);
            switch ($message['MsgType']) {
                case 'event':
                    if ($message['MsgType']['Event'] == 'subscribe'){
                        return "感谢您关注【卓锦苏州】"."\n"."微信号：zhuojinsz"."\n"."卓越锦绣，名城苏州，我们为您提供苏州本地生活指南，苏州相关信息查询，做最好的苏州微信平台。"."\n"."目前平台功能如下："."\n"."【1】 查天气，如输入：苏州天气"."\n"."【2】 查公交，如输入：苏州公交178"."\n"."【3】 翻译，如输入：翻译I love you"."\n"."【4】 苏州信息查询，如输入：苏州观前街"."\n"."更多内容，敬请期待...";
                    }
                    return '收到事件消息';
                    break;
                case 'text':
                    return '你好!' . $user['nickname'] . '你说了一句' . $message['Content'];
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

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