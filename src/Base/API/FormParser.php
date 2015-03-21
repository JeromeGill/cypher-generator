<?php
namespace Cypher\Base\API;

use GuzzleHttp\Utils;

/**
 * Trait FormParser
 * @package Cypher\Base\Utilities\API
 */
trait FormParser
{

    /**
     * Take a request JSON body encoded with @Cypher.formToJson() and parse it as a more user friendly array.
     * @return array
     */
    protected static function parseJSONSerialisedForm()
    {
        $JSONArray = Utils::jsonDecode($_REQUEST['formData']);
        $outputArray = [];

        foreach ($JSONArray as $element) {
            $key = $element->name;
            $value = $element->value;
            $outputArray[$key] = $value;
        }
        return $outputArray;
    }
}
