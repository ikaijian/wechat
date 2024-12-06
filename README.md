<h1 align="center"> wetchat </h1>

<p align="center"> .</p>

## 概览

微信平台开放接口封装SDK,包含企业微信、微信公众平台、微信开放平台、微信小程序等

## 目录

- [环境要求](#环境要求)
- [安装](#安装)
- [微信小程序](docs/miniprogram/01-initialize.md)
    - [初始化](docs/miniprogram/01-initialize.md)
    - [获取access_token](docs/miniprogram/02-access-token.md)
    - [登录](docs/miniprogram/03-login.md)
    - [获取手机](docs/miniprogram/04-phonenumber.md)
    - [小程序QR](docs/miniprogram/05-appcode.md)
    - [订阅消息](docs/miniprogram/06-subscribe-message.md)
    - [小程序链接](docs/miniprogram/07-applink.md)
- [微信公众号](docs/offiaaccount/01-initialize.md)
    - [初始化](docs/offiaaccount/01-initialize.md)
    - [获取access_token](docs/offiaaccount/02-access-token.md)
    - [JS-SDK](docs/offiaaccount/03-jssdk.md)
- [企业微信](docs/work/01-initialize.md)
    - [初始化](docs/work/01-initialize.md)
    - [获取access_token](docs/work/02-access-token.md)
    - [网页授权](docs/work/03-oauth.md)
    - [OA](docs/work/08-oa.md)
    - [通讯录](docs/work/04-contacts.md)
    - [部门管理](docs/work/09-department.md)
    - [标签管理](docs/work/10-tag.md)
    - [JS-SDK](docs/work/05-jssdk.md)
    - [消息发送](docs/work/06-message.md)
    - [群机器人](docs/work/07-group-robot.md)

## 环境要求

- PHP >= 7.4

## 安装

```shell
$ composer require ikaijian/wetchat -vvv
```

## 使用

缓存 Token 直接使用了Laravel Cache 的 Facades，建议将 CACHE_DRIVER=file 改为 CACHE_DRIVER=redis
### 发布配置

+ easywechat_config基础配置文件


```shell
php artisan vendor:publish --provider="Ikaijian\Wechat\WechatServiceProvider"
```
## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/ikaijian/wetchat/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/ikaijian/wetchat/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and
PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT