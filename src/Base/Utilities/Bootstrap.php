<?php
namespace Cypher\Base\Utilities;

use Cypher\LocalConfig;
use DB\SQL;


/**
 * Class Bootstrap
 * @package Cypher\Base\Utilities
 */
class Bootstrap
{
    /**
     * @return \Base
     */
    public static function bootstrap()
    {
        date_default_timezone_set('UTC');
        $f3 = \Base::instance();
        $f3->set('AUTOLOAD', 'app/classes/');
        LocalConfig::define();
        $f3->set('DB', self::setupDB());
        return $f3;
    }

    /**
     * @return \DB\SQL
     * @throws \Exception
     */
    private static function setupDB()
    {
        $db_config = Config::get('DB_CONFIG');
        $dbname = $db_config['name'];
        $username = $db_config['user'];
        $password = $db_config['pass'];
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // generic attribute
            \PDO::ATTR_PERSISTENT => true,  // we want to use persistent connections
            \PDO::MYSQL_ATTR_COMPRESS => true // MySQL-specific attribute
        ];
        return new SQL('mysql:host=localhost;port=3306;dbname=' . $dbname, $username, $password, $options);

    }
}
