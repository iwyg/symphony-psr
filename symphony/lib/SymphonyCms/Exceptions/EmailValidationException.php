<?php

namespace SymphonyCms\Exceptions;

use \SymphonyCms\Exceptions\EmailGatewayException;

/**
 * The validation exception to be thrown by all email gateways.
 * This exception is thrown if data does not pass validation.
 */
class EmailValidationException extends EmailGatewayException
{
}
