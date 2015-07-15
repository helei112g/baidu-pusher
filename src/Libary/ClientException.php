<?php

namespace Riverslei\Pusher\Libary;

/**
 * 表示一个客户端异常, 一般为初始化, 参数检查等出现异常
 */
class ClientException extends \Exception
{
    /**
     * Constructor
     * @param string $msg
     * @param int $code
     */
    function __construct($message, $code=0) {
        parent::__construct($message, $code);
    }
}
