<?php
namespace Cypher\Base\Utilities;

/**
 * Class Twig
 * @package Cypher\Base\Utilities
 */
class Twig extends \Twig_Environment
{
    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(
            $_SERVER['DOCUMENT_ROOT'] . '/src/Base/Views'
        );

        $bundles = Config::get('Bundles');

        foreach ($bundles as $bundle) {
            $loader->setPaths($_SERVER['DOCUMENT_ROOT'] . '/src/'. $bundle .'/Views', $bundle);
        }

        parent::__construct($loader);
    }
}
