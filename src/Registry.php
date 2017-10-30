<?php

namespace AlexanderZabornyi\RegistryTest;

abstract class Registry
{
    const LOGGER = 'logger';

    private static $storedValues = [];
    private static $allowedKeys = [
        self::LOGGER,
    ];

    /**
     * Установить значение
     *
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        if (! in_array($key, self::$allowedKeys)) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        self::$storedValues[$key] = $value;
    }

    /**
     * Получить значение по ключу
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get(string $key)
    {
        if (!in_array($key, self::$allowedKeys) || !isset(self::$storedValues[$key])) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        return self::$storedValues[$key];
    }
}
