<?php

declare(strict_types=1);

namespace App\Model\Api\NewPost\GetCities;


use JMS\Serializer\Annotation as Serializer;

class GetCitiesResponseDTO
{
    /**
     * @Serializer\Type("boolean")
     */
    public bool $success = false;

    /**
     * @var CityDTO[]
     * @Serializer\Type("array<App\Model\Api\NewPost\GetCities\CityDTO>")
     */
    public array $data = [];
}
