<?php

declare(strict_types=1);

namespace App\Model\From\CheckStatusCargo\NewPost;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class NewPostCheckStatusCargoDTO
{
    /**
     * @Serializer\SerializedName("DocumentNumber")
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    public ?string $documentNumber = null;
}
