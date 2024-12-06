<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:38,
 * @LastEditTime: 2024/12/3  17:38,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work;

use Ikaijian\Wechat\Kernel\Support\ServiceContainer;

class Application extends ServiceContainer
{
    protected $providers = [
        Auth\ServiceProvider::class,
        OA\ServiceProvider::class,
        OAuth\ServiceProvider::class,
        User\ServiceProvider::class,
        Department\ServiceProvider::class,
        Tag\ServiceProvider::class,
        Jssdk\ServiceProvider::class,
        Message\ServiceProvider::class,
        GroupRobot\ServiceProvider::class
    ];

    protected $defaultConfig = [
        'http' => [
            'base_uri' => 'https://qyapi.weixin.qq.com/',
        ]
    ];
}