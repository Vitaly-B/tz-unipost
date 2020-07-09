<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetCities;

use JMS\Serializer\Annotation as Serializer;

class CityDTO
{
    /**
     * @Serializer\SerializedName("CityID")
     * @Serializer\Type("integer")
     */
    public int $cityId;

    /**
     * @Serializer\SerializedName("Description")
     * @Serializer\Type("string")
     */
    public string $description;

    /**
     * @Serializer\SerializedName("Ref")
     * @Serializer\Type("string")
     */
    public string $ref;

    /**
     * @Serializer\SerializedName("DeliveryCity")
     * @Serializer\Type("string")
     */
    public string $deliveryCity;
}
