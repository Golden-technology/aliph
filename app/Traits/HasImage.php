<?php

namespace App\Traits;

trait HasImage
{
    public function uploadImage($image) {
        $name_image_rand = rand(0 , 100000);
        $fileupload = $image;
        $extention  = $fileupload->getClientOriginalExtension();
        $class_basename = class_basename(self::class);
        $path       = $fileupload->move(public_path('images' . '/' .  $class_basename), "invoice" .'.' . $extention);
        $nameimage = "invoice" .  '.' . $extention;
        return $nameimage;
    }
}
