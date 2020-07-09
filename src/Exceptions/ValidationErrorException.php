<?php

declare(strict_types=1);

namespace App\Exceptions;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

class ValidationErrorException extends \Exception
{
    public ConstraintViolationListInterface $errors;

    public function __construct(
        ConstraintViolationListInterface $errors,
        $message = "",
        $code = 0,
        Throwable $previous = null
    )
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }
}
