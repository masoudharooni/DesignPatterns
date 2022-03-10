<?php
class BasketCost
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

class BasketWithShipping extends BasketCost
{
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
        return parent::getCost() + self::getCost();
    }
    public function getDetails(): array
    {
        return parent::getDetails() + [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWithTaxation extends BasketCost
{
    public function getCost(): int
    {
        return parent::getCost() * 0.09;
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
        return parent::getDetails() + [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketCostWithShippingAndTaxation extends basketWithTaxation
{
    public function getCost(): int
    {
        return 15000;
    }
    public function getDescription(): string
    {
        return "Shipping and Taxation cost";
    }
    public function getTotalCost(): int
    {
        return parent::getCost() + self::getCost();
    }
    public function getDetails(): array
    {
        return parent::getDetails() + [
            self::getDescription() => self::getCost()
        ];
    }
}
