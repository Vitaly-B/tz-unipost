<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetDocumentPrice;

use JMS\Serializer\Annotation as Serializer;

class DeliveryCostDTO
{
    /**
     * @Serializer\SerializedName("AssessedCost")
     * @Serializer\Type("float")
     */
    public float $assessedCost;

    /**
     * @Serializer\SerializedName("Cost")
     * @Serializer\Type("float")
     */
    public float $cost;
}
