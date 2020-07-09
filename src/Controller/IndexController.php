<?php

declare(strict_types=1);

namespace App\Controller;

use App\Constants\DeliveryProvider;
use App\Service\CalculateDelivery\CalculateDeliveryException;
use App\Service\CalculateDelivery\CalculateDeliveryInterface;
use App\Service\CalculateDelivery\Form\CalculateDeliveryFormFactoryException;
use App\Service\CalculateDelivery\Form\CalculateDeliveryFormFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    private CalculateDeliveryFormFactoryInterface $formFactory;
    private CalculateDeliveryInterface $calculateDeliveryService;

    public function __construct(
        CalculateDeliveryFormFactoryInterface $formFactory,
        CalculateDeliveryInterface $calculateDeliveryService
    )
    {
        $this->formFactory = $formFactory;
        $this->calculateDeliveryService = $calculateDeliveryService;
    }

    /**
     * @Route("/")
     *
     * @throws CalculateDeliveryFormFactoryException
     * @throws CalculateDeliveryException
     */
    public function indexAction(Request $request): Response
    {
        $form = $this->formFactory->create(DeliveryProvider::NEW_POST);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $deliveryCoast = $this->calculateDeliveryService->getCoast($form->getData());
        }

        return $this->render(
            'index/index.html.twig',
            [
                'form' => $form->createView(),
                'deliveryCoast' => $deliveryCoast ?? null,
            ]
        );
    }
}
