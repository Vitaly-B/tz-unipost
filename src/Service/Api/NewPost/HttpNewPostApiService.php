<?php

declare(strict_types=1);

namespace App\Service\Api\NewPost;

use App\Model\Api\NewPost\GetCities\GetCitiesResponseDTO;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\SerializerInterface;

class HttpNewPostApiService implements NewPostApiServiceInterface
{
    private string $apiKey;
    private Client $httpClient;
    private SerializerInterface $serializer;

    public function __construct(
        string $apiKey,
        Client $httpClient,
        SerializerInterface $serializer
    )
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * @todo также можно реализовать декоратор для єтого класа что бы добавить кеширование.
     */
    public function getCities(): GetCitiesResponseDTO
    {
        try {
            $response = $this->httpClient->post('', ['json' => [
                'apiKey' => $this->apiKey,
                'modelName' => 'Address',
                'calledMethod' => 'getCities',
            ]]);
        } catch (GuzzleException $e) {
            throw new NewPostApiException($e->getMessage(), $e->getCode(), $e);
        }

        /** @var GetCitiesResponseDTO $dto */
        $dto = $this->serializer->deserialize(
            $response->getBody()->getContents(),
            GetCitiesResponseDTO::class,
            'json'
        );

        return $dto;
    }
}
