<?php
require_once 'AbstractionCoupon.php';
class CouponExist extends AbstractionCoupon
{
    public function validate()
    {
        if (!$this->coupon->isExist())
            throw new Exception("Coupon is not exist!");
        echo "Coupon is exist!" . PHP_EOL;
        $this->goToNextStep();
    }
}
