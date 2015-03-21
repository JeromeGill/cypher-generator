<?php
namespace Cypher\Cypher\Web;

use Cypher\Base\Web\BaseController;
use Cypher\Cypher\Model\Cyphers;

class Index extends BaseController
{

    public function get()
    {
        $this->render('@Cypher/index.twig');
    }

    public function post()
    {
        $index = $this->parseJSONSerialisedForm();
        $cyphers = new Cyphers();
        $encryption = $cyphers->getCypher($index);
        $this->sendResponse(implode(', ', $encryption));
    }
}
