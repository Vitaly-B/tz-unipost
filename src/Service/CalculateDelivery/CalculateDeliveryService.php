<?php

declare(strict_types=1);

namespace App\Service\CalculateDelivery;

use App\Model\Api\NewPost\GetDocumentPrice\DeliveryCostDTO;
use App\Model\Api\NewPost\GetDocumentPrice\GetDocumentPriceRequestDTO;
use App\Model\DeliveryCost;
use App\Model\From\CalculateDelivery\NewPost\NewPostCalculateDeliveryDTO;
use App\Service\Api\NewPost\NewPostApiException;
use App\Service\Api\NewPost\NewPostApiServiceInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CalculateDeliveryService implements CalculateDeliveryInterface
{
    private NewPostApiServiceInterface $apiService;
    private ValidatorInterface $validator;

    public function __construct(
        NewPostApiServiceInterface $apiService,
        ValidatorInterface $validator
    )
    {
        $this->apiService = $apiService;
        $this->validator = $validator;
    }

    public function getCoast($dataDTO): DeliveryCost
    {
        $error = $this->validator->validate($dataDTO);
        if (count($error) > 0) {
            throw new CalculateDeliveryException('Data object not valid');
        }

        if ($dataDTO instanceof NewPostCalculateDeliveryDTO) {

            try {
                $response = $this->apiService->getDocumentPrice(new GetDocumentPriceRequestDTO(
                    $dataDTO->citySender->ref,
                    $dataDTO->cityRecipient->ref,
                    $dataDTO->weight,
                    $dataDTO->serviceType,
                    $dataDTO->cost,
                    $dataDTO->cargoType,
                    $dataDTO->seatsAmount
                ));

                if (!$response->success) {
                    throw new CalculateDeliveryException('New post request api error');
                }

                if (count($response->data) === 0) {
                    throw new CalculateDeliveryException('Unable to calculate shipping cost ');
                }

                /** @var DeliveryCostDTO $deliveryCostDTO */
                $deliveryCostDTO = $response->data[0];


                return new DeliveryCost(
                    $deliveryCostDTO->assessedCost,
                    $deliveryCostDTO->cost
                );

            } catch (NewPostApiException $e) {
                throw new CalculateDeliveryException($e->getMessage(), $e->getCode(), $e);
            }

        }

        throw new CalculateDeliveryException('Unsupported data object');
    }
}
