<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/6 8:33,
 * @LastEditTime: 2024/12/6  8:33,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class WechatServiceProvider extends LaravelServiceProvider
{
    /**
     * 配置文件
     *
     * @Date: 2024/12/6 8:37
     * @Author: ikaijian
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/easywechat_config.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([$source => \config_path('easywechat_config.php')], 'laravel-wechat');
        }

        $this->mergeConfigFrom($source, 'easywechat');
    }

    public function register()
    {
        $this->setupConfig();
    }
}