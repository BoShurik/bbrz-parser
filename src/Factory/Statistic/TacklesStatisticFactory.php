<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:38
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\TacklesStatistic;

class TacklesStatisticFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $resultRow, $prefix): TacklesStatistic
    {
        return new TacklesStatistic(
            (integer)$resultRow->{$prefix . 'InflictedTackles'},
            (integer)$resultRow->{$prefix . 'SustainedTackles'},
            (integer)$resultRow->{$prefix . 'InflictedInjuries'},
            (integer)$resultRow->{$prefix . 'SustainedInjuries'},
            (integer)$resultRow->{$prefix . 'InflictedStuns'},
            (integer)$resultRow->{$prefix . 'SustainedStuns'},
            (integer)$resultRow->{$prefix . 'InflictedKO'},
            (integer)$resultRow->{$prefix . 'SustainedKO'},
            (integer)$resultRow->{$prefix . 'InflictedCasualties'},
            (integer)$resultRow->{$prefix . 'SustainedCasualties'},
            (integer)$resultRow->{$prefix . 'InflictedDead'},
            (integer)$resultRow->{$prefix . 'SustainedDead'},
            (integer)$resultRow->{$prefix . 'InflictedPushOuts'}
        );
    }
}