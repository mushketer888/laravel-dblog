<?php

namespace Mushketer888\LaravelDblog;

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