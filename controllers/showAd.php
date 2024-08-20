<?php

declare(strict_types=1);

/** @var TYPE_NAME $id */

$ad = (new \App\Ads())->getAd($id);

loadView('singleAd.php', ['ad' => $ad]);