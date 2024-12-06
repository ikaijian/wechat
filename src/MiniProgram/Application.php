<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 18:10,
 * @LastEditTime: 2024/12/3  18:10,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram;

use Ikaijian\Wechat\Kernel\Support\ServiceContainer;

class Application extends ServiceContainer
{
    protected $providers = [
        Auth\ServiceProvider::class,
        AppCode\ServiceProvider::class,
        PhoneNumber\ServiceProvider::class,
        SubscribeMessage\ServiceProvider::class,
        UrlScheme\ServiceProvider::class,
        UrlLink\ServiceProvider::class,
        ShortLink\ServiceProvider::class,
    ];
}