<?php
require_once 'AbstractionCoupon.php';
class CouponActive extends AbstractionCoupon
{
    public function validate()
    {
        if (!$this->coupon->isActive())
            throw new Exception("Coupon is not active!");
        echo "Coupon is active" . PHP_EOL;
        $this->goToNextStep();
    }
}
