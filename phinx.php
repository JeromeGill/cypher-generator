<?php

\Cypher\LocalConfig::define();

$migrationPaths = [];

foreach (\Cypher\Base\Utilities\Config::get('Bundles') as $bundle) {

}


return [
    'paths' => [
        'migrations' => __DIR__.'/migrations'
    ],
  'environments' =>  [
      'default_migration_table' => 'phinxlog',
      'default_database' => 'development',
      'production' => [
          'adapter' => 'mysql',
          'host' => 'localhost',
          'name' => 'production_db',
          'user' => 'root',
          'pass' => '',
          'port' => '3306',
          'charset' => 'utf8',
      ],
      'development' => \Cypher\Base\Utilities\Config::get('DB_CONFIG'),
      'testing' => [
          'adapter' => 'mysql',
          'host' => 'localhost',
          'name' => 'testing_db',
          'user' => 'root',
          'pass' => '',
          'port' => '3306',
          'charset' => 'utf8',
      ]
  ]
];
