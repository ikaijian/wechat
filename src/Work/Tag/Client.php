<?php
/**
 * @Author: chenkaijian <ikaijian@163.com>,
 * @Date: 2024/12/3 18:00,
 * @LastEditTime: 2024/12/3  18:00,
 * @Copyright: 2024 ikaijian Inc. 保留所有权利。
 */

namespace Ikaijian\Wechat\Work\Tag;

use Ikaijian\Wechat\Kernel\Support\BaseClient;

class Client extends BaseClient
{
    /**
     * @param string $tagName
     * @param int|null $tagId
     * @return mixed
     */
    public function create(string $tagName, int $tagId = null)
    {
        $params = [
            'tagname' => $tagName,
            'tagid' => $tagId,
        ];

        return $this->httpPostJson('cgi-bin/tag/create', $params);
    }

    /**
     * @param int $tagId
     * @param string $tagName
     * @return mixed
     */
    public function update(int $tagId, string $tagName)
    {
        $params = [
            'tagid' => $tagId,
            'tagname' => $tagName,
        ];

        return $this->httpPostJson('cgi-bin/tag/update', $params);
    }

    /**
     * @param int $tagId
     * @return mixed
     */
    public function delete(int $tagId)
    {
        return $this->httpGet('cgi-bin/tag/delete', ['tagid' => $tagId]);
    }

    /**
     * @param int $tagId
     * @return mixed
     */
    public function get(int $tagId)
    {
        return $this->httpGet('cgi-bin/tag/get', ['tagid' => $tagId]);
    }

    /**
     * @param int $tagId
     * @param array $userList
     * @return mixed
     */
    public function tagUsers(int $tagId, array $userList = [])
    {
        return $this->tagOrUntagUsers('cgi-bin/tag/addtagusers', $tagId, $userList);
    }

    /**
     * @param int $tagId
     * @param array $partyList
     * @return mixed
     */
    public function tagDepartments(int $tagId, array $partyList = [])
    {
        return $this->tagOrUntagUsers('cgi-bin/tag/addtagusers', $tagId, [], $partyList);
    }

    /**
     * @param int $tagId
     * @param array $userList
     * @return mixed
     */
    public function untagUsers(int $tagId, array $userList = [])
    {
        return $this->tagOrUntagUsers('cgi-bin/tag/deltagusers', $tagId, $userList);
    }

    /**
     * @param int $tagId
     * @param array $partyList
     * @return mixed
     */
    public function untagDepartments(int $tagId, array $partyList = [])
    {
        return $this->tagOrUntagUsers('cgi-bin/tag/deltagusers', $tagId, [], $partyList);
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->httpGet('cgi-bin/tag/list');
    }

    /**
     * @param string $endpoint
     * @param int $tagId
     * @param array $userList
     * @param array $partyList
     * @return mixed
     */
    protected function tagOrUntagUsers(string $endpoint, int $tagId, array $userList = [], array $partyList = [])
    {
        $data = [
            'tagid' => $tagId,
            'userlist' => $userList,
            'partylist' => $partyList,
        ];

        return $this->httpPostJson($endpoint, $data);
    }

}