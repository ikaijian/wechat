<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/4 8:23,
 * @LastEditTime: 2024/12/4  8:23,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\MiniProgram\SubscribeMessage;

use Ikaijian\Wechat\Kernel\Exceptions\InvalidArgumentException;
use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class Client extends BaseClient
{
    /**
     * {@inheritdoc}.
     */
    protected $message = [
        'touser' => '',
        'template_id' => '',
        'page' => '',
        'data' => [],
        'miniprogram_state' => 'formal',
    ];

    /**
     * {@inheritdoc}.
     */
    protected $required = ['touser', 'template_id', 'data'];

    /**
     * Send a template message.
     *
     * @param array $data
     * @return mixed|ResponseInterface
     * @throws InvalidArgumentException
     */
    public function send(array $data = [])
    {
        $params = $this->formatMessage($data);

        $this->restoreMessage();

        return $this->httpPostJson('cgi-bin/message/subscribe/send', $params);
    }

    /**
     * @param array $data
     * @return array
     * @throws InvalidArgumentException
     */
    protected function formatMessage(array $data = [])
    {
        $params = array_merge($this->message, $data);

        foreach ($params as $key => $value) {
            if (in_array($key, $this->required, true) && empty($value) && empty($this->message[$key])) {
                throw new InvalidArgumentException(sprintf('Attribute "%s" can not be empty!', $key));
            }

            $params[$key] = empty($value) ? $this->message[$key] : $value;
        }

        foreach ($params['data'] as $key => $value) {
            if (is_array($value)) {
                if (\array_key_exists('value', $value)) {
                    $params['data'][$key] = ['value' => $value['value']];

                    continue;
                }

                if (!empty($value)) {
                    $value = [
                        'value' => $value[0]
                    ];
                }
            } else {
                $value = [
                    'value' => (string)$value,
                ];
            }
            $params['data'][$key] = $value;
        }

        return $params;
    }

    /**
     * Restore message.
     */
    protected function restoreMessage()
    {
        $this->message = (new ReflectionClass(static::class))->getDefaultProperties()['message'];
    }
}