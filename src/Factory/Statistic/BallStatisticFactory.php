<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:38
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\BallStatistic;

class BallStatisticFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $resultRow, $prefix): BallStatistic
    {
        return new BallStatistic(
            (integer)$resultRow->{$prefix . 'SustainedInterceptions'},
            (integer)$resultRow->{$prefix . 'InflictedTouchdowns'},
            (integer)$resultRow->{$prefix . 'InflictedMetersPassing'},
            (integer)$resultRow->{$prefix . 'InflictedMetersRunning'},
            (integer)$resultRow->{$prefix . 'InflictedPasses'},
            (integer)$resultRow->{$prefix . 'InflictedCatches'}
        );
    }
}