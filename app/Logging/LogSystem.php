<?php

namespace App\Logging;

use Monolog\Logger;

class LogSystem
{
    /*
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $loggger=new Logger('log_system');
        return $loggger->pushHandler(new LogSystemHandler());
    }
}