<?php

declare(strict_types=1);

namespace App\Service\CalculateDelivery\Form;

use App\Constants\DeliveryProvider;
use App\Form\CalculateDelivery\NewPostCalculateDeliveryFromType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class CalculateDeliveryFormFactory implements CalculateDeliveryFormFactoryInterface
{
    private FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param string $type
     *
     * @return FormInterface
     *
     * @throws CalculateDeliveryFormFactoryException
     */
    public function create(string $type): FormInterface
    {
        if ($type === DeliveryProvider::NEW_POST)
            return $this->formFactory->create(NewPostCalculateDeliveryFromType::class);

        throw new CalculateDeliveryFormFactoryException('Unsupported type');
    }
}
