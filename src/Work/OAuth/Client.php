<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:55,
 * @LastEditTime: 2024/12/3  17:55,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\OAuth;

use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Client extends BaseClient
{
    protected $endpointToGetUser = 'cgi-bin/user/getuserinfo';

    /**
     * @param $callbackUrl
     * @return RedirectResponse
     */
    public function redirect($callbackUrl)
    {
        $queries = [
            'appid' => $this->app['config']['corp_id'],
            'redirect_uri' => $callbackUrl,
            'response_type' => 'code',
            'scope' => $this->app['config']->get('oauth.scope') ?? 'snsapi_base',
            'state' => $this->app['config']->get('oauth.state') ?? 'state'
        ];

        $url = sprintf('https://open.weixin.qq.com/connect/oauth2/authorize?%s#wechat_redirect', http_build_query($queries));

        // 返回一个 redirect 实例
        return new RedirectResponse($url);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function user($code)
    {
        return $this->httpGet($this->endpointToGetUser, ['code' => $code]);
    }
}