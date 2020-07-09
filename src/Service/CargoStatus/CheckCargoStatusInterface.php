<?php

declare(strict_types=1);

namespace App\Service\CargoStatus;

use App\Exceptions\ValidationErrorException;
use App\Model\CargoStatus;

interface CheckCargoStatusInterface
{
    /**
     * @param object $dataDto
     * @return CargoStatus
     *
     * @throws CheckCargoStatusException
     * @throws ValidationErrorException
     */
    public function checkStatus($dataDto): CargoStatus;
}
