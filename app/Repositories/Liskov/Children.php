<?php

namespace App\Repositories\Liskov;

class Children extends Father
{
    public function doSomething()
    {
      return 'new ok';
    }
}
