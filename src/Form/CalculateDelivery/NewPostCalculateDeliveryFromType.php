<?php

declare(strict_types=1);

namespace App\Form\CalculateDelivery;

use App\Model\Api\NewPost\GetCities\CityDTO;
use App\Model\From\CalculateDelivery\NewPost\NewPostCalculateDeliveryDTO;
use App\Service\Api\NewPost\NewPostApiServiceInterface;
use phpDocumentor\Reflection\DocBlock\Tag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewPostCalculateDeliveryFromType extends AbstractType
{

    private NewPostApiServiceInterface $newPostApiService;

    public function __construct(NewPostApiServiceInterface $newPostApiService)
    {
        $this->newPostApiService = $newPostApiService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $citiesForChoices = $this->getCitiesForChoices();

        $builder->add('citySender', ChoiceType::class, [
            'required' => true,
            'label' => 'Город-отправитель',
            'choices' => $citiesForChoices,
            'choice_value' => 'ref',
            'choice_label' => 'description',
            'placeholder' => '',
        ])->add('cityRecipient', ChoiceType::class, [
            'required' => true,
            'placeholder' => '',
            'label' => 'Город-получатель',
            'choices' => $citiesForChoices,
            'choice_value' => 'ref',
            'choice_label' => 'description',
        ])->add('serviceType', ChoiceType::class, [
            'required' => true,
            'placeholder' => '',
            'label' => 'Тип услуги',
            'choices' => [
                'Адрес-Адрес' => 'DoorsDoors',
                'Адрес-Отделение' => 'DoorsWarehouse',
                'Отделение-Отделение' => 'WarehouseWarehouse',
                'Отделение-Адрес' => 'WarehouseDoors',
                'Адрес-Почтомат' => 'DoorsPostomat',
                'Отделение-Почтомат' => 'WarehousePostomat',
            ],
        ])->add('cargoType', ChoiceType::class, [
            'required' => true,
            'placeholder' => '',
            'label' => 'Вид отправления',
            'choices' => [
                'Посылки' => 'Parcel',
                'Грузы' => 'Cargo',
                'Документы' => 'Documents',
            ],
        ])->add('weight', NumberType::class, [
            'required' => true,
            'label' => 'Вес фактический min - 0.1',
        ])->add('cost', NumberType::class, [
            'required' => true,
            'label' => 'Объявленная стоимость',
        ])->add('seatsAmount', IntegerType::class, [
            'required' => true,
            'label' => 'Количество мест отправления',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewPostCalculateDeliveryDTO::class,
        ]);
    }

    private function getCitiesForChoices(): array
    {
        $citiesResultDTO = $this->newPostApiService->getCities();

        if (!$citiesResultDTO->success) {
            return [];
        }
        return $citiesResultDTO->data;
    }
}
