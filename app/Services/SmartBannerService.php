<?php

namespace App\Services;

class SmartBannerService
{
    public $cookieName = 'smartBannerShown';

    public function isBannerShown(): bool
    {
        return request()->cookie($this->cookieName, 0) == 1;
    }

    public function showBanner(): void
    {
        echo '<link rel="stylesheet" href="js/smartbanner.css">';
        echo '<script src="js/smartbanner.js?4"></script>';
    }

    public function markBannerAsShown(): void
    {
        cookie()->queue($this->cookieName, 1, 60 * 12); // 12 saat
    }
}
