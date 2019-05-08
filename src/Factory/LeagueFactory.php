<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:22
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Model\League;

class LeagueFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $gameInfoXml): League
    {
        return new League((string)$gameInfoXml->RowLeague->Id->Value, (string)$gameInfoXml->RowLeague->Name);
    }
}