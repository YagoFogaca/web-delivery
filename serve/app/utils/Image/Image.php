<?php

namespace App\Utils\Image;

class Image
{
  public static function saveImage($name, $req)
  {
    $extension = $req->image->getClientOriginalExtension();
    return $req->image->storeAs('products', $name . ".{$extension}");
  }
}
