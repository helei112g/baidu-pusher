# 概述
* baidu push sdk: 3.0.0
* laravel: 5.1.*
* php > 5.5.9

# 更新日志
2015/07/16 修改BaseSDK文件中的异常

# 安装
* 在composer.json中配置
```composer
    "require": {
        "riverslei/baidu-pusher": "~1.0"
    },
```
* 执行 `composer update`
* 安装完成后，在 `config\app.php` 中设置服务提供者
```php
'providers' => [
  Riverslei\Pusher\PusherServiceProvider::class,
  ...
]
```
在 `config\app.php` 中设置 `facade`
```php
'aliases' => [
  ...
  'Pusher'    => Riverslei\Pusher\Pusher::class,
]
```
* 生成相关的配置文件 `php artisan vendor:publish --provider=Riverslei\Pusher\PusherServiceProvider`

# 测试
为了检测安装的结果是否可正常使用。可用一下代码进行测试

配置路由：
```php
Route::get('/pusher', 'TestController@pusher');
```
生成控制器及相应方法
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Pusher;

class TestController extends Controller
{
    public function pusher()
    {
        $channelId = '3785562685113372034';
        // 消息内容.
        $message = array (
                // 消息的标题.
                'title' => 'Hi!.',
                // 消息内容
                'description' => "hello!, this message from baidu push service."
        );
        // 设置消息类型为 通知类型.
        $opts = array (
                'msg_type' => 1
        );
        // 向目标设备发送一条消息
        $rs = Pusher::pushMsgToSingleDevice($channelId, $message, $opts);
        
        // 判断返回值,当发送失败时, $rs的结果为false, 可以通过getError来获得错误信息.
        if($rs === false){
            print_r(Pusher::getLastErrorCode());
            print_r(Pusher::getLastErrorMsg());
        }else{
            // 将打印出消息的id,发送时间等相关信息.
            var_dump($rs);
        }
        
        echo "done!";
    }
}
```
访问该路由，执行在页面中查看结果，如果内容如下，则表示成功
```html
array (size=2)
  'msg_id' => string '2363629481259790251' (length=19)
  'send_time' => int 1436930964
done!
```
