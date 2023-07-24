<?php

namespace App\Utils\Code;

class Code
{
  public static $min = 1000;
  public static $max = 9999;

  public static function generateCode()
  {
    return random_int(self::$min, self::$max);
  }
}
