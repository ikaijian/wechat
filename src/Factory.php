<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:08,
 * @LastEditTime: 2024/12/3  17:08,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat;

use Ikaijian\Wechat\Kernel\Exceptions\Exception;

class Factory
{
    /**
     * 构建实例
     *
     * @param $method
     * @param array $arguments
     * @return mixed
     * @throws Exception
     * @Date: 2024/12/4 9:05
     * @Author: ikaijian
     */
    public static function make($method, array $arguments)
    {
        // 获取被调用的静态方法的名称
        $method = strtolower($method);

        // 构建目标类的命名空间
        $namespace = \Illuminate\Support\Str::studly($method);
        $application = "\\ikaijian\\Wechat\\{$namespace}\\Application";
        if (!class_exists($application)) {
            throw new Exception("Class {$application} does not exist.", 40004);
        }

        // 实例化目标类 返回实例
        return new $application(...$arguments);
    }

    /**
     * 魔术方法
     *
     * @param $method
     * @param $arguments
     * @return mixed
     * @Date: 2024/12/4 8:53
     * @Author: ikaijian
     * @throws Exception
     */
    public static function __callStatic($method, $arguments)
    {
        return self::make($method, ...$arguments);
    }
}