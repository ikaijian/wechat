<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 18:06,
 * @LastEditTime: 2024/12/3  18:06,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\OfficialAccount\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        !isset($app['access_token']) && $app['access_token'] = function ($app) {
            return new AccessToken($app);
        };
    }
}