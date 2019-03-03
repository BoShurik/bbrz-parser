<?php
/**
 * User: boshurik
 * Date: 16.10.16
 * Time: 3:58
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class WinningsStatistic
{
    /**
     * @var int
     */
    private $winningsDice;

    /**
     * @var int
     */
    private $popularityBeforeMatch;

    /**
     * @var int
     */
    private $popularityGain;

    /**
     * @var int
     */
    private $cashSpentInducements;

    /**
     * @var int
     */
    private $cashBeforeMatch;

    /**
     * @var int
     */
    private $cashEarnedBeforeConcession;

    /**
     * @var int
     */
    private $cashEarned;

    /**
     * @param int $winningsDice
     * @param int $popularityBeforeMatch
     * @param int $popularityGain
     * @param int $cashSpentInducements
     * @param int $cashBeforeMatch
     * @param int $cashEarnedBeforeConcession
     * @param int $cashEarned
     */
    public function __construct(
        int $winningsDice,
        int $popularityBeforeMatch,
        int $popularityGain,
        int $cashSpentInducements,
        int $cashBeforeMatch,
        int $cashEarnedBeforeConcession,
        int $cashEarned
    )
    {
        $this->winningsDice = $winningsDice;
        $this->popularityBeforeMatch = $popularityBeforeMatch;
        $this->popularityGain = $popularityGain;
        $this->cashSpentInducements = $cashSpentInducements;
        $this->cashBeforeMatch = $cashBeforeMatch;
        $this->cashEarnedBeforeConcession = $cashEarnedBeforeConcession;
        $this->cashEarned = $cashEarned;
    }

    /**
     * @return int
     */
    public function getWinningsDice(): int
    {
        return $this->winningsDice;
    }

    /**
     * @return int
     */
    public function getPopularityBeforeMatch(): int
    {
        return $this->popularityBeforeMatch;
    }

    /**
     * @return int
     */
    public function getPopularityGain(): int
    {
        return $this->popularityGain;
    }

    /**
     * @return int
     */
    public function getCashSpentInducements(): int
    {
        return $this->cashSpentInducements;
    }

    /**
     * @return int
     */
    public function getCashBeforeMatch(): int
    {
        return $this->cashBeforeMatch;
    }

    /**
     * @return int
     */
    public function getCashEarnedBeforeConcession(): int
    {
        return $this->cashEarnedBeforeConcession;
    }

    /**
     * @return int
     */
    public function getCashEarned(): int
    {
        return $this->cashEarned;
    }
}