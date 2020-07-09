<?php

declare(strict_types=1);

namespace App\Service\CalculateDelivery\Form;

use Symfony\Component\Form\FormInterface;

interface CalculateDeliveryFormFactoryInterface
{
    /**
     * @param string $type
     *
     * @return FormInterface
     *
     * @throws CalculateDeliveryFormFactoryException
     */
    public function create(string $type): FormInterface;
}
