<?php
require_once 'Coupon.php';
require_once 'Refactor/CouponExist.php';
require_once 'Refactor/CouponActive.php';
require_once 'Refactor/CouponExpire.php';
class CouponValidator
{
    private Coupon $coupon;
    public function validate()
    {
        $this->coupon = new Coupon;
        $couponExist = new CouponExist($this->coupon);
        $couponActive = new CouponActive($this->coupon);
        $couponExpire = new CouponExpire($this->coupon);
        $couponExist->setNextStep($couponActive);
        $couponActive->setNextStep($couponExpire);
        $couponExist->validate();
    }
}
