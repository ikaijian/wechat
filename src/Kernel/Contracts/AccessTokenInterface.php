<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:15,
 * @LastEditTime: 2024/12/3  17:15,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Kernel\Contracts;

use Psr\Http\Message\RequestInterface;

interface AccessTokenInterface
{
    /**
     * Get access token.
     *
     * @return mixed.
     */
    public function getAccessToken();

    /**
     * Get refresh access token.
     *
     * @return mixed
     * @Date: 2024/12/3 17:31
     * @Author: ikaijian
     */
    public function refresh();

    /**
     * Add apply to request.
     *
     * @param RequestInterface $request
     * @param array $requestOptions
     * @return mixed
     * @Date: 2024/12/3 17:31
     * @Author: ikaijian
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []);
}