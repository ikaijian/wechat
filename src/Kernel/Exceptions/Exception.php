<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:17,
 * @LastEditTime: 2024/12/3  17:17,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Kernel\Exceptions;

class Exception extends \Exception
{
    public $raw = [];

    public function __construct($message, $code = 40001, $raw = [])
    {
        $this->raw = is_array($raw) ? $raw : [];

        parent::__construct($message, (int)$code);
    }

}