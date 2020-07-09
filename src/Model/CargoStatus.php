<?php

declare(strict_types=1);

namespace App\Model;

class CargoStatus
{
    private ?string $citySender;
    private ?string $cityRecipient;
    private ?string $recipientAddress;
    private ?\DateTime $scheduledDeliveryDate;
    private string $status;

    public function __construct(
        string $status,
        ?string $citySender,
        ?string $cityRecipient,
        ?string $recipientAddress,
        ?\DateTime $scheduledDeliveryDate

    )
    {
        $this->status = $status;
        $this->citySender = $citySender;
        $this->cityRecipient = $cityRecipient;
        $this->recipientAddress = $recipientAddress;
        $this->scheduledDeliveryDate = $scheduledDeliveryDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCitySender(): ?string
    {
        return $this->citySender;
    }

    public function getCityRecipient(): ?string
    {
        return $this->cityRecipient;
    }

    public function getRecipientAddress(): ?string
    {
        return $this->recipientAddress;
    }

    public function getScheduledDeliveryDate(): ?\DateTime
    {
        return $this->scheduledDeliveryDate;
    }
}

