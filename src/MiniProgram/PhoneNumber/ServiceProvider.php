<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:24,
 * @LastEditTime: 2024/12/4  8:24,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\PhoneNumber;

use Ikaijian\Wechat\MiniProgram\UrlScheme\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        isset($app['phone_number']) || $app['phone_number'] = function ($app) {
            return new Client($app);
        };
    }
}