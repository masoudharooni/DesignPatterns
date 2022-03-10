<?php
abstract class AbstractionCoupon
{
    protected Coupon $coupon;
    protected $nextStep;
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }
    public function setNextStep(AbstractionCoupon $nextStep)
    {
        $this->nextStep = $nextStep;
    }
    protected function goToNextStep()
    {
        if (is_null($this->nextStep))
            return true;
        $this->nextStep->validate();
    }
}
