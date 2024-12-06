<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 18:05,
 * @LastEditTime: 2024/12/3  18:05,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\OfficialAccount\Auth;

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
