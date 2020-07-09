<?php

declare(strict_types=1);

namespace App\Model\From\CalculateDelivery\NewPost;

use JMS\Serializer\Annotation as Serializer;

class PackCalculate
{
    /**
     * @Serializer\SerializedName("PackCount")
     * @Serializer\Type("integer")
     */
    public int $packCount;

    /**
     * @Serializer\SerializedName("PackRef")
     * @Serializer\Type("string")
     */
    public string $packRef;
}
