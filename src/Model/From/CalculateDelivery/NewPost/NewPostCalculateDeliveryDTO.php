<?php

declare(strict_types=1);

namespace App\Model\From\CalculateDelivery\NewPost;

use JMS\Serializer\Annotation as Serializer;

class NewPostCalculateDeliveryDTO
{

    /**
     * @Serializer\SerializedName("CitySender")
     * @Serializer\Type("string")
     */
    public string $citySender;

    /**
     * @Serializer\SerializedName("CityRecipient")
     * @Serializer\Type("string")
     */
    public string $cityRecipient;

    /**
     * @Serializer\SerializedName("Weight")
     * @Serializer\Type("integer")
     */
    public int $weight;

    /**
     * @Serializer\SerializedName("ServiceType")
     * @Serializer\Type("string")
     */
    public string $serviceType;

    /**
     * @Serializer\SerializedName("Cost")
     * @Serializer\Type("integer")
     */
    public int $cost;

    /**
     * @Serializer\SerializedName("CargoType")
     * @Serializer\Type("string")
     */
    public string $CargoType;

    /**
     * @Serializer\SerializedName("SeatsAmount")
     * @Serializer\Type("integer")
     */
    public int $seatsAmount;

    /**
     * @Serializer\SerializedName("PackCalculate")
     * @Serializer\Type(PackCalculate::class)
     */
    public PackCalculate $packCalculate;


}
