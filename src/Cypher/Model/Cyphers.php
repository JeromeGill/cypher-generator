<?php

namespace Cypher\Cypher\Model;

use Cypher\Base\Model\BaseModel;
use DB\SQL;

class Cyphers extends BaseModel{


    public function __construct(SQL $db)
    {
        parent::__construct($db,'cypher_lookup');
    }


    public function getCypher($index)
    {
        $cypher = $this->db->exec('SELECT cypher FROM cypher_lookup WHERE cypher_lookup.id = ?', $index);
        return array_pop($cypher);
    }

    public function addCypher(array $cypher)
    {
        $this->db->exec('INSERT INTO cypher_lookup(cypher) VALUES(?)',implode(',',$cypher));
    }
}
