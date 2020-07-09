<?php
declare(strict_types=1);

namespace App\Service\CargoStatus;


use App\Exceptions\ValidationErrorException;
use App\Model\Api\NewPost\GetStatusDocuments\DocumentStatusDTO;
use App\Model\Api\NewPost\GetStatusDocuments\GetStatusDocumentsRequestDTO;
use App\Model\CargoStatus;
use App\Model\From\CheckStatusCargo\NewPost\NewPostCheckStatusCargoDTO;
use App\Service\Api\NewPost\NewPostApiException;
use App\Service\Api\NewPost\NewPostApiServiceInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CheckCargoStatusService implements CheckCargoStatusInterface
{
    protected NewPostApiServiceInterface $newPostApiService;
    private ValidatorInterface $validator;

    public function __construct(
        NewPostApiServiceInterface $newPostApiService,
        ValidatorInterface $validator
    )
    {
        $this->newPostApiService = $newPostApiService;
        $this->validator = $validator;
    }

    public function checkStatus($dataDto): CargoStatus
    {
        $error = $this->validator->validate($dataDto);

        if (count($error) > 0) {
            throw new ValidationErrorException($error, 'Validation errors');
        }

        if ($dataDto instanceof NewPostCheckStatusCargoDTO) {
            try {
                $response = $this->newPostApiService->getStatusDocuments(
                    new GetStatusDocumentsRequestDTO(
                        $dataDto->documentNumber
                    )
                );

                if (!$response->success) {
                    throw new CheckCargoStatusException('New post unsuccessful api request');
                }

                if (count($response->data) === 0) {
                    throw new CheckCargoStatusException('Unable to get cargo status ');
                }

                /** @var DocumentStatusDTO $documentStatusDTO */
                $documentStatusDTO = $response->data[0];

                return new CargoStatus(
                    $documentStatusDTO->status,
                    $documentStatusDTO->citySender,
                    $documentStatusDTO->cityRecipient,
                    $documentStatusDTO->recipientAddress,
                    $documentStatusDTO->scheduledDeliveryDate
                );

            } catch (NewPostApiException $e) {
                throw new CheckCargoStatusException($e->getMessage(), $e->getCode(), $e);
            }
        }

        throw new CheckCargoStatusException('Unsupported data object');
    }
}
