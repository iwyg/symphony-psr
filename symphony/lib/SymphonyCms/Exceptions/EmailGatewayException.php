<?php

namespace SymphonyCms\Exceptions;

use \Exception;
use \SymphonyCms\Symphony;

/**
 * The standard exception to be thrown by all email gateways.
 */
class EmailGatewayException extends Exception
{
    /**
     * Creates a new exception, and logs the error.
     *
     * @param string $message
     * @param int $code
     * @param Exception $previous
     *  The previous exception, if nested. See
     *  http://www.php.net/manual/en/language.exceptions.extending.php
     * @return void
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        $trace = parent::getTrace();
        // Best-guess to retrieve classname of email-gateway.
        // Might fail in non-standard uses, will then return an
        // empty string.
        $gateway_class = $trace[1]['class']?' (' . $trace[1]['class'] . ')':'';
        Symphony::Log()->pushToLog(tr('Email Gateway Error') . $gateway_class  . ': ' . $message, $code, true);
        parent::__construct('<![CDATA[' . trim($message) . ']]>');
    }
}
