<?php

namespace Mushketer888\LaravelDblog;

use Illuminate\Contracts\Logging\Log;

class DBLogger extends \Illuminate\Log\Writer implements Log
{
    /**
     * The registered loggers.
     *
     * @var \Illuminate\Log\Writer
     */
    protected $logger;

    /**
     * Create a new multi logger instance.
     *
     * @param \Illuminate\Log\Writer $logger
     *
     * @return void
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Log a message to the logs.
     *
     * @param string $level
     * @param mixed $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, $message, $context);
        try {
            \Mushketer888\LaravelDblog\DBLog::create(
                [
                    'level' => $level,
                    'message' => $message,
                    'context' => $context,
                    'env' => ''
                ]
            );
        } catch (\Exception $e) {
            $this->logger->log('ERROR', "Error in DBLog: " . $e->getMessage(), $context);
        }
    }



}