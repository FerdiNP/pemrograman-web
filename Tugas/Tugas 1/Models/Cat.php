<?php
namespace App\Models;

use App\Traits\Output;

class Cat extends Animal {
  use Output;

  public function makeSound()
  {
    return "Meow!";
  }
}
 ?>
