<?php

declare(strict_types=1);

namespace App\Controller;

use App\Constants\DeliveryProvider;
use App\Exceptions\ValidationErrorException;
use App\Service\CargoStatus\CheckCargoStatusInterface;
use App\Service\CargoStatus\From\CargoStatusFromFactoryException;
use App\Service\CargoStatus\From\CargoStatusFromFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CargoStatus\CheckCargoStatusException;

class CheckStatusCargoController extends AbstractController
{
    private CargoStatusFromFactoryInterface $fromFactory;
    private CheckCargoStatusInterface $checkStatusService;

    public function __construct(
        CargoStatusFromFactoryInterface $fromFactory,
        CheckCargoStatusInterface $checkStatusService
    )
    {
        $this->fromFactory = $fromFactory;
        $this->checkStatusService = $checkStatusService;
    }

    /**
     * @Route("/check-status-cargo", name="checkStatusCargo")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        try {
            $form = $this->fromFactory->create(DeliveryProvider::NEW_POST);
            $form->handleRequest($request);

            $viewForm = $form->createView();

            if ($form->isSubmitted() && $form->isValid()) {
                $cargoStatus = $this->checkStatusService->checkStatus($form->getData());
            }
        } catch (CargoStatusFromFactoryException | CheckCargoStatusException$e) {
            $hasOtherErrors = true;
        } catch (ValidationErrorException $validationErrorException) {
            $validationErrors = $validationErrorException->errors;
        }

        return $this->render(
            'checkStatusCargo/index.html.twig',
            [
                'form' => $viewForm ?? null,
                'validationErrors' => $validationErrors ?? null,
                'hasOtherErrors' => $hasOtherErrors ?? false,
                'cargoStatus' => $cargoStatus ?? null,
            ]
        );
    }
}
