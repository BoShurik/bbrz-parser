<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:50
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\WinningsStatistic;

class WinningsStatisticFactory
{
    public static function build(): self
    {
        return new self();
    }

    public function create(\SimpleXMLElement $resultRow, $prefix): WinningsStatistic
    {
        return new WinningsStatistic(
            (integer)$resultRow->{$prefix . 'WinningsDice'},
            (integer)$resultRow->{$prefix . 'PopularityBeforeMatch'},
            (integer)$resultRow->{$prefix . 'PopularityGain'},
            (integer)$resultRow->{$prefix . 'CashSpentInducements'},
            (integer)$resultRow->{$prefix . 'CashBeforeMatch'},
            (integer)$resultRow->{$prefix . 'CashEarnedBeforeConcession'},
            (integer)$resultRow->{$prefix . 'CashEarned'}
        );
    }
}