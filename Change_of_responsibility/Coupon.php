<?php
class Coupon
{
    public function isExist(): bool
    {
        return true;
    }
    public function isActive(): bool
    {
        return true;
    }
    public function isExpire(): bool
    {
        return false;
    }
}
