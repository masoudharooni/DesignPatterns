<?php
require_once 'AbstractionCoupon.php';
class CouponExpire extends \AbstractionCoupon
{
    public function validate()
    {
        if ($this->coupon->isExpire())
            throw new Exception("Coupon expired!");
        echo "Coupon didn't expire" . PHP_EOL;
        $this->goToNextStep();
    }
}
