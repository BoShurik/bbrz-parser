<?php
/**
 * User: boshurik
 * Date: 05.09.17
 * Time: 19:07
 */

namespace BoShurik\BloodBowl\Replay\Parser;

use BoShurik\BloodBowl\Replay\Model\Match;

interface ParserInterface
{
    /**
     * @param \SimpleXMLElement $xml
     * @return Match
     */
    public function parse(\SimpleXMLElement $xml);
}