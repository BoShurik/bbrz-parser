<?php
/**
 * User: boshurik
 * Date: 16.10.16
 * Time: 3:57
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class BallStatistic
{
    /**
     * @var int
     */
    private $sustainedInterceptions;

    /**
     * @var int
     */
    private $inflictedTouchdowns;

    /**
     * @var int
     */
    private $inflictedMetersPassing;

    /**
     * @var int
     */
    private $inflictedMetersRunning;

    /**
     * @var int
     */
    private $inflictedPasses;

    /**
     * @var int
     */
    private $inflictedCatches;

    /**
     * @param int $sustainedInterceptions
     * @param int $inflictedTouchdowns
     * @param int $inflictedMetersPassing
     * @param int $inflictedMetersRunning
     * @param int $inflictedPasses
     * @param int $inflictedCatches
     */
    public function __construct(
        int $sustainedInterceptions,
        int $inflictedTouchdowns,
        int $inflictedMetersPassing,
        int $inflictedMetersRunning,
        int $inflictedPasses,
        int $inflictedCatches
    )
    {
        $this->sustainedInterceptions = $sustainedInterceptions;
        $this->inflictedTouchdowns = $inflictedTouchdowns;
        $this->inflictedMetersPassing = $inflictedMetersPassing;
        $this->inflictedMetersRunning = $inflictedMetersRunning;
        $this->inflictedPasses = $inflictedPasses;
        $this->inflictedCatches = $inflictedCatches;
    }

    /**
     * @return int
     */
    public function getSustainedInterceptions(): int
    {
        return $this->sustainedInterceptions;
    }

    /**
     * @return int
     */
    public function getInflictedTouchdowns(): int
    {
        return $this->inflictedTouchdowns;
    }

    /**
     * @return int
     */
    public function getInflictedMetersPassing(): int
    {
        return $this->inflictedMetersPassing;
    }

    /**
     * @return int
     */
    public function getInflictedMetersRunning(): int
    {
        return $this->inflictedMetersRunning;
    }

    /**
     * @return int
     */
    public function getInflictedPasses(): int
    {
        return $this->inflictedPasses;
    }

    /**
     * @return int
     */
    public function getInflictedCatches(): int
    {
        return $this->inflictedCatches;
    }
}