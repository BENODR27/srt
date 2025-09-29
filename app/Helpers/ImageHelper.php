<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage; 

class ImageHelper {

  public static function storeImage($imageData,$imagePathName="public/product/images/") {

    $data = substr($imageData, strpos($imageData, ",") + 1);  

    // Decode base64 data and generate image  
    $image = base64_decode($data);
    $imageName = uniqid() . '.png';

    $imagePath = $imagePathName . $imageName; 

    Storage::put($imagePath, $image);

    return $imageName;
    
  }
  public static function deleteImage($imageName,$imagePathName="public/product/images/"):void{
    $imagePath =$imagePathName . $imageName;
    Storage::delete($imagePath);
  }


}