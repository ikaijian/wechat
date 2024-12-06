<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:41,
 * @LastEditTime: 2024/12/4  8:41,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\Auth;

use Ikaijian\Wechat\Kernel\Support\AccessToken as BaseAccessToken;
class AccessToken extends BaseAccessToken
{
    protected $endpointToGetToken = 'cgi-bin/token';

    /**
     * Credential for get token. 实现父类的抽象方法
     *
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'grant_type' => 'client_credential',
            'appid' => $this->app['config']['app_id'],
            'secret' => $this->app['config']['secret'],
        ];
    }
}