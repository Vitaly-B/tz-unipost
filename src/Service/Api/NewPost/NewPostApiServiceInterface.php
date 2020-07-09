<?php

declare(strict_types=1);

namespace App\Service\Api\NewPost;

use App\Model\Api\NewPost\GetCities\GetCitiesResponseDTO;
use App\Model\Api\NewPost\GetDocumentPrice\GetDocumentPriceRequestDTO;
use App\Model\Api\NewPost\GetDocumentPrice\GetDocumentPriceResponseDTO;

interface NewPostApiServiceInterface
{
    /**
     * @throws NewPostApiException
     */
    public function getCities(): GetCitiesResponseDTO;

    /**
     * @param GetDocumentPriceRequestDTO $requestDTO
     * @return GetDocumentPriceResponseDTO
     *
     * @throws NewPostApiException
     */
    public function getDocumentPrice(GetDocumentPriceRequestDTO $requestDTO): GetDocumentPriceResponseDTO;
}
