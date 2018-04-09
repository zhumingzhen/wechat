<?php
$redis=new Redis();
$redis->connect("127.0.0.1",6379);
$redis_time=7200;//redis失效时间

$access_token = $redis->get('access_token');

if (!$access_tokens) {
	$access_token_json = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx8a215399f1ec961d&secret=2c5a8265fff402a9c91fb8b25cb5ec3b");

	$access_token_arr = json_decode($access_token_json,true);

	$access_token = $access_token_arr['access_token'];

	$redis->set('access_token',$access_token);

	$redis->expire('access_token',$redis_time);
}

//echo $access_token;exit;
//$access_token = "tOGOEuM4rA5swyfnLg6QF3sAFHYaNbZgdaT-mMfE7dYMy_jQJ3hWa0vDULG0l91T3gWIKIBPqE0S6Ud4ykCfsQg1E_0uVVLABgL9B3d0S15TP9Fs5v_bVHUQnS4wWychBMUgAGASDL";

$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
// //https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MjM5MzYwNzc0MQ==&scene=124#wechat_redirect
/*$post_data = '{
     "button":[
        {
           "name":"买装备",
           "sub_button":[
           {    
               "type":"view",
               "name":"APP下载",
               "url":"http://m.yoger.com.cn/yogerapp/app_dyd.html"
            },
            {
               "type":"view",
               "name":"直达商城",
               "url":"http://m.yoger.com.cn/"
            }]
        },
        {
           "name":"我的运动",
           "sub_button":[
           {    
               "type":"view",
               "name":"羽毛球好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=3&sn=2979c6f5fd61256bd19f361442d1a471&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"乒乓球好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=4&sn=8edd5ab213f7e9a061de76ce6435cd5b&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"跑步好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=5&sn=7e13d9213f973e6a51cf098b5226e4dc&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"往期精彩",
               "url":"https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzA5MzEzMDczOA==&scene=124#wechat_redirect"
            }]
        },
        {
           "name":"我是会员",
           "sub_button":[
           {    
               "type":"view",
               "name":"联系客服",
               "url":"http://bj-v1.ntalker.com/downt/t2d/chat.php?v=2017.06.29&siteid=kf_9242&settingid=kf_9242_1463460381172&baseuri=http%3A%2F%2Fdl.ntalker.com%2Fjs%2Fxn6%2F&mobile=1&ref=http%3A%2F%2Fm.yoger.com.cn%2F&tit=%E4%BC%98%E4%B8%AA%E7%BD%91_%E8%BF%90%E5%8A%A8%E6%88%B7%E5%A4%96%E4%B8%93%E4%B8%9A%E5%95%86%E5%9F%8E%EF%BC%88%E7%BE%BD%E6%AF%9B%E7%90%83%2C%E4%B9%92%E4%B9%93%E7%90%83%2C%E7%BD%91%E7%90%83%2C%E6%88%B7%E5%A4%96%E7%94%A8%E5%93%81%2C%E8%BF%90%E5%8A%A8%E8%A3%85%E5%A4%87%EF%BC%89&iframechat=0&header=1&rnd=1500982147139"
            },
            {
               "type":"view",
               "name":"查询订单",
               "url":"http://m.yoger.com.cn/myorder.php"
            },
            {
               "type":"view",
               "name":"优个故事",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=7&sn=4d434946a6f1403d71699cd513d19152&scene=18#wechat_redirect"
            }]
       }]
 }';*/

$post_data = '{
     "button":[
        {
           "name":"购装备",
           "type":"view",
           "url":"http://m.yoger.com.cn"
        },
        {
           "name":"APP下载",
           "sub_button":[
           {    
               "type":"view",
               "name":"羽毛球好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=3&sn=2979c6f5fd61256bd19f361442d1a471&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"乒乓球好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=4&sn=8edd5ab213f7e9a061de76ce6435cd5b&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"跑步好文",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=5&sn=7e13d9213f973e6a51cf098b5226e4dc&scene=18#wechat_redirect"
            },
            {
               "type":"view",
               "name":"往期精彩",
               "url":"https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzA5MzEzMDczOA==&scene=124#wechat_redirect"
            },
            {
               "type":"view",
               "name":"APP下载",
               "url":"http://m.yoger.com.cn/yogerapp/app_dyd.html"
            }]
        },
        {
           "name":"我是会员",
           "sub_button":[
           {    
               "type":"view",
               "name":"联系客服",
               "url":"http://bj-v1.ntalker.com/downt/t2d/chat.php?v=2017.06.29&siteid=kf_9242&settingid=kf_9242_1463460381172&baseuri=http%3A%2F%2Fdl.ntalker.com%2Fjs%2Fxn6%2F&mobile=1&ref=http%3A%2F%2Fm.yoger.com.cn%2F&tit=%E4%BC%98%E4%B8%AA%E7%BD%91_%E8%BF%90%E5%8A%A8%E6%88%B7%E5%A4%96%E4%B8%93%E4%B8%9A%E5%95%86%E5%9F%8E%EF%BC%88%E7%BE%BD%E6%AF%9B%E7%90%83%2C%E4%B9%92%E4%B9%93%E7%90%83%2C%E7%BD%91%E7%90%83%2C%E6%88%B7%E5%A4%96%E7%94%A8%E5%93%81%2C%E8%BF%90%E5%8A%A8%E8%A3%85%E5%A4%87%EF%BC%89&iframechat=0&header=1&rnd=1500982147139"
            },
            {
               "type":"view",
               "name":"查询订单",
               "url":"http://m.yoger.com.cn/myorder.php"
            },
            {
               "type":"view",
               "name":"优个故事",
               "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MjM5MzYwNzc0MQ==&hid=7&sn=4d434946a6f1403d71699cd513d19152&scene=18#wechat_redirect"
            }]
       }]
 }';


echo post($url,$post_data);

function post($url, $post_data = '', $timeout = 5){//curl
 
    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);

    curl_setopt ($ch, CURLOPT_POST, 1);

    if($post_data != ''){

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    }

    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 

    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

    curl_setopt($ch, CURLOPT_HEADER, false);

    $file_contents = curl_exec($ch);

    curl_close($ch);

    return $file_contents;

}
