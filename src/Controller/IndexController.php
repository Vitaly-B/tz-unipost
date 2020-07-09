<?php

declare(strict_types=1);

namespace App\Controller;

use App\Constants\DeliveryProvider;
use App\Exceptions\ValidationErrorException as ValidationErrorExceptionAlias;
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
     */
    public function indexAction(Request $request): Response
    {
        try {
            $form = $this->formFactory->create(DeliveryProvider::NEW_POST);
            $form->handleRequest($request);

            $viewForm = $form->createView();

            if ($form->isSubmitted() && $form->isValid()) {
                $deliveryCoast = $this->calculateDeliveryService->getCoast($form->getData());
            }
        } catch (CalculateDeliveryFormFactoryException | CalculateDeliveryException $e) {
            $hasOtherErrors = true;
        } catch (ValidationErrorExceptionAlias $validationErrorException) {
            $validationErrors = $validationErrorException->errors;
        }

        return $this->render(
            'index/index.html.twig',
            [
                'form' => $viewForm ?? null,
                'validationErrors' => $validationErrors ?? null,
                'hasOtherErrors' => $hasOtherErrors ?? false,
                'deliveryCoast' => $deliveryCoast ?? null,
            ]
        );
    }
}
