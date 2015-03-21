<?php
namespace Cypher\Base\API;

use DB\SQL;

/**
 * Class BaseAPI
 * @package Cypher\Base\API
 */
abstract class BaseAPI
{
    use FormParser;

    /**
     * @var null|SQL $f3
     */
    private static $db;

    /**
     * @var null|\Base $f3
     */
    private static $f3;

    /**
     * @return SQL
     */
    public static function getDB()
    {
        if (!self::$db) {
            self::$db = self::getF3()->get('DB');
        }
        return self::$db;
    }

    /**
     * @return \Base
     */
    public static function getF3()
    {
        if (!self::$f3) {
            self::$f3 = \Base::instance();
        }
        return self::$f3;
    }

    /**
     * @param string $response
     * @param int $httpStatusCode
     */
    protected static function sendResponse($response = '', $httpStatusCode = 200)
    {
        self::getF3()->status($httpStatusCode);
        echo $response;
    }
}
