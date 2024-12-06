<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\UrlLink;

use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    /**
     *  获取小程序 URL Link
     *
     * @param array $param
     * @return mixed|ResponseInterface
     */
    public function generate(array $param = [])
    {
        return $this->httpPostJson('wxa/generate_urllink', $param);
    }
}