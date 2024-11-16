<?php

include 'Traits/Output.php';
include 'Models/Animal.php';
include 'Models/Dog.php';
include 'Models/Cat.php';

use App\Models\Dog;
use App\Models\Cat;

$dog = new Dog("Buddy", 3);
$dog->output($dog);
echo "Sound: " . $dog->makeSound() . PHP_EOL;
$cat = new Cat("Whiskers", 2);
$cat->output($cat);
echo "Sound: " . $cat->makeSound() . PHP_EOL;
