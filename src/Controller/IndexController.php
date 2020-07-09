<?php

declare(strict_types=1);

namespace App\Controller;

use App\Constants\DeliveryProvider;
use App\Service\CalculateDelivery\Form\CalculateDeliveryFormFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    private CalculateDeliveryFormFactoryInterface $formFactory;

    public function __construct(CalculateDeliveryFormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/")
     */
    public function indexAction(): Response
    {
        return $this->render(
            'index/index.html.twig',
            [
                'form' => $this->formFactory->create(DeliveryProvider::NEW_POST)->createView(),
            ]
        );
    }
}
