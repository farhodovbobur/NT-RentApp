<?php

namespace App;

class Controller
{
    public function showAd($id = null): void
    {
        $ad = (new \App\Ads())->getAd($id);

        loadView('singleAd.php', ['ad' => $ad]);
    }
}