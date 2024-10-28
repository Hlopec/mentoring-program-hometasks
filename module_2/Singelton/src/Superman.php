<?php
class Superman
{
    private static $instance = null;

    private function __construct()
    {
        echo "Superman is created!\n";
    }

    private function __clone() {   }

    public function __wakeup() {   }

    public static function getInstance(): Superman
    {
        if (self::$instance === null) {
            self::$instance = new Superman();
        }
        return self::$instance;
    }

    public function saveTheWorld(): void
    {
        echo "Superman is here one and alone\n";
    }
}