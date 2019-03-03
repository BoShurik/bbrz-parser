<?php
/**
 * User: boshurik
 * Date: 12.10.16
 * Time: 21:24
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class Statistic
{
    /**
     * @var int
     */
    private $score;

    /**
     * @var int
     */
    private $value;

    /**
     * @var WinningsStatistic
     */
    private $winningsStatistic;

    /**
     * @var TacklesStatistic
     */
    private $tacklesStatistic;

    /**
     * @var BallStatistic
     */
    private $ballStatistic;

    /**
     * @var PossessionStatistic
     */
    private $possessionStatistic;

    public function __construct(
        int $score,
        int $value,
        WinningsStatistic $winningsStatistic,
        TacklesStatistic $tacklesStatistic,
        BallStatistic $ballStatistic,
        PossessionStatistic $possessionStatistic
    )
    {
        $this->score = $score;
        $this->value = $value;
        $this->winningsStatistic = $winningsStatistic;
        $this->tacklesStatistic = $tacklesStatistic;
        $this->ballStatistic = $ballStatistic;
        $this->possessionStatistic = $possessionStatistic;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return WinningsStatistic
     */
    public function getWinningsStatistic(): WinningsStatistic
    {
        return $this->winningsStatistic;
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

    /**
     * @return PossessionStatistic
     */
    public function getPossessionStatistic(): PossessionStatistic
    {
        return $this->possessionStatistic;
    }
}