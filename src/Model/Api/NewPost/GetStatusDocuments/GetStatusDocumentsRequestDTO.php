<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetStatusDocuments;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class GetStatusDocumentsRequestDTO
{
    /**
     * @Serializer\SerializedName("DocumentNumber")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public string $documentNumber;

    public function __construct(string $documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }
}
