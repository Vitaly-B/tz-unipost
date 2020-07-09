<?php

declare(strict_types=1);

namespace App\Form\CargoStatus;

use App\Model\From\CheckStatusCargo\NewPost\NewPostCheckStatusCargoDTO;
use App\Service\Api\NewPost\NewPostApiServiceInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CargoStatusFormType extends AbstractType
{
    private NewPostApiServiceInterface $newPostApiService;

    public function __construct(NewPostApiServiceInterface $newPostApiService)
    {
        $this->newPostApiService = $newPostApiService;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('documentNumber', TextType::class, [
            'required' => true,
            'label' => 'Номер накладной',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewPostCheckStatusCargoDTO::class,
        ]);
    }

}
