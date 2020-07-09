<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost;

use JMS\Serializer\Annotation as Serializer;

abstract class BaseResponseDTO
{
    /**
     * @Serializer\Type("boolean")
     */
    public bool $success = false;
}
