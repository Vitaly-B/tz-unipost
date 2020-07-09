<?php

declare(strict_types=1);

namespace App\Model;

class DeliveryCost
{
    private float $assessedCost;
    private float $cost;

    public function __construct(float $assessedCost, float $cost)
    {
        $this->assessedCost = $assessedCost;
        $this->cost = $cost;
    }

    public function getAssessedCost(): float
    {
        return $this->assessedCost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}
