<?php
namespace Cypher;

/**
 * Class LocalConfig
 * @package Cypher
 */
class LocalConfig
{
    /**
     * Define local environment variables
     */
    public static function define()
    {
        $_ENV['ASSETS_JS_PATH'] = '/web/';
        $_ENV['ASSETS_CSS_PATH'] = '/web/';
        $_ENV['ASSETS_IMG_PATH'] = '/web/img/';

        $_ENV['DB_CONFIG'] = [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'cypher',
            'user' => 'cypher_mysql',
            'pass' => 'Jc4sSF4gja43',
            'port' => '3306',
            'charset' => 'utf8'
        ];

        $_ENV['Bundles'] = [
            'Base',
            'Cypher'
        ];
    }
}
