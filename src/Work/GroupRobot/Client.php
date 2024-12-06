<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:43,
 * @LastEditTime: 2024/12/3  17:43,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\GroupRobot;

use Ikaijian\Wechat\Kernel\Support\BaseClient;

class Client extends BaseClient
{
    protected $patch = [];
    protected $groupKey;
    protected $endpointToMessage = 'cgi-bin/webhook/send';

    /**
     * @param $message
     * @return $this
     */
    public function setText($message)
    {
        $this->patch = [
            'msgtype' => 'text',
            'text' => ['content' => $message]
        ];

        return $this;
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMarkdown($message)
    {
        $this->patch = [
            'msgtype' => 'markdown',
            'markdown' => ['content' => $message]
        ];

        return $this;
    }

    public function toGroup($groupKey)
    {
        $this->groupKey = $groupKey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        $this->accessToken = null;

        return $this->httpPostJson($this->endpointToMessage, $this->patch, ['key' => $this->groupKey]);
    }
}