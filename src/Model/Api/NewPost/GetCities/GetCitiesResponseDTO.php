<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetCities;

use App\Model\Api\NewPost\BaseResponseDTO;
use JMS\Serializer\Annotation as Serializer;

class GetCitiesResponseDTO extends BaseResponseDTO
{
    /**
     * @var CityDTO[]
     * @Serializer\Type("array<App\Model\Api\NewPost\GetCities\CityDTO>")
     */
    public array $data = [];
}
