<?php

declare(strict_types=1);

namespace App\Service\Api\NewPost;

use App\Model\Api\NewPost\GetCities\GetCitiesResponseDTO;
use App\Model\Api\NewPost\GetDocumentPrice\GetDocumentPriceRequestDTO;
use App\Model\Api\NewPost\GetDocumentPrice\GetDocumentPriceResponseDTO;
use App\Model\Api\NewPost\GetStatusDocuments\GetStatusDocumentsRequestDTO;
use App\Model\Api\NewPost\GetStatusDocuments\GetStatusDocumentsResponseDTO;

interface NewPostApiServiceInterface
{
    /**
     * @return GetCitiesResponseDTO
     *
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

    /**
     * @param GetStatusDocumentsRequestDTO $requestDTO
     * @return GetStatusDocumentsResponseDTO
     *
     * @throws NewPostApiException
     */
    public function getStatusDocuments(GetStatusDocumentsRequestDTO $requestDTO): GetStatusDocumentsResponseDTO;
}
