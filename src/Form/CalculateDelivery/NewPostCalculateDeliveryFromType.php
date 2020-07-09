<?php

declare(strict_types=1);

namespace App\Form\CalculateDelivery;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewPostCalculateDeliveryFromType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewPostCalculateDeliveryFromType::class,
        ]);
    }
}
