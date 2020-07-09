<?php

declare(strict_types=1);

namespace App\Service\Api\NewPost;

use App\Model\Api\NewPost\GetCities\GetCitiesResponseDTO;

interface NewPostApiServiceInterface
{
    /**
     * @throws NewPostApiException
     */
    public function getCities(): GetCitiesResponseDTO;
}
