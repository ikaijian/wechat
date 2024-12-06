<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 17:42,
 * @LastEditTime: 2024/12/3  17:42,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Department;

use Ikaijian\Wechat\Kernel\Support\BaseClient;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    /**
     * Create a department.
     *
     * @param array $data
     * @return mixed|ResponseInterface
     */
    public function create(array $data)
    {
        return $this->httpPostJson('cgi-bin/department/create', $data);
    }

    /**
     * Update a department.
     *
     * @param int $id
     * @param array $data
     * @return mixed|ResponseInterface
     */
    public function update(int $id, array $data)
    {
        return $this->httpPostJson('cgi-bin/department/update', array_merge(compact('id'), $data));
    }

    /**
     * Delete a department.
     *
     * @param int $id
     * @return mixed|ResponseInterface
     */
    public function delete(int $id)
    {
        return $this->httpGet('cgi-bin/department/delete', compact('id'));
    }

    /**
     * Get department lists
     *
     * @param int|null $id
     * @return mixed|ResponseInterface
     */
    public function list(?int $id = null)
    {
        return $this->httpGet('cgi-bin/department/list', compact('id'));
    }

    /**
     * Get sub department lists
     *
     * @param null|int $id
     * @return mixed
     */
    public function simpleList(?int $id = null)
    {
        return $this->httpGet('cgi-bin/department/simplelist', compact('id'));
    }

    /**
     * Get department details.
     *
     * @param int $id
     * @return mixed|ResponseInterface
     */
    public function get(int $id)
    {
        return $this->httpGet('cgi-bin/department/get', compact('id'));
    }
}