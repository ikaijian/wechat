<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:41,
 * @LastEditTime: 2024/12/3  17:41,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Department;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        isset($app['department']) || $app['department'] = function ($app) {
            return new Client($app);
        };
    }
}