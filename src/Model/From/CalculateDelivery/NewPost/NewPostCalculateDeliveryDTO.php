<?php

declare(strict_types=1);

namespace App\Model\From\CalculateDelivery\NewPost;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use App\Model\Api\NewPost\GetCities\CityDTO;

class NewPostCalculateDeliveryDTO
{

    /**
     * @Serializer\SerializedName("CitySender")
     * @Serializer\Type(CityDTO::class)
     * @Assert\NotNull()
     */
    public ?CityDTO $citySender = null;

    /**
     * @Serializer\SerializedName("CityRecipient")
     * @Serializer\Type(CityDTO::class)
     * @Assert\NotNull()
     */
    public ?CityDTO $cityRecipient = null;

    /**
     * @Serializer\SerializedName("Weight")
     * @Serializer\Type("float")
     * @Assert\NotBlank()
     */
    public ?float $weight = null;

    /**
     * @Serializer\SerializedName("ServiceType")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $serviceType = null;

    /**
     * @Serializer\SerializedName("Cost")
     * @Serializer\Type("float")
     * @Assert\NotBlank()
     */
    public ?float $cost = null;

    /**
     * @Serializer\SerializedName("CargoType")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $cargoType = null;

    /**
     * @Serializer\SerializedName("SeatsAmount")
     * @Serializer\Type("integer")
     * @Assert\NotBlank()
     */
    public ?int $seatsAmount = null;
}
