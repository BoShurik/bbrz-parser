<?php
/**
 * User: boshurik
 * Date: 2019-05-13
 * Time: 19:09
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Model\Coach;

class CoachFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $resultRow, string $prefix): Coach
    {
        $idField = sprintf('IdCoach%s', $prefix);
        $nameField = sprintf('Coach%sName', $prefix);

        return new Coach((int)$resultRow->$idField, (string)$resultRow->$nameField);
    }
}