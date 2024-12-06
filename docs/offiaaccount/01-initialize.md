# 微信公众号模块初始化

```php
use Ikaijian\Wechat\Factory;

$config = [
    'app_id' => 'xxx',
    'secret' => 'xxx',
];

$this->app = Factory::OfficialAccount($config);
```
