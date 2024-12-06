<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\UrlScheme;

use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    /**
     * 获取小程序scheme码
     *
     * @param array $params
     * @return mixed|ResponseInterface
     */
    public function generate(array $params = [])
    {
        return $this->httpPostJson('wxa/generatescheme', $params);
    }
}