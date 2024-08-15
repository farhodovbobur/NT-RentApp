<?php

declare(strict_types=1);

function getAds(): false|array
{
    return (new \App\Ads())->getAds();
}
