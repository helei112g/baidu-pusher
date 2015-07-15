<?php

namespace Riverslei\Pusher\Libary;

/**
 * 表示一个服务端API调用异常,接收到这个异常一般表示客户端及网络运行正常
 */
class ServerException extends \Exception
{
    /**
     * Constructor
     * @param string $msg
     * @param int $code
     */
    function __construct($msg, $code=0) {
        parent::__construct($msg, $code);
    }
}