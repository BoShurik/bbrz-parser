<?php
/**
 * User: boshurik
 * Date: 16.10.16
 * Time: 3:56
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class TacklesStatistic
{
    /**
     * @var int
     */
    private $inflictedTackles;

    /**
     * @var int
     */
    private $sustainedTackles;

    /**
     * @var int
     */
    private $inflictedInjuries;

    /**
     * @var int
     */
    private $sustainedInjuries;

    /**
     * @var int
     */
    private $inflictedStuns;

    /**
     * @var int
     */
    private $sustainedStuns;

    /**
     * @var int
     */
    private $inflictedKO;

    /**
     * @var int
     */
    private $sustainedKO;

    /**
     * @var int
     */
    private $inflictedCasualties;

    /**
     * @var int
     */
    private $sustainedCasualties;

    /**
     * @var int
     */
    private $inflictedDead;

    /**
     * @var int
     */
    private $sustainedDead;

    /**
     * @var int
     */
    private $inflictedPushOuts;

    /**
     * @param int $inflictedTackles
     * @param int $sustainedTackles
     * @param int $inflictedInjuries
     * @param int $sustainedInjuries
     * @param int $inflictedStuns
     * @param int $sustainedStuns
     * @param int $inflictedKO
     * @param int $sustainedKO
     * @param int $inflictedCasualties
     * @param int $sustainedCasualties
     * @param int $inflictedDead
     * @param int $sustainedDead
     * @param int $inflictedPushOuts
     */
    public function __construct(
        int $inflictedTackles,
        int $sustainedTackles,
        int $inflictedInjuries,
        int $sustainedInjuries,
        int $inflictedStuns,
        int $sustainedStuns,
        int $inflictedKO,
        int $sustainedKO,
        int $inflictedCasualties,
        int $sustainedCasualties,
        int $inflictedDead,
        int $sustainedDead,
        int $inflictedPushOuts
    )
    {
        $this->inflictedTackles = $inflictedTackles;
        $this->sustainedTackles = $sustainedTackles;
        $this->inflictedInjuries = $inflictedInjuries;
        $this->sustainedInjuries = $sustainedInjuries;
        $this->inflictedStuns = $inflictedStuns;
        $this->sustainedStuns = $sustainedStuns;
        $this->inflictedKO = $inflictedKO;
        $this->sustainedKO = $sustainedKO;
        $this->inflictedCasualties = $inflictedCasualties;
        $this->sustainedCasualties = $sustainedCasualties;
        $this->inflictedDead = $inflictedDead;
        $this->sustainedDead = $sustainedDead;
        $this->inflictedPushOuts = $inflictedPushOuts;
    }

    /**
     * @return int
     */
    public function getInflictedTackles(): int
    {
        return $this->inflictedTackles;
    }

    /**
     * @return int
     */
    public function getSustainedTackles(): int
    {
        return $this->sustainedTackles;
    }

    /**
     * @return int
     */
    public function getInflictedInjuries(): int
    {
        return $this->inflictedInjuries;
    }

    /**
     * @return int
     */
    public function getSustainedInjuries(): int
    {
        return $this->sustainedInjuries;
    }

    /**
     * @return int
     */
    public function getInflictedStuns(): int
    {
        return $this->inflictedStuns;
    }

    /**
     * @return int
     */
    public function getSustainedStuns(): int
    {
        return $this->sustainedStuns;
    }

    /**
     * @return int
     */
    public function getInflictedKO(): int
    {
        return $this->inflictedKO;
    }

    /**
     * @return int
     */
    public function getSustainedKO(): int
    {
        return $this->sustainedKO;
    }

    /**
     * @return int
     */
    public function getInflictedCasualties(): int
    {
        return $this->inflictedCasualties;
    }

    /**
     * @return int
     */
    public function getSustainedCasualties(): int
    {
        return $this->sustainedCasualties;
    }

    /**
     * @return int
     */
    public function getInflictedDead(): int
    {
        return $this->inflictedDead;
    }

    /**
     * @return int
     */
    public function getSustainedDead(): int
    {
        return $this->sustainedDead;
    }

    /**
     * @return int
     */
    public function getInflictedPushOuts(): int
    {
        return $this->inflictedPushOuts;
    }
}