<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetStatusDocuments;

use App\Model\Api\NewPost\BaseResponseDTO;
use JMS\Serializer\Annotation as Serializer;

class GetStatusDocumentsResponseDTO extends BaseResponseDTO
{
    /**
     * @var DocumentStatusDTO[]
     *
     * @Serializer\Type("array< App\Model\Api\NewPost\GetStatusDocuments\DocumentStatusDTO>")
     */
    public array $data;
}
