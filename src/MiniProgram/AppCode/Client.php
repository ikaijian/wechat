<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\AppCode;

use Ikaijian\Wechat\Kernel\Exceptions\InvalidArgumentException;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class Client extends BaseClient
{
    /**
     * 小程序码
     * @param string $path
     * @param array $optional
     * @return string
     */
    public function get(string $path, array $optional = [])
    {
        $params = array_merge([
            'path' => $path,
        ], $optional);

        return $this->getStream('wxa/getwxacode', $params);
    }

    /**
     * @param string $scene
     * @param array $optional
     * @return string
     */
    public function getUnlimit(string $scene, array $optional = [])
    {
        $params = array_merge([
            'scene' => $scene,
        ], $optional);

        return $this->getStream('wxa/getwxacodeunlimit', $params);
    }

    /**
     * 小程序二维码
     *
     * @param string $path
     * @param int|null $width
     * @return string
     */
    public function getQrCode(string $path, int $width = null)
    {
        return $this->getStream('cgi-bin/wxaapp/createwxaqrcode', compact('path', 'width'));
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return mixed|string
     */
    protected function getStream(string $endpoint, array $params)
    {
        $response = $this->request($endpoint, 'POST', ['json' => $params], true);

        if (false !== stripos($response->getHeaderLine('Content-disposition'), 'attachment')) {
            return $response->getBody()->getContents();
        }

        return $this->response($response);
    }
}