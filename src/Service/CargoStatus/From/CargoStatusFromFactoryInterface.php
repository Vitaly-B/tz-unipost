<?php

declare(strict_types=1);

namespace App\Service\CargoStatus\From;

use Symfony\Component\Form\FormInterface;

interface CargoStatusFromFactoryInterface
{
    /**
     * @param string $type
     *
     * @return FormInterface
     *
     * @throws CargoStatusFromFactoryException
     */
    public function create(string $type): FormInterface;
}
