<?php

declare(strict_types=1);

$title       = $_POST['title'];
$address     = $_POST['address'];
$rooms       = (int) $_POST['rooms'];
$square      = (float) $_POST['square'];
$description = $_POST['desc'];
$price       = (float) $_POST['price'];
$user        = (int) $_POST['user'];
$status      = (int) $_POST['status'];

if ($_POST['title']
    && $_POST['address']
    && $_POST['rooms']
    && $_POST['square']
    && $_POST['desc']
    && $_POST['price']
) {


    // 1. Store Ad
    // 2. Upload Image
    // 3. Store Image(adId, name)
    // 4 .Redirect

    $newAdsId = (new \App\Ads())->insertAds(
        $title,
        $user,
        $status,
        $address,
        $price,
        $rooms,
        $square,
        $description
    );

    if ($newAdsId) {
        $imageHandler = new \App\Image();
        $fileName     = $imageHandler->handleUpload();

        if (!$fileName) {
            exit('Rasm yuklanmadi!');
        }

        $imageHandler->addImage((int)$newAdsId, $fileName);

        header('Location: /');

        exit();
    }

    return;
}

echo "Iltimos, barcha maydonlarni to'ldiring!";