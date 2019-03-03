<?php
/**
 * User: boshurik
 * Date: 16.10.16
 * Time: 4:44
 */

namespace BoShurik\BloodBowl\Replay\Model\Statistic;

final class PossessionStatistic
{
    /**
     * @var int
     */
    private $possessionBall;

    /**
     * @var int
     */
    private $occupationOwn;

    /**
     * @var int
     */
    private $occupationTheir;

    /**
     * @param int $possessionBall
     * @param int $occupationOwn
     * @param int $occupationTheir
     */
    public function __construct(
        int $possessionBall,
        int $occupationOwn,
        int $occupationTheir
    )
    {
        $this->possessionBall = $possessionBall;
        $this->occupationOwn = $occupationOwn;
        $this->occupationTheir = $occupationTheir;
    }

    /**
     * @return int
     */
    public function getPossessionBall(): int
    {
        return $this->possessionBall;
    }

    /**
     * @return int
     */
    public function getOccupationOwn(): int
    {
        return $this->occupationOwn;
    }

    /**
     * @return int
     */
    public function getOccupationTheir(): int
    {
        return $this->occupationTheir;
    }
}