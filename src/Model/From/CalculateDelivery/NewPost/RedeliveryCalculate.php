<?php

declare(strict_types=1);

namespace App\Model\From\CalculateDelivery\NewPost;

use JMS\Serializer\Annotation as Serializer;

class RedeliveryCalculate
{
    /**
     * @Serializer\SerializedName("CargoType")
     * @Serializer\Type("string")
     */
    public string $cargoType;

    /**
     * @Serializer\SerializedName("Amount")
     * @Serializer\Type("integer")
     */
    public int $amount;
}
