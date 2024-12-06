<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:40,
 * @LastEditTime: 2024/12/3  17:40,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Auth;

use Ikaijian\Wechat\Kernel\Support\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    protected $endpointToGetToken = 'cgi-bin/gettoken';

    /**
     * Credential for get token. 实现父类的抽象方法
     *
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'corpid' => $this->app['config']['corp_id'],
            'corpsecret' => $this->app['config']['secret'],
        ];
    }
}