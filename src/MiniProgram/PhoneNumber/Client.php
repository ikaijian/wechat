<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\PhoneNumber;

use Ikaijian\Wechat\Kernel\Exceptions\InvalidArgumentException;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class Client extends BaseClient
{
    /**
     * @param $code
     * @return mixed
     */
    public function getUserPhoneNumber($code)
    {
        $params = [
            'code' => $code
        ];

        return $this->httpPostJson('wxa/business/getuserphonenumber', $params);
    }
}