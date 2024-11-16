<?php

namespace App\Traits;

trait Output {
    public function output($message) {
        echo "[OUTPUT] " . $message . PHP_EOL;
    }
}
