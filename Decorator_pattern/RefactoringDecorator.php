<?php
interface CostInterface
{
    public function getCost(): int;
    public function getDescription(): string;
    public function getTotalCost(): int;
    public function getDetails(): array;
}

class BasketCostDecorator implements CostInterface
{
    public function getCost(): int
    {
        return 55000;
    }
    public function getDescription(): string
    {
        return "Basket Cost";
    }
    public function getTotalCost(): int
    {
        return self::getCost();
    }
    public function getDetails(): array
    {
        return [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWithShippingDecorator implements CostInterface
{
    private CostInterface $basketCost;
    public function __construct(CostInterface $basketCost)
    {
        $this->basketCost = $basketCost;
    }
    public function getCost(): int
    {
        return 15000;
    }
    public function getDescription(): string
    {
        return "Shipping cost";
    }
    public function getTotalCost(): int
    {
        return $this->basketCost->getTotalCost() + self::getCost();
    }
    public function getDetails(): array
    {
        return $this->basketCost->getDetails() + [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWithTaxationDecorator implements CostInterface
{
    private CostInterface $basketCost;
    public function __construct(CostInterface $basketCost)
    {
        $this->basketCost = $basketCost;
    }
    public function getCost(): int
    {
        return $this->basketCost->getTotalCost() * 0.09;
    }
    public function getDescription(): string
    {
        return "Taxation Cost";
    }
    public function getTotalCost(): int
    {
        return self::getCost();
    }
    public function getDetails(): array
    {
        return $this->basketCost->getDetails() + [
            self::getDescription() => self::getCost()
        ];
    }
}

$basketCost = new BasketCostDecorator;

$basketWithTaxation = new BasketWithTaxationDecorator($basketCost);

$basketWithShipping = new BasketWithShippingDecorator($basketCost);

$BasketWithShippingAndTaxation = new BasketWithShippingDecorator(new BasketWithTaxationDecorator($basketCost));
var_dump($BasketWithShippingAndTaxation->getDetails());
