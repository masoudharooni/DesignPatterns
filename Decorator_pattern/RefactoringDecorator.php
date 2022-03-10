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

abstract class AbstractDecoration implements CostInterface
{
    protected CostInterface $basketCost;
    public function __construct(CostInterface $basketCost)
    {
        $this->basketCost = $basketCost;
    }
    public function getTotalCost(): int
    {
        return $this->basketCost->getTotalCost() + static::getCost();
    }
    public function getDetails(): array
    {
        return $this->basketCost->getDetails() + [
            static::getDescription() => static::getCost()
        ];
    }
}

class BasketWithShippingDecorator extends AbstractDecoration
{
    public function getCost(): int
    {
        return 15000;
    }
    public function getDescription(): string
    {
        return "Shipping cost";
    }
}

class BasketWithTaxationDecorator extends AbstractDecoration
{
    public function getCost(): int
    {
        return $this->basketCost->getTotalCost() * 0.09;
    }
    public function getDescription(): string
    {
        return "Taxation Cost";
    }
}

class PackageDecorator extends AbstractDecoration
{
    public function getCost(): int
    {
        return $this->basketCost->getTotalCost() * 0.09;
    }
    public function getDescription(): string
    {
        return "Packag Cost";
    }
}


$basketCost = new BasketCostDecorator;

$basketWithTaxation = new BasketWithTaxationDecorator($basketCost);

$basketWithShipping = new BasketWithShippingDecorator($basketCost);

$BasketWithShippingAndTaxation = new BasketWithShippingDecorator(new BasketWithTaxationDecorator(new PackageDecorator($basketCost)));
var_dump($BasketWithShippingAndTaxation->getDetails());
