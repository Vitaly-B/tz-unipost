<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetDocumentPrice;

use App\Model\Api\NewPost\BaseResponseDTO;
use JMS\Serializer\Annotation as Serializer;

class GetDocumentPriceResponseDTO extends BaseResponseDTO
{
    /**
     * @var DeliveryCostDTO[]
     *
     * @Serializer\Type("array<App\Model\Api\NewPost\GetDocumentPrice\DeliveryCostDTO>")
     */
    public array $data = [];
}
