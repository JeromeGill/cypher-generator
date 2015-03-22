<?php
namespace Cypher\Cypher\Utilities;
class GenerateCypher {

    public static function generateCypher()
    {
        $values = [];
        $cypher = [];

        //Make an array of the values 1-40

        for ($i = 1; $i <= 40; $i++) {
            $values[] = $i;
        }

        //For 26 values
        for ($i = 0; $i < 26; $i++) {
            //Pick a random index
            $index = rand(0, sizeof($values) - 1);

            //Assign the index of the remaining value array to the cypher
            $cypher[] = $values[$index];

            //Remove the indexed value from the value array
            unset($values[$index]);

            //re-index the remaining values
            $newValues = [];

            foreach($values as $v){
                $newValues[] = $v;
            }
            $values = $newValues;
        }

        return $cypher;
    }

}