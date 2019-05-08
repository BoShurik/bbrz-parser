<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:51
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\PossessionStatistic;

class PossessionStatisticFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $resultRow, $prefix): PossessionStatistic
    {
        return new PossessionStatistic(
            (integer)$resultRow->{$prefix . 'PossessionBall'},
            (integer)$resultRow->{$prefix . 'OccupationOwn'},
            (integer)$resultRow->{$prefix . 'OccupationTheir'}
        );
    }
}