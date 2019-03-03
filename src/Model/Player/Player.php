<?php
/**
 * User: boshurik
 * Date: 12.10.16
 * Time: 21:25
 */

namespace BoShurik\BloodBowl\Replay\Model\Player;

use BoShurik\BloodBowl\Replay\Model\Statistic\PlayerStatistic;

final class Player
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $number;

    /**
     * @var Type
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $movement;

    /**
     * @var int
     */
    private $strength;

    /**
     * @var int
     */
    private $agility;

    /**
     * @var int
     */
    private $armor;

    /**
     * @var int
     */
    private $level;

    /**
     * @var int
     */
    private $experience;

    /**
     * @var Skill[]
     */
    private $skills;

    /**
     * @var Casualty[]
     */
    private $casualties;

    /**
     * @var boolean
     */
    private $journeymen;

    /**
     * @var int
     */
    private $gainedExperience;

    /**
     * @var Casualty[]
     */
    private $gainedCasualties;

    /**
     * @var PlayerStatistic
     */
    private $statistic;

    /**
     * @param string $id
     * @param int $number
     * @param Type $type
     * @param string $name
     * @param int $movement
     * @param int $strength
     * @param int $agility
     * @param int $armor
     * @param int $level
     * @param int $experience
     * @param Skill[] $skills
     * @param Casualty[] $casualties
     * @param bool $journeymen
     * @param int $gainedExperience
     * @param Casualty[] $gainedCasualties
     */
    public function __construct(
        string $id,
        int $number,
        Type $type,
        string $name,
        int $movement,
        int $strength,
        int $agility,
        int $armor,
        int $level,
        int $experience,
        array $skills = array(),
        array $casualties = array(),
        bool $journeymen = false,
        ?int $gainedExperience = null,
        array $gainedCasualties = array()
    )
    {
        $this->id = $id;
        $this->number = $number;
        $this->type = $type;
        $this->name = $name;
        $this->movement = $movement;
        $this->strength = $strength;
        $this->agility = $agility;
        $this->armor = $armor;
        $this->level = $level;
        $this->experience = $experience;
        $this->skills = $skills;
        $this->casualties = $casualties;
        $this->journeymen = $journeymen;
        $this->gainedExperience = $gainedExperience;
        $this->gainedCasualties = $gainedCasualties;
    }


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMovement(): int
    {
        return $this->movement;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->agility;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @return Casualty[]
     */
    public function getCasualties(): array
    {
        return $this->casualties;
    }

    /**
     * @return bool
     */
    public function isJourneymen(): bool
    {
        return $this->journeymen;
    }

    /**
     * @return int
     */
    public function getGainedExperience(): int
    {
        return $this->gainedExperience;
    }

    /**
     * @return Casualty[]
     */
    public function getGainedCasualties(): array
    {
        return $this->gainedCasualties;
    }

    /**
     * @return PlayerStatistic
     */
    public function getStatistic(): PlayerStatistic
    {
        return $this->statistic;
    }

    /**
     * @param PlayerStatistic $statistic
     */
    public function setStatistic(PlayerStatistic $statistic): void
    {
        $this->statistic = $statistic;
    }
}