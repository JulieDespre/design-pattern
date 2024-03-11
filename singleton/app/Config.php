<?php

# TODO: Créer une classe Config en Singleton

namespace App;

class Config {
    private static $instanceConfig;
    private mixed $settings = [];

    public static function getInstanceConfig() {
        if (is_null(self::$instanceConfig)) {
            self::$instanceConfig = new Config();
        }
        return self::$instanceConfig;
    }

    // Constructeur privé pour empêcher l'instanciation en dehors de la classe
    private function __construct() {

    }

    // Méthode pour obtenir une valeur de configuration à partir de sa clé
    public function getParameter($key) {
        // clef n'existe pas dans le tableau
        if (!isset($this->settings[$key])) {
            return null;
        }
        // clef existe dans le tableau
        return $this->settings[$key];
    }

    // Méthode pour définir une valeur de configuration à partir de sa clé
    public function setParameter($key, $value) {
        $this->settings[$key] = $value;
    }

}