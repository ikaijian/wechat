<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:20,
 * @LastEditTime: 2024/12/3  17:20,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Kernel\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Config extends Collection
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
        parent::__construct($items);
    }

    public function set($key, $value)
    {
        Arr::set($this->items, $key, $value);
    }

    public function get($key, $default = null)
    {
        return Arr::get($this->items, $key, $default);
    }

    public function forget($key)
    {
        Arr::forget($this->items, $key);
    }

    public function toJson($option = JSON_UNESCAPED_UNICODE)
    {
        return json_encode($this->all(), $option);
    }

    public function toArray()
    {
        return $this->all();
    }
}