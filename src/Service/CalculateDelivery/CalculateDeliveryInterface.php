<?php

namespace App\Service\CalculateDelivery;

use App\Model\DeliveryCost;

interface CalculateDeliveryInterface
{
    /**
     * @param object $dateDto
     *
     * @return DeliveryCost
     *
     * @throws CalculateDeliveryException
     */
    public function getCoast($dateDto): DeliveryCost;
}
