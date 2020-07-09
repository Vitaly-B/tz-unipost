<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetDocumentPrice;

use JMS\Serializer\Annotation as Serializer;

class GetDocumentPriceRequestDTO
{
    /**
     * @Serializer\SerializedName("CitySender")
     * @Serializer\Type("string")
     */
    private string $citySender;

    /**
     * @Serializer\SerializedName("CityRecipient")
     * @Serializer\Type("string")
     */
    private string $cityRecipient;

    /**
     * @Serializer\SerializedName("Weight")
     * @Serializer\Type("float")
     */
    private float $weight;

    /**
     * @Serializer\SerializedName("ServiceType")
     * @Serializer\Type("string")
     */
    private string $serviceType;

    /**
     * @Serializer\SerializedName("Cost")
     * @Serializer\Type("float")
     */
    private float $cost;

    /**
     * @Serializer\SerializedName("CargoType")
     * @Serializer\Type("string")
     */
    private string $cargoType;

    /**
     * @Serializer\SerializedName("SeatsAmount")
     * @Serializer\Type("integer")
     */
    private int $seatsAmount;

    public function __construct(
        string $citySender,
        string $cityRecipient,
        float $weight,
        string $serviceType,
        float $cost,
        string $cargoType,
        int $seatsAmount
    )
    {
        $this->citySender = $citySender;
        $this->cityRecipient = $cityRecipient;
        $this->weight = $weight;
        $this->serviceType = $serviceType;
        $this->cost = $cost;
        $this->cargoType = $cargoType;
        $this->seatsAmount = $seatsAmount;
    }
}
