<?php

  namespace App;

  use Request;

  class Helpers{

    function __construct()
    {
      return;
    }

    /**
     * Return nav-here if current path begins with this path.
     *
     * @param string $path
     * @return string
     */

    public static function setActive($path)
    {
      return Request::is($path) ? "class=active" :  "";
    }
  }


?>
