<?php
/**
 * Created by PhpStorm.
 * User: Marc LAW: zunly@hotmail.com
 * Date: 2019/1/11
 * Time: 14:34
 */

namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;

class SlugTranslateHandler
{

    public function youdaoTranslate($text)
    {
        //q	text	要翻译的文本	True	必须是UTF-8编码
        //from	text	源语言	True	中文	zh-CHS
        //to	text	目标语言	True	英文	EN
        //appKey	text	应用 ID	True	554857ac01f13af4
        //salt	text	随机数	True
        //sign	text	签名，通过md5(appKey+q+salt+应用密钥)生成	True	appKey+q+salt+应用密钥的MD5值
        //应用密钥C8lWIN8BGzNHsV4ZeK5nF85OqAaj8HUu

        // 实例化 HTTP 客户端
        $http = new Client;

        // 初始化配置信息
        $api = 'http://openapi.youdao.com/api?';
        $appKey = '554857ac01f13af4'; //跟百度不同, 有道把id叫key
        $key = 'C8lWIN8BGzNHsV4ZeK5nF85OqAaj8HUu';
        $salt = time();
        $sign = md5($appKey . $text . $salt . $key); //顺序跟百度一样, key+q+随机+密钥

        // 构建请求参数
        $query = http_build_query([
            "q" => $text,
            "from" => "zh-CHS",
            "to" => "EN",
            "appKey" => $appKey,
            "salt" => $salt,
            "sign" => $sign,
        ]);

        // 发送 HTTP Get 请求
        $response = $http->get($api . $query);

        // 转jason为数组
        $result = json_decode($response->getBody(), true);

        // 获取错误码
        $errorCode = $result['errorCode'];

        // 获取翻译结果
        $trans = $result['translation'];

        //return $result;

        // 如果有结果, 就返回, 如果没有, 就返回拼音结果
        if ($errorCode == '0') {
            return str_slug($trans[0]);
        } else {
            return $this->pinyin($text);
        }

        //return $result;
    }

    public function pinyin($text)
    {
        return str_slug(app(Pinyin::class)->permalink($text));
    }
}