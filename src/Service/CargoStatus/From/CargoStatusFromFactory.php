<?php

declare(strict_types=1);

namespace App\Service\CargoStatus\From;


use App\Constants\DeliveryProvider;
use App\Form\CargoStatus\CargoStatusFormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class CargoStatusFromFactory implements CargoStatusFromFactoryInterface
{
    private FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function create(string $type): FormInterface
    {
        if ($type === DeliveryProvider::NEW_POST) {
            return $this->formFactory->create(CargoStatusFormType::class);
        }

        throw new CargoStatusFromFactoryException('Unsupported type');
    }
}
