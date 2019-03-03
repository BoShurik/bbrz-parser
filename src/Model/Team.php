<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:17
 */

namespace BoShurik\BloodBowl\Replay\Model;

use BoShurik\BloodBowl\Replay\Model\Statistic\Statistic;

final class Team
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Race
     */
    private $race;

    /**
     * @var Coach
     */
    private $coach;

    /**
     * @var Statistic
     */
    private $statistic;

    /**
     * @var array
     */
    private $roster;

    /**
     * @var bool
     */
    private $conceded;

    public function __construct(
        string $name,
        Race $race,
        Coach $coach,
        Statistic $statistic,
        array $roster,
        bool $conceded = false
    )
    {
        $this->name = $name;
        $this->race = $race;
        $this->coach = $coach;
        $this->statistic = $statistic;
        $this->roster = $roster;
        $this->conceded = $conceded;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->name, $this->coach);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Race
     */
    public function getRace(): Race
    {
        return $this->race;
    }

    /**
     * @return Coach
     */
    public function getCoach(): Coach
    {
        return $this->coach;
    }

    /**
     * @return Statistic
     */
    public function getStatistic(): Statistic
    {
        return $this->statistic;
    }

    /**
     * @return array
     */
    public function getRoster(): array
    {
        return $this->roster;
    }

    /**
     * @return bool
     */
    public function isConceded(): bool
    {
        return $this->conceded;
    }

}