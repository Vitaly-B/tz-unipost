<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetStatusDocuments;

use JMS\Serializer\Annotation as Serializer;

class DocumentStatusDTO
{
    /**
     * @Serializer\SerializedName("StatusCode")
     * @Serializer\Type("integer")
     */
    public int $statusCode;

    /**
     * @Serializer\SerializedName("Status")
     * @Serializer\Type("string")
     */
    public string $status;

    /**
     * @Serializer\SerializedName("CitySender")
     * @Serializer\Type("string")
     */
    public ?string $citySender = null;

    /**
     * @Serializer\SerializedName("CityRecipient")
     * @Serializer\Type("string")
     */
    public ?string $cityRecipient = null;

    /**
     * @Serializer\SerializedName("RecipientAddress")
     * @Serializer\Type("string")
     */
    public ?string $recipientAddress = null;

    /**
     * @Serializer\SerializedName("ScheduledDeliveryDate")
     * @Serializer\Type("DateTime<'d-m-Y H:i:s'>")
     */
    public ?\DateTime $scheduledDeliveryDate = null;
}
