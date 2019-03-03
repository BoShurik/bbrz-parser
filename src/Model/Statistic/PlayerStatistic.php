<?php
/**
 * User: boshurik
 * Date: 16.10.16
 * Time: 0:48
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class PlayerStatistic
{
    /**
     * @var int
     */
    private $matchPlayed;

    /**
     * @var TacklesStatistic
     */
    private $tacklesStatistic;

    /**
     * @var BallStatistic
     */
    private $ballStatistic;

    public function __construct(int $matchPlayed, TacklesStatistic $tacklesStatistic, BallStatistic $ballStatistic)
    {
        $this->matchPlayed = $matchPlayed;
        $this->tacklesStatistic = $tacklesStatistic;
        $this->ballStatistic = $ballStatistic;
    }

    /**
     * @return int
     */
    public function getMatchPlayed(): int
    {
        return $this->matchPlayed;
    }

    /**
     * @return TacklesStatistic
     */
    public function getTacklesStatistic(): TacklesStatistic
    {
        return $this->tacklesStatistic;
    }

    /**
     * @return BallStatistic
     */
    public function getBallStatistic(): BallStatistic
    {
        return $this->ballStatistic;
    }
}