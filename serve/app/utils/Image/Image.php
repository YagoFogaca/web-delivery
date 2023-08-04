<?php

namespace App\Utils\Image;

class Image
{
  public static function saveImage($name, $req)
  {
    $name_verify = str_replace(' ', '-', $name);
    $extension = $req->image->getClientOriginalExtension();
    return $req->image->storeAs('products', $name_verify . ".{$extension}");
  }
}
