<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use App\Models\LogSystem;

class LogSystemHandler extends AbstractProcessingHandler
{
    private $LogSystem;

    public function __construct($level = Logger::DEBUG, $bubble = true)
    {
        $this->LogSystem=new LogSystem();
        parent::__construct($level, $bubble);
    }

    protected function write(array $record) : void
    {
        $this->LogSystem->level=$record['level_name'];
        $this->LogSystem->message=$record['message'];
        $this->LogSystem->save();

    }
}