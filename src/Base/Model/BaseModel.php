<?php

namespace Cypher\Base\Model;

use DB\SQL;

class BaseModel
{

    /**
     * @var \DB\SQL\Mapper
     */
    protected $model;

    /**
     * @var \DB\SQL
     */
    protected $db;
    /**
     * @var
     */
    protected $table;

    /**
     * @param SQL $db
     * @param $table
     */
    public function __construct(SQL $db, $table)
    {
        $this->db = $db;
        $this->model = new SQL\Mapper($db, $table);
        $this->table = $table;
    }
}
