<?php
namespace Cypher\Base\Utilities;

/**
 * Class Config
 * @package Cypher\Base\Utilities
 */
class Config
{
    /**
     * @param $var
     * @return mixed
     * @throws \Exception
     */
    public static function get($var)
    {
        if (array_key_exists($var, $_ENV)) {
            return $_ENV[$var];
        } else {
            throw new \Exception('Unknown variable: ' . $var);
        }
    }
}
