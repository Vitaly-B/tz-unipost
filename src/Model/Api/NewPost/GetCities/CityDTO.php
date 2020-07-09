<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetCities;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class CityDTO
{
    /**
     * @Serializer\SerializedName("CityID")
     * @Serializer\Type("integer")
     * @Assert\NotBlank()
     */
    public ?int $cityId = null;

    /**
     * @Serializer\SerializedName("Description")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $description = null;

    /**
     * @Serializer\SerializedName("Ref")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $ref = null;

    /**
     * @Serializer\SerializedName("DeliveryCity")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $deliveryCity = null;
}
