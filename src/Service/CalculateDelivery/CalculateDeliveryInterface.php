<?php

namespace App\Service\CalculateDelivery;

use App\Exceptions\ValidationErrorException;
use App\Model\DeliveryCost;

interface CalculateDeliveryInterface
{
    /**
     * @param object $dateDto
     *
     * @return DeliveryCost
     *
     * @throws CalculateDeliveryException
     * @throws ValidationErrorException
     */
    public function getCoast($dateDto): DeliveryCost;
}
