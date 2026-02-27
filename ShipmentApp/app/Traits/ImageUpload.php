<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait ImageUpload
{

  public function uploadImage(UploadedFile $file, string $path): string
  {

    $imageName = uniqid() . '.webp';

    $gd = new Driver();
    $manager = new ImageManager($gd);

    $image = $manager->read($file)->toWebp(20);
    
    Storage::disk('public')->put($path . '/' . $imageName, (string)$image);
    return $imageName;
  }
}