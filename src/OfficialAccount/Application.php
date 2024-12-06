<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 18:03,
 * @LastEditTime: 2024/12/3  18:03,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\OfficialAccount;

use Ikaijian\Wechat\Kernel\Support\ServiceContainer;

class Application  extends ServiceContainer
{
    protected $providers = [
        Auth\ServiceProvider::class,
        Jssdk\ServiceProvider::class,
    ];
}