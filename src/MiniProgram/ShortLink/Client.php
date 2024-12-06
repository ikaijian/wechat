<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\ShortLink;

use Ikaijian\Wechat\Kernel\Exceptions\InvalidArgumentException;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class Client extends BaseClient
{
    /**
     * 获取小程序 Short Link
     *
     * @param string $pageUrl
     * @param string $pageTitle
     * @param bool $isPermanent
     * @return mixed|ResponseInterface
     */
    public function getShortLink(string $pageUrl, string $pageTitle, bool $isPermanent = false)
    {
        $params = [
            'page_url' => $pageUrl,
            'page_title' => $pageTitle,
            'is_permanent' => $isPermanent,
        ];

        return $this->httpPostJson('wxa/genwxashortlink', $params);
    }
}