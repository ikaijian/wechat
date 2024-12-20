<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:47,
 * @LastEditTime: 2024/12/3  17:47,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Jssdk;

use Ikaijian\Wechat\Kernel\Contracts\AccessTokenInterface;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Ikaijian\Wechat\Kernel\Support\ServiceContainer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Client extends BaseClient
{
    protected $url;
    protected $nonceStr;
    protected $timestamp;
    protected $ticketEndpoint = 'cgi-bin/get_jsapi_ticket';

    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken = null)
    {
        parent::__construct($app, $accessToken);

        $this->url = $this->currentUrl();
        $this->nonceStr = Str::random(16);
        $this->timestamp = time();
    }

    /**
     * @return array
     */
    public function getCompanyConfigArray()
    {
        $conf = [
            'appId' => $this->getAppId(),
            'nonceStr' => $this->nonceStr,
            'timestamp' => $this->timestamp,
            'url' => $this->url,
            'signature' => $this->getTicketSignature($this->getCompanyTicket()['ticket'], $this->nonceStr, $this->timestamp, $this->url),
        ];

        $merge = ['beta' => true, 'debug' => true, 'jsApiList' => []];

        $config = array_merge($merge, $conf);

        return $config;
    }

    /**
     * @return array
     */
    public function getAgentConfigArray()
    {
        $conf = [
            'corpid' => $this->getAppId(),
            'agentid' => $this->getAgentId(),
            'nonceStr' => $this->nonceStr,
            'timestamp' => $this->timestamp,
            'url' => $this->url,
            'signature' => $this->getTicketSignature($this->getAgentTicket()['ticket'], $this->nonceStr, $this->timestamp, $this->url),
        ];

        $merge = ['beta' => true, 'debug' => true, 'jsApiList' => []];

        $config = array_merge($merge, $conf);

        return $config;
    }

    /**
     * @param bool $refresh
     * @param string $type
     * @return mixed
     */
    public function getCompanyTicket(bool $refresh = false, string $type = 'config')
    {
        $cacheKey = sprintf('wechat.jssdk.ticket.%s.%s', $type, $this->getAppId());

        if (!$refresh && Cache::has($cacheKey) && $result = Cache::get($cacheKey)) {
            return $result;
        }

        $result = $this->httpGet($this->ticketEndpoint, []);

        Cache::put($cacheKey, $result, $result['expires_in'] - 500);

        return $result;
    }

    /**
     * @param bool $refresh
     * @param string $type
     * @return mixed
     */
    public function getAgentTicket($refresh = false, $type = 'agent_config')
    {
        $agentId = $this->getAgentId();

        $cacheKey = sprintf('wechat.jssdk.ticket.%s.%s.%s', $agentId, $type, $this->getAppId());

        if (!$refresh && Cache::has($cacheKey) && $result = Cache::get($cacheKey)) {
            return $result;
        }

        $result = $this->httpGet($this->ticketEndpoint, ['type' => $type]);

        Cache::put($cacheKey, $result, $result['expires_in'] - 500);

        return $result;
    }

    /***
     * @param $operator_userid
     * @param $userid
     * @return mixed
     */
    public function getLaunchCode($operator_userid, $userid)
    {
        $params = [
            'operator_userid' => $operator_userid,
            'single_chat' => [
                'userid' => $userid
            ]
        ];

        return $this->httpPostJson('cgi-bin/get_launch_code', $params);
    }

    protected function getAppId()
    {
        return $this->app['config']->get('corp_id');
    }

    protected function getAgentId()
    {
        return $this->app['config']->get('agent_id');
    }

    protected function currentUrl()
    {
        $protocol = 'http://';

        if ((!empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS']) || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'http') === 'https') {
            $protocol = 'https://';
        }

        return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    protected function getTicketSignature($ticket, $nonceStr, $timestamp, $url)
    {
        return sha1(sprintf('jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s', $ticket, $nonceStr, $timestamp, $url));
    }
}