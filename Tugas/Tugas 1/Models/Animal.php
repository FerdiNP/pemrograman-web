<?php

namespace App\Models;

abstract class Animal {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    abstract public function makeSound();

    public function __toString() {
        return "Name: {$this->name}, Age: {$this->age}";
    }
}
