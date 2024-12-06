<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:51,
 * @LastEditTime: 2024/12/3  17:51,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Message;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        isset($app['message']) || $app['message'] = function ($app) {
            $message = new Client($app);

            if (is_numeric($app['config']['agent_id'])) {
                $message->ofAgent($app['config']['agent_id']);
            }

            return $message;
        };
    }
}