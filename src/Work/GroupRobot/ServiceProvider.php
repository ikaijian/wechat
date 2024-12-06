<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:43,
 * @LastEditTime: 2024/12/3  17:43,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\GroupRobot;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        isset($app['group_robot']) || $app['group_robot'] = function ($app) {
            return new Client($app);
        };
    }
}