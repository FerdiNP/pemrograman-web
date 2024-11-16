<?php

namespace App\Models;

use App\Traits\Output;

class Dog extends Animal {
    use Output;

    public function makeSound() {
        return "Woof!";
    }
}
?>
