<?php

namespace Mushketer888\LaravelDblog;

use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\RotatingFileHandler;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Support\Arrayable;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Illuminate\Contracts\Logging\Log as LogContract;

class Writer extends \Illuminate\Log\Writer
{


    protected function writeLog($level, $message, $context)
    {
        parent::writeLog($level, $message, $context);
        try {
            \Mushketer888\LaravelDblog\DBLog::create(
                [
                    'level' => $level,
                    'message' => $message,
                    'context' => $context,
                    'env'=>''
                ]
            );
        } catch (\Exception $e) {
            parent::writeLog('ERROR', "Error in DBLog: " . $e->getMessage(), $context);
        }

    }

}