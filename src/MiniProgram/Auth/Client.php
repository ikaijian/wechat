<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\Auth;

use Ikaijian\Wechat\Kernel\Exceptions\InvalidArgumentException;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class Client extends BaseClient
{
    /**
     * auth.code2Session
     *
     * @param $code
     * @return mixed
     */
    public function session($code)
    {
        $params = [
            'appid' => $this->app['config']['app_id'],
            'secret' => $this->app['config']['secret'],
            'js_code' => $code,
            'grant_type' => 'authorization_code',
        ];

        return $this->httpGet('sns/jscode2session', $params);
    }
}